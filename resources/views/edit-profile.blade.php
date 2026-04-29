<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="/css/site.css">
</head>

<body>
    @include('partials.header')

    <main class="container">
        <section class="hero hero-compact">
            <div class="hero-content">
                <h2>✏️ Edit Profile</h2>
                <p>Update your profile information</p>
            </div>
        </section>

        <div class="form-card" style="max-width: 600px;">
            <form action="/profile/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span style="color: var(--danger);">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" value="{{ $user->username }}" disabled style="opacity: 0.6;">
                    <small style="color: var(--text-muted);">Username cannot be changed</small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">💾 Save Changes</button>
                    <a href="/profile/{{ $user->id }}" class="btn" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.14);">Cancel</a>
                </div>
            </form>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>