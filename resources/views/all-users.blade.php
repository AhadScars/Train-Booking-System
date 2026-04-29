<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="stylesheet" href="/css/site.css">
</head>

<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>👥 All Users</h2>
                <p>View all user profiles on the platform</p>
            </div>
        </section>

        @if($users->count() > 0)
            <div class="card-grid">
                @foreach($users as $user)
                    <div class="train-box">
                        <div style="background: rgba(56, 189, 248, 0.08); padding: 1.5rem; border-radius: 1rem; border-left: 3px solid var(--accent);">
                            <h3 style="margin: 0 0 1rem;">{{ $user->name }}</h3>
                            <p style="margin: 0.5rem 0;"><strong>📧 Email:</strong> {{ $user->email }}</p>
                            <p style="margin: 0.5rem 0;"><strong>@️ Username:</strong> {{ $user->username }}</p>
                            <p style="margin: 0.5rem 0;"><strong>📅 Member Since:</strong> {{ $user->created_at->format('d M Y') }}</p>
                            
                            <div class="form-actions" style="margin-top: 1.5rem;">
                                <a href="/profile/{{ $user->id }}" class="btn" style="flex: 1; text-align: center;">View Profile</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="form-card">
                <p style="text-align: center; padding: 2rem; color: var(--text-muted);">
                    No users found.
                </p>
            </div>
        @endif

        <div class="form-actions" style="margin-top: 2rem;">
            <a href="/trains" class="btn">Back to Trains</a>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>