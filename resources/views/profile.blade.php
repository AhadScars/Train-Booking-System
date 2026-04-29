<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="/css/site.css">
</head>

<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>👤 User Profile</h2>
                <p>View profile information</p>
            </div>
        </section>

        <div class="form-card" style="max-width: 600px;">
            <div style="background: rgba(56, 189, 248, 0.08); padding: 1.5rem; border-radius: 1rem; border-left: 3px solid var(--accent); margin-bottom: 2rem;">
                <p style="margin: 0.5rem 0;"><strong>👤 Name:</strong> {{ $user->name }}</p>
                <p style="margin: 0.5rem 0;"><strong>📧 Email:</strong> {{ $user->email }}</p>
                <p style="margin: 0.5rem 0;"><strong>@️ Username:</strong> {{ $user->username }}</p>
                <p style="margin: 0.5rem 0;"><strong>🏷️ Role:</strong> <span style="color: var(--accent); font-weight: 600;">{{ ucfirst($user->role) }}</span></p>
                <p style="margin: 0.5rem 0;"><strong>📅 Member Since:</strong> {{ $user->created_at->format('d M Y') }}</p>
            </div>

            <div class="form-actions">
                @if(auth()->id() === $user->id || auth()->user()->isAdmin())
                    <a href="/profile/{{ $user->id }}/edit" class="btn">✏️ Edit Profile</a>
                @endif
                <a href="/users" class="btn" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.14);">Back to Users</a>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>