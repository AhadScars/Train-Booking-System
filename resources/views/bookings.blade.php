<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link rel="stylesheet" href="/css/site.css">
</head>

<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>My Train Bookings</h2>
                <p>View all your confirmed train bookings below.</p>
            </div>
        </section>

        @if($bookings->count() > 0)
        <div class="card-grid">
            @foreach($bookings as $booking)
                <article class="train-box">
                    <div class="train-meta">
                        <div>
                            <h3>{{ $booking->train->train_name }} ({{ $booking->train->train_number }})</h3>
                            <p><strong>From:</strong> {{ $booking->train->origin }} <strong>→</strong> <strong>To:</strong>
                                {{ $booking->train->destination }}</p>
                        </div>
                        <div>
                            <p><strong>Departure:</strong> {{ $booking->train->departure_time }}</p>
                            <p><strong>Arrival:</strong> {{ $booking->train->arrival_time }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="booking-details">
                        <h4>Passenger Information</h4>
                        <p><strong>Name:</strong> {{ $booking->name }}</p>
                        <p><strong>Age:</strong> {{ $booking->age }}</p>
                        <p><strong>Mobile:</strong> {{ $booking->mobile }}</p>
                        <p><strong>Class:</strong> {{ ucfirst(str_replace('_', ' ', $booking->class)) }}</p>
                        <p><strong>Price:</strong> ₹{{ number_format($booking->price, 2) }}</p>
                        <p><strong>Booked On:</strong> {{ $booking->created_at->format('d M Y, h:i A') }}</p>
                        <div style="margin-top: 15px; display: flex; gap: 10px;">
                            <a href="{{ route('downloadPDF', ['passenger' => $booking->id]) }}" class="btn" style="flex: 1; text-align: center; display: inline-block;">📥 Download Ticket</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        @else
        <div class="form-card">
            <p style="text-align: center; padding: 20px;">
                <strong>No bookings yet.</strong> <a href="/trains">Browse trains and make your first booking!</a>
            </p>
        </div>
        @endif

        <div class="form-actions">
            <a href="/trains" class="btn">Back to Trains</a>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>