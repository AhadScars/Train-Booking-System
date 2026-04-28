<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Information</title>
    <link rel="stylesheet" href="/css/site.css">
</head>

<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>Passenger Information</h2>
                <p>Please provide your details to complete the booking.</p>
            </div>
        </section>

        <div class="form-card">
            <h3>Train Details</h3>
            <div class="train-summary">
                <p><strong>Train Name:</strong> {{ $train->train_name }}</p>
                <p><strong>Train Number:</strong> {{ $train->train_number }}</p>
                <p><strong>Origin:</strong> {{ $train->origin }}</p>
                <p><strong>Destination:</strong> {{ $train->destination }}</p>
                <p><strong>Departure Time:</strong> {{ $train->departure_time }}</p>
                <p><strong>Class:</strong> {{ ucfirst(str_replace('_', ' ', $class)) }}</p>
                @php
                    $classes = $train->classes;
                    if (is_string($classes)) {
                        $classes = json_decode($classes, true) ?: [];
                    }
                    $price = $classes[$class] ?? $train->price;
                @endphp
                <p><strong>Price:</strong> ₹{{ $price }}</p>
            </div>

            <form action="/pay/{{ $train->id }}/{{ $class }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Passenger Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" min="1" max="120" required>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="tel" id="mobile" name="mobile" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn">Proceed to Payment</button>
                </div>
            </form>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>