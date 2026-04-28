<header>
    <h1><a href="/homepage">🚆 Train Booking</a></h1>
    <nav>
        <a href="/homepage">Home</a>
        <a href="/about">About Us</a>
        <a href="/contact-us">Contact Us</a>
        @auth
            <a href="/trains">Trains</a>
            <a href="/bookings">Show Train Bookings</a>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </nav>
</header>