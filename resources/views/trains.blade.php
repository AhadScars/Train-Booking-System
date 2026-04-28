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
                            <p><strong>From:</strong> {{ $train->origin }} <strong>→</strong> <strong>To:</strong>
                                {{ $train->destination }}</p>
                        </div>
                        <div>
                            <p><strong>Departure:</strong> {{ $train->departure_time }}</p>
                            <p><strong>Arrival:</strong> {{ $train->arrival_time }}</p>
                            <p><strong>General Class Price:</strong> ₹{{ $train->price }}</p>
                        </div>
                    </div>

                    <hr>
                    <div class="class-prices">
                        <div class="price-item">
                            <div>
                                <strong>🚆 First Class</strong>
                                <p>₹{{ $classes['first_class'] ?? 'N/A' }}</p>
                            </div>
                            @auth
                            <form action="/passenger-info/{{ $train->id }}/first_class" method="GET">
                                <button class="btn" type="submit" @if(empty($classes['first_class'])) disabled @endif>Book Now</button>
                            </form>
                            @else
                                <button class="btn" disabled>Login to Book</button>
                            @endauth
                        </div>

                        <div class="price-item">
                            <div>
                                <strong>🛏 Sleeper</strong>
                                <p>₹{{ $classes['sleeper'] ?? 'N/A' }}</p>
                            </div>
                            @auth
                            <form action="/passenger-info/{{ $train->id }}/sleeper" method="GET">
                                <button class="btn" type="submit" @if(empty($classes['sleeper'])) disabled @endif>Book Now</button>
                            </form>
                            @else
                                <button class="btn" disabled>Login to Book</button>
                            @endauth
                        </div>

                        <div class="price-item">
                            <div>
                                <strong>💺 Economy</strong>
                                <p>₹{{ $classes['economy'] ?? 'N/A' }}</p>
                            </div>
                            @auth
                            <form action="/passenger-info/{{ $train->id }}/economy" method="GET">
                                <button class="btn" type="submit" @if(empty($classes['economy'])) disabled @endif>Book Now</button>
                            @else
                                <button class="btn" disabled>Login to Book</button>
                            @endauth
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </main>

    @include('partials.footer')
</body>

</html>