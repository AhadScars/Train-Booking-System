<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>E-Ticket</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
    }

    .ticket {
        width: 100%;
        max-width: 900px;
        margin: auto;
        border: 1px solid #000;
        padding: 15px;
    }

    .top {
        display: flex;
        justify-content: space-between;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
    }

    .title {
        font-size: 20px;
        font-weight: bold;
        text-align: center;
    }

    .pnr {
        text-align: right;
        font-weight: bold;
    }

    .section {
        margin-top: 10px;
        border-bottom: 1px solid #000;
        padding-bottom: 8px;
    }

    .row {
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
    }

    .col {
        width: 24%;
        font-size: 13px;
    }

    .col strong {
        display: block;
        font-size: 12px;
    }

    .train-box {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        padding: 10px;
        border: 1px solid #000;
    }

    .train-box div {
        text-align: center;
        width: 30%;
    }

    .big {
        font-size: 16px;
        font-weight: bold;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .table th, .table td {
        border: 1px solid #000;
        padding: 6px;
        text-align: center;
        font-size: 13px;
    }

    .footer {
        margin-top: 10px;
        font-size: 12px;
    }

    @media print {
        body { padding: 0; }
        .ticket { border: none; }
    }
</style>
</head>

<body>

<div class="ticket">

    <!-- HEADER -->
    <div class="top">
        <div>
            <div class="title">Indian Railways E-Ticket</div>
            <div style="text-align:center">Electronic Reservation Slip</div>
        </div>

        <div class="pnr">
            PNR: {{ str_pad($passenger->id, 10, '0', STR_PAD_LEFT) }}<br>
            Booking ID: #{{ $passenger->id }}
        </div>
    </div>

    <!-- TRAIN INFO -->
    <div class="section">
        <div class="row">
            <div><strong>Train No & Name</strong> - {{ $train->train_number }} - {{ $train->train_name }}</div>
            <div><strong>Date of Journey</strong> - {{ \Carbon\Carbon::parse($train->departure_time)->format('d M Y') }}</div>
            <div><strong>Class</strong> - {{ $classLabel }}</div>
            <div><strong>Quota</strong> - General</div>
        </div>
    </div>

    <!-- ROUTE -->
    
    <!-- FROM -->
    <div class="item left">
        <div class="label">From</div>
        <div class="big">{{ $train->origin }}</div>
        <div class="time">
            {{ \Carbon\Carbon::parse($train->departure_time)->format('H:i') }}
        </div>
    </div>

    <!-- CENTER (Duration + Line) -->
    <div class="item center">
        <div class="label">Duration</div>
        <div class="big">{{ $train->duration ?? 'N/A' }}</div>

        <div class="line">
            <span class="dot"></span>
            <span class="track"></span>
            <span class="dot"></span>
        </div>
    </div>

    <!-- TO -->
    <div class="item right">
        <div class="label">To</div>
        <div class="big">{{ $train->destination }}</div>
        <div class="time">
            {{ \Carbon\Carbon::parse($train->arrival_time)->format('H:i') }}
        </div>
    </div>

</div>

    <!-- PASSENGER TABLE -->
    <table class="table">
        <thead>
            <tr>
                <th>Passenger</th>
                <th>Age</th>
                <th>Mobile</th>
                <th>Class</th>
                <th>Fare</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $passenger->name }}</td>
                <td>{{ $passenger->age }}</td>
                <td>{{ $passenger->mobile }}</td>
                <td>{{ $classLabel }}</td>
                <td>₹{{ number_format($passenger->price,2) }}</td>
            </tr>
        </tbody>
    </table>

    <!-- BOOKING DETAILS -->
    <div class="section">
        <div class="row">
            <div><strong>Booking Date</strong> - {{ $passenger->created_at->format('d M Y') }}</div>
            <div><strong>Booked By</strong> - {{ $passenger->user->name ?? 'N/A' }}</div>
            <div><strong>Status</strong> - CONFIRMED</div>
            <div><strong>Coach/Seat</strong> - NA</div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <p><strong>Important:</strong> Carry valid ID proof during journey.</p>
        <p>Arrive 30 minutes before departure.</p>
        <p>Generated on: {{ now()->format('d M Y H:i') }}</p>
    </div>

</div>

</body>
</html>