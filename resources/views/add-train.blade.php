<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Train</title>
    <link rel="stylesheet" href="/css/site.css">
</head>
<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>➕ Add New Train</h2>
                <p>Add a new train to the system with class pricing</p>
            </div>
        </section>

        <div class="form-card">
            <form method="POST" action="/admin/add-train">
                @csrf

                <div class="form-group">
                    <label for="train_name">Train Name</label>
                    <input id="train_name" type="text" name="train_name" placeholder="Enter train name" required>
                    @error('train_name')<span style="color: var(--danger);">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="train_number">Train Number</label>
                    <input id="train_number" type="text" name="train_number" placeholder="Enter train number" required>
                    @error('train_number')<span style="color: var(--danger);">{{ $message }}</span>@enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="origin">Origin</label>
                        <input id="origin" type="text" name="origin" placeholder="Starting city" required>
                        @error('origin')<span style="color: var(--danger);">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <input id="destination" type="text" name="destination" placeholder="Ending city" required>
                        @error('destination')<span style="color: var(--danger);">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="departure_time">Departure Time</label>
                        <input id="departure_time" type="time" name="departure_time" required>
                        @error('departure_time')<span style="color: var(--danger);">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="arrival_time">Arrival Time</label>
                        <input id="arrival_time" type="time" name="arrival_time" required>
                        @error('arrival_time')<span style="color: var(--danger);">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">General Class Price</label>
                    <input id="price" type="number" name="price" placeholder="Enter general price" min="0" step="0.01" required>
                    @error('price')<span style="color: var(--danger);">{{ $message }}</span>@enderror
                </div>

                <hr style="margin: 2rem 0; border: none; border-top: 1px solid rgba(148, 163, 184, 0.2);">

                <h3>🎫 Class Pricing</h3>

                <div class="form-group">
                    <label for="first_class">🚆 First Class Price</label>
                    <input id="first_class" type="number" name="first_class" placeholder="First class price" min="0" step="0.01">
                    @error('first_class')<span style="color: var(--danger);">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="sleeper">🛏 Sleeper Class Price</label>
                    <input id="sleeper" type="number" name="sleeper" placeholder="Sleeper price" min="0" step="0.01">
                    @error('sleeper')<span style="color: var(--danger);">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="economy">💺 Economy Class Price</label>
                    <input id="economy" type="number" name="economy" placeholder="Economy price" min="0" step="0.01">
                    @error('economy')<span style="color: var(--danger);">{{ $message }}</span>@enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">💾 Save Train</button>
                    <a href="/admin/trains" class="btn" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.14);">Cancel</a>
                </div>
            </form>
        </div>

    @include('partials.footer')
</body>
</html>