<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Trains</title>
    <link rel="stylesheet" href="/css/site.css">
</head>
<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>Available Trains</h2>
                <p>Browse current train services and fares below.</p>
                @auth
                <div class="form-actions">
                    <a href="/add-train" class="btn">Add Train</a>
                </div>
                @endauth
            </div>
        </section>

        <div class="card-grid">
            @foreach($trains as $train)
                @php
                    $classes = $train->classes;
                    if (is_string($classes)) {
                        $classes = json_decode($classes, true) ?: [];
                    }
                    $classes = $classes ?? [];
                @endphp

                <article class="train-box">
                    <div class="train-meta">
                        <div>
                            <h3>{{ $train->train_name }} ({{ $train->train_number }})</h3>
                            <p><strong>From:</strong> {{ $train->origin }} <strong>→</strong> <strong>To:</strong> {{ $train->destination }}</p>
                        </div>
                        <div>
                            <p><strong>Departure:</strong> {{ $train->departure_time }}</p>
                            <p><strong>Arrival:</strong> {{ $train->arrival_time }}</p>
                            <p><strong>General Class Price:</strong> ₹{{ $train->price }}</p>
                        </div>
                    </div>

                    <hr>

                    <p>🚆 First Class: ₹{{ $classes['first_class'] ?? 'N/A' }}</p>
                    <p>🛏 Sleeper: ₹{{ $classes['sleeper'] ?? 'N/A' }}</p>
                    <p>💺 Economy: ₹{{ $classes['economy'] ?? 'N/A' }}</p>
                </article>
            @endforeach
        </div>
    </main>

    @include('partials.footer')
</body>
</html>