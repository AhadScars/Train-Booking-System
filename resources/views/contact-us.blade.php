<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Train Booking</title>
    <link rel="stylesheet" href="/css/site.css">
</head>
<body>

    @include('partials.header')

    <div class="container">
        <div class="box">
            <h1>Contact Us</h1>

            <form>
                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Your Email" required>
                <textarea placeholder="Your Message" required></textarea>
                <br><br>
                <button type="submit" class="btn">Send Message</button>
            </form>
            <br>
            <div class="info">
                <p>📍 Address: Railway Office, India</p>
                <p>📞 Phone: +91 98765 43210</p>
                <p>✉️ Email: support@trainbooking.com</p>
            </div>
        </div>
    </div>

    @include('partials.footer')

</body>
</html>