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
        <section class="form-card">
            <h2>Add New Train</h2>
            <form method="POST" action="/add-train">
                @csrf

                <label for="train_name">Train Name</label>
                <input id="train_name" type="text" name="train_name" placeholder="Train Name" required>

                <label for="train_number">Train Number</label>
                <input id="train_number" type="text" name="train_number" placeholder="Train Number" required>

                <div class="card-grid">
                    <div>
                        <label for="origin">Origin</label>
                        <input id="origin" type="text" name="origin" placeholder="Origin" required>
                    </div>
                    <div>
                        <label for="destination">Destination</label>
                        <input id="destination" type="text" name="destination" placeholder="Destination" required>
                    </div>
                </div>

                <div class="card-grid">
                    <div>
                        <label for="departure_time">Departure Time</label>
                        <input id="departure_time" type="time" name="departure_time" required>
                    </div>
                    <div>
                        <label for="arrival_time">Arrival Time</label>
                        <input id="arrival_time" type="time" name="arrival_time" required>
                    </div>
                </div>

                <label for="price">General Class Price</label>
                <input id="price" type="number" name="price" placeholder="General Class Price" required>

                <hr>

                <h3>Classes</h3>

                <label for="first_class">First Class Price</label>
                <input id="first_class" type="number" name="first_class" placeholder="First Class Price">

                <label for="sleeper">Sleeper Class Price</label>
                <input id="sleeper" type="number" name="sleeper" placeholder="Sleeper Class Price">

                <label for="economy">Economy Class Price</label>
                <input id="economy" type="number" name="economy" placeholder="Economy Class Price">

                <div class="form-actions">
                    <button type="submit">Save Train</button>
                </div>
            </form>
        </section>
    </main>

    @include('partials.footer')
</body>
</html>