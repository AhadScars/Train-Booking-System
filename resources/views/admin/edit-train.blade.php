<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Train</title>
    <link rel="stylesheet" href="/css/site.css">
</head>

<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>✏️ Edit Train</h2>
                <p>Update train details and pricing.</p>
            </div>
        </section>

        <div class="form-card">
            <form action="/admin/trains/{{ $train->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="train_name">Train Name</label>
                    <input type="text" id="train_name" name="train_name" value="{{ old('train_name', $train->train_name) }}" required>
                    @error('train_name')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="origin">Origin</label>
                    <input type="text" id="origin" name="origin" value="{{ old('origin', $train->origin) }}" required>
                    @error('origin')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="destination">Destination</label>
                    <input type="text" id="destination" name="destination" value="{{ old('destination', $train->destination) }}" required>
                    @error('destination')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="departure_time">Departure Time (HH:MM)</label>
                    <input type="time" id="departure_time" name="departure_time" value="{{ old('departure_time', $train->departure_time) }}" required>
                    @error('departure_time')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="arrival_time">Arrival Time (HH:MM)</label>
                    <input type="time" id="arrival_time" name="arrival_time" value="{{ old('arrival_time', $train->arrival_time) }}" required>
                    @error('arrival_time')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">General Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $train->price) }}" min="0" step="0.01" required>
                    @error('price')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <hr style="margin: 2rem 0; border: none; border-top: 1px solid rgba(148, 163, 184, 0.2);">

                <h3>Class Pricing</h3>

                <div class="form-group">
                    <label for="first_class">First Class Price</label>
                    <input type="number" id="first_class" name="first_class" value="{{ old('first_class', $train->classes['first_class'] ?? 0) }}" min="0" step="0.01">
                    @error('first_class')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sleeper">Sleeper Price</label>
                    <input type="number" id="sleeper" name="sleeper" value="{{ old('sleeper', $train->classes['sleeper'] ?? 0) }}" min="0" step="0.01">
                    @error('sleeper')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="economy">Economy Price</label>
                    <input type="number" id="economy" name="economy" value="{{ old('economy', $train->classes['economy'] ?? 0) }}" min="0" step="0.01">
                    @error('economy')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">💾 Save Changes</button>
                    <a href="/admin/trains" class="btn" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.14);">Cancel</a>
                </div>
            </form>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>