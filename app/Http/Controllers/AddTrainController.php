<?php

namespace App\Http\Controllers;

use App\Models\AddTrain;
use App\Models\Passenger;
use Illuminate\Http\Request;

class AddTrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $trains = AddTrain::all();
        return view('trains', compact('trains'));
    }

    /**
     * Display user bookings
     */
    public function showBookings()
    {
        $bookings = Passenger::where('user_id', auth()->id())
            ->with('train')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('bookings', compact('bookings'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function passengerInformation($trainId = null, $class = null)
    {
        if ($trainId) {
            $train = AddTrain::findOrFail($trainId);
            return view('passanger-information', compact('train', 'class'));
        }
        return view('passanger-information');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'train_name' => 'required|string|max:255',
        'train_number' => 'required|numeric|unique:add_trains,train_number',
        'origin' => 'required|string|max:255',
        'destination' => 'required|string|max:255',
        'departure_time' => 'required|date_format:H:i',
        'arrival_time' => 'required|date_format:H:i|after:departure_time',
        'price' => 'required|numeric|min:0',
        'first_class' => 'nullable|numeric|min:0',
        'sleeper' => 'nullable|numeric|min:0',
        'economy' => 'nullable|numeric|min:0',
    ]);

    $train = new AddTrain();
    
    $train->train_name = $validated['train_name'];
    $train->train_number = $validated['train_number'];
    $train->origin = $validated['origin'];
    $train->destination = $validated['destination'];
    $train->departure_time = $validated['departure_time'];
    $train->arrival_time = $validated['arrival_time'];
    $train->price = $validated['price'];

    $train->classes = [
        'first_class' => $validated['first_class'] ?? 0,
        'sleeper' => $validated['sleeper'] ?? 0,
        'economy' => $validated['economy'] ?? 0,
    ];

    $train->save();

    return redirect('/trains')->with('success', 'Train added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(AddTrain $add_train)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddTrain $add_train)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddTrain $add_train)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddTrain $add_train)
    {
        //
    }
}
