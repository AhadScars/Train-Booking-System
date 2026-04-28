<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="stylesheet" href="/css/site.css">
</head>
<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>Payment Successful</h2>
                <p>Your booking is confirmed. Thank you for choosing our train service.</p>

                <div class="form-card">
                    <h3>Booking Details</h3>
                    <p><strong>Train:</strong> {{ $train?->train_name ?? 'Unknown Train' }}</p>
                    <p><strong>Route:</strong> {{ $train?->origin ?? 'Unknown' }} → {{ $train?->destination ?? 'Unknown' }}</p>
                    <p><strong>Class:</strong> {{ $class  }}</p>
                    <p><strong>Amount Paid:</strong> ₹{{ $price ?? '0.00' }}</p>
                    <p><strong>Payment Status:</strong> {{ ucfirst($paymentStatus ?? 'unknown') }}</p>
                    <p><strong>Payment Method:</strong> {{ ucfirst($paymentMethod ?? 'card') }}</p>
                    @if($customerEmail ?? null)
                        <p><strong>Customer Email:</strong> {{ $customerEmail }}</p>
                    @endif
                    @if($passenger ?? null)
                        <h4>Passenger Information</h4>
                        <p><strong>Name:</strong> {{ $passenger->name }}</p>
                        <p><strong>Age:</strong> {{ $passenger->age }}</p>
                        <p><strong>Mobile:</strong> {{ $passenger->mobile }}</p>
                    @endif
                    
                </div>

                <div class="form-actions">
                    <a href="/trains" class="btn">Back to Trains</a>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
</body>
</html>
