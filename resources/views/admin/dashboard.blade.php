<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts.css') }}">

    <title>Admin Dashboard</title>
</head>
<body>
    <div class="admin-dashboard">
        <h1>Welcome to the Admin Dashboard</h1>
        <!-- Admin dashboard content -->

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h2>Posts</h2>
        <ul>
            @foreach ($posts as $post)
                <li>
                    {{ $post->Title }}
                    <form action="{{ route('admin.removePost', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to remove this post?')">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <h2>Users</h2>
        <ul>
            @foreach ($users as $user)
                <li>
                    {{ $user->name }} ({{ $user->email }})
                    <form action="{{ route('admin.removeUser', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to remove this user?')">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
