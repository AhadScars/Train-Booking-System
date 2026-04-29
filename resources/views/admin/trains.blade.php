<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Trains</title>
    <link rel="stylesheet" href="/css/site.css">
</head>

<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>🚆 Manage Trains</h2>
                <p>Add, edit, or delete trains from the system.</p>
                <div class="form-actions">
                    <a href="/admin/add-train" class="btn">➕ Add New Train</a>
                </div>
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
                        </div>
                    </div>

                    <hr>
                    <div class="class-prices">
                        <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 15px;">
                            <div>
                                <strong>🚆 First Class</strong>
                                <p style="margin: 5px 0;">₹{{ $classes['first_class'] ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <strong>🛏 Sleeper</strong>
                                <p style="margin: 5px 0;">₹{{ $classes['sleeper'] ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <strong>💺 Economy</strong>
                                <p style="margin: 5px 0;">₹{{ $classes['economy'] ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="form-actions" style="gap: 1rem;">
                            <a href="/admin/trains/{{ $train->id }}/edit" class="btn" style="flex: 1; text-align: center;">✏️ Edit</a>
                            <form action="/admin/trains/{{ $train->id }}" method="POST" style="flex: 1;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="width: 100%; background: linear-gradient(135deg, var(--danger), #f87171);" onclick="return confirm('Are you sure you want to delete this train?');">🗑️ Delete</button>
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="form-actions" style="margin-top: 2rem;">
            <a href="/admin/dashboard" class="btn">Back to Dashboard</a>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>