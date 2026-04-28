<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/css/site.css">
</head>

<body>
    @include('partials.header')

    <div class="container">
    <div class="box">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <br>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</div>

@include('partials.footer')

</body>
</html>