<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/site.css">
</head>

<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>🛡️ Admin Dashboard</h2>
                <p>Manage trains, view bookings, and monitor your system.</p>
            </div>
        </section>

        <div class="card-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
            <div class="train-box" style="text-align: center; padding: 2rem;">
                <h3 style="margin: 0 0 0.5rem; color: var(--accent); font-size: 2.5rem;">{{ $totalTrains }}</h3>
                <p style="margin: 0; color: var(--text-muted);">Total Trains</p>
                <a href="/admin/trains" class="btn" style="display: inline-block; margin-top: 1rem;">View Trains</a>
            </div>
            <div class="train-box" style="text-align: center; padding: 2rem;">
                <h3 style="margin: 0 0 0.5rem; color: var(--accent); font-size: 2.5rem;">{{ $totalBookings }}</h3>
                <p style="margin: 0; color: var(--text-muted);">Total Bookings</p>
                <a href="/admin/bookings" class="btn" style="display: inline-block; margin-top: 1rem;">View Bookings</a>
            </div>
            <div class="train-box" style="text-align: center; padding: 2rem;">
                <h3 style="margin: 0 0 0.5rem; color: var(--accent); font-size: 2.5rem;">{{ $totalUsers }}</h3>
                <p style="margin: 0; color: var(--text-muted);">Total Users</p>
                <a href="/users" class="btn" style="display: inline-block; margin-top: 1rem;">View Users</a>
            </div>
        </div>

        <div style="margin-top: 3rem;">
            <h3>📊 Recent Bookings</h3>
            @if($recentBookings->count() > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
                        <thead style="background: rgba(56, 189, 248, 0.1); border-bottom: 2px solid var(--accent);">
                            <tr>
                                <th style="padding: 1rem; text-align: left;">Passenger</th>
                                <th style="padding: 1rem; text-align: left;">Train</th>
                                <th style="padding: 1rem; text-align: left;">Class</th>
                                <th style="padding: 1rem; text-align: left;">Price</th>
                                <th style="padding: 1rem; text-align: left;">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentBookings as $booking)
                                <tr style="border-bottom: 1px solid rgba(148, 163, 184, 0.1);">
                                    <td style="padding: 1rem;">{{ $booking->name }}</td>
                                    <td style="padding: 1rem;">{{ $booking->train->train_name }}</td>
                                    <td style="padding: 1rem;">{{ ucfirst(str_replace('_', ' ', $booking->class)) }}</td>
                                    <td style="padding: 1rem;">₹{{ $booking->price }}</td>
                                    <td style="padding: 1rem;">{{ $booking->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="color: var(--text-muted); text-align: center; padding: 2rem;">No bookings yet.</p>
            @endif
        </div>

        <div class="form-actions" style="margin-top: 2rem;">
            <a href="/admin/trains" class="btn">Manage Trains</a>
            
            <a href="/admin/bookings" class="btn">View All Bookings</a>
        </div>
            
    </main>

    @include('partials.footer')
</body>

</html>