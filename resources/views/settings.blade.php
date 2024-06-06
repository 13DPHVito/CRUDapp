<!-- settings.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts.css') }}">

    <title>User Settings</title>
</head>
<body>
    <div class="header">
        <div class="header-contents">
            <a href="#default" class="logo.jpg">
                <img class="logo" href="/posts" src="{{ asset('logo.png') }}" alt="Logo">
            </a>
            <div class="header-right">
                <a href="/goals">Goals</a>
                <a class="active" href="/posts">Home</a>
                <a href="/settings">Settings</a>
                @if (auth()->check() && auth()->user()->is_admin)
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                @endif
                <form action="/logout" method="POST">
                    @csrf
                    <button class="greenButton">Log out</button>
                </form>
            </div>
        </div>
    </div>
    <h1>User Settings</h1>
    <form action="{{ route('update-profile') }}" method="POST">
        @csrf
        <label for="name">Change Name:</label><br>
        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"><br><br>
        <label for="email">Change Email:</label><br>
        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"><br><br>
        <label for="password">Change Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <button type="submit">Update Profile</button>
    </form>
</body>
</html>
