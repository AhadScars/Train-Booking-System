<?php

namespace App\Http\Controllers;

use App\Models\AddTrain;
use App\Models\Passenger;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout($trainId, Request $request)
    {
        $class = $request->input('class');
        
        $request->validate([
            'class' => 'required|string|in:first_class,sleeper,economy',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'mobile' => 'required|string|max:15',
        ]);

        $train = AddTrain::findOrFail($trainId);

        $classes = is_string($train->classes)
            ? json_decode($train->classes, true)
            : $train->classes;

        $price = match($class) {
            'first_class' => $classes['first_class'] ?? 0,
            'sleeper' => $classes['sleeper'] ?? 0,
            'economy' => $classes['economy'] ?? 0,
            default => $train->price
        };

        if ($price <= 0) {
            return back()->with('error', 'Selected class price is not available.');
        }

        // Create passenger record with user_id
        $passenger = Passenger::create([
            'name' => $request->name,
            'age' => $request->age,
            'mobile' => $request->mobile,
            'train_id' => $trainId,
            'class' => $class,
            'price' => $price,
            'user_id' => auth()->id(),
        ]);

        $stripeSecret = config('services.stripe.secret');
        if (empty($stripeSecret)) {
            abort(500, 'Stripe API key is not configured. Please set STRIPE_SECRET or STRIPE_SK in your .env file.');
        }

        Stripe::setApiKey($stripeSecret);

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'inr',
                    'product_data' => [
                        'name' => $train->train_name . " - " . strtoupper($class),
                    ],
                    'unit_amount' => $price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url("/payment-success?session_id={CHECKOUT_SESSION_ID}&train={$train->id}&passenger={$passenger->id}"),
            'cancel_url' => url('/trains'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $trainId = $request->query('train');
        $passengerId = $request->query('passenger');

        if (! $sessionId || ! $trainId) {
            return redirect('/trains');
        }

        $stripeSecret = config('services.stripe.secret');
        if (empty($stripeSecret)) {
            abort(500, 'Stripe API key is not configured. Please set STRIPE_SECRET or STRIPE_SK in your .env file.');
        }

        Stripe::setApiKey($stripeSecret);
        
        try {
            $stripeSession = StripeSession::retrieve($sessionId);
        } catch (\Exception $e) {
            return redirect('/trains')->with('error', 'Failed to retrieve payment details: ' . $e->getMessage());
        }

        $train = AddTrain::findOrFail($trainId);
        $passenger = $passengerId ? Passenger::find($passengerId) : null;
        
        // Get class from passenger record
        $class = $passenger?->class ?? null;
        $classLabel = match ($class) {
            'first_class' => 'First Class',
            'sleeper' => 'Sleeper',
            'economy' => 'Economy',
            default => 'General',
        };

        $paymentMethods = $stripeSession->payment_method_types ?? [];
        $customerDetails = $stripeSession->customer_details ?? null;

        return view('payment-success', [
            'train' => $train,
            'class' => $classLabel,
            'price' => number_format(($stripeSession->amount_total ?? 0) / 100, 2),
            'paymentStatus' => $stripeSession->payment_status ?? 'unknown',
            'paymentMethod' => (is_array($paymentMethods) && count($paymentMethods) > 0) ? $paymentMethods[0] : 'card',
            'customerEmail' => (is_object($customerDetails) && property_exists($customerDetails, 'email')) ? $customerDetails->email : null,
            'sessionId' => $sessionId,
            'passenger' => $passenger,
        ]);
    }
    public function downloadPDF($passengerId)
    {
        $passenger = Passenger::with('train', 'user')->findOrFail($passengerId);
        
        // Ensure user can only download their own tickets
        if ($passenger->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access to this ticket.');
        }
        
        $train = $passenger->train;
        
        $classLabel = match ($passenger->class) {
            'first_class' => 'First Class',
            'sleeper' => 'Sleeper',
            'economy' => 'Economy',
            default => 'General',
        };
        
        $pdf = Pdf::loadView('downloadPDF', [
            'passenger' => $passenger,
            'train' => $train,
            'classLabel' => $classLabel,
        ]);
        
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('ticket_' . $passenger->id . '.pdf');
    }
}
