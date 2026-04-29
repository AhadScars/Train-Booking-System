<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bookings</title>
    <link rel="stylesheet" href="/css/site.css">
</head>

<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>📊 All Train Bookings</h2>
                <p>View all bookings across the system.</p>
            </div>
        </section>

        @if($bookings->count() > 0)
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: rgba(56, 189, 248, 0.1); border-bottom: 2px solid var(--accent);">
                    <tr>
                        <th style="padding: 1rem; text-align: left; font-weight: 700;">Passenger Name</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 700;">Train</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 700;">Train Number</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 700;">Class</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 700;">Age</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 700;">Mobile</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 700;">Price</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 700;">Booked On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr style="border-bottom: 1px solid rgba(148, 163, 184, 0.1);">
                            <td style="padding: 1rem;">{{ $booking->name }}</td>
                            <td style="padding: 1rem;">{{ $booking->train->train_name }}</td>
                            <td style="padding: 1rem;">{{ $booking->train->train_number }}</td>
                            <td style="padding: 1rem;">{{ ucfirst(str_replace('_', ' ', $booking->class)) }}</td>
                            <td style="padding: 1rem;">{{ $booking->age }}</td>
                            <td style="padding: 1rem;">{{ $booking->mobile }}</td>
                            <td style="padding: 1rem; color: var(--accent); font-weight: 600;">₹{{ number_format($booking->price, 2) }}</td>
                            <td style="padding: 1rem;">{{ $booking->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="form-card">
            <p style="text-align: center; padding: 2rem; color: var(--text-muted);">
                No bookings found.
            </p>
        </div>
        @endif

        <div class="form-actions" style="margin-top: 2rem;">
            <a href="/admin/dashboard" class="btn">Back to Dashboard</a>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>