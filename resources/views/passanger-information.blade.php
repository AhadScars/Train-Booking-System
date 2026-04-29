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
            <p><strong>🚆 Train Name:</strong> {{ $train->train_name }}</p>
            <p><strong>🔢 Train Number:</strong> {{ $train->train_number }}</p>
            <p><strong>📍 Route:</strong> {{ $train->origin }} → {{ $train->destination }}</p>
            <p><strong>⏰ Departure:</strong> {{ $train->departure_time }}</p>
        </div>

        <form action="/pay/{{ $train->id }}" method="POST">
            @csrf

            <!-- Class Selection -->
            <div class="form-group">
                <label for="class">Select Train Class</label>
                <select id="class" name="class" required onchange="updatePrice()">
                    <option value="">-- Choose Your Preferred Class --</option>

                    @if(!empty($classes['first_class']))
                        <option value="first_class">First Class - ₹{{ $classes['first_class'] }}</option>
                    @endif

                    @if(!empty($classes['sleeper']))
                        <option value="sleeper">Sleeper - ₹{{ $classes['sleeper'] }}</option>
                    @endif

                    @if(!empty($classes['economy']))
                        <option value="economy">Economy - ₹{{ $classes['economy'] }}</option>
                    @endif
                </select>
            </div>
            <br>

            <!-- Price Display -->
            <div class="price-box">
                <strong>Selected Price:</strong>
                <span id="selectedPrice">₹ --</span>
            </div>

            <br><br>
            <!-- Passenger Info -->
            <h1 class="section-title">Passenger Information</h1>

            <div class="form-group">
                <label>Passenger Name</label>
                <input type="text" name="name" placeholder="Enter full name" required>
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="number" name="age" min="1" max="120" required>
            </div>

            <div class="form-group">
                <label>Mobile Number</label>
                <input type="tel" name="mobile" placeholder="Enter 10-digit number" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Proceed to Payment</button>
            </div>

        </form>
    </div>

</main>

@include('partials.footer')

<script>
const classesData = {
    first_class: {{ $classes['first_class'] ?? 0 }},
    sleeper: {{ $classes['sleeper'] ?? 0 }},
    economy: {{ $classes['economy'] ?? 0 }}
};

function updatePrice() {
    const selected = document.getElementById('class').value;
    const priceEl = document.getElementById('selectedPrice');

    if (selected && classesData[selected]) {
        priceEl.textContent = '₹ ' + classesData[selected];
    } else {
        priceEl.textContent = '₹ --';
    }
}
</script>

</body>
</html>