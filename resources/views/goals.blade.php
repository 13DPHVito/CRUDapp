<!-- resources/views/goals.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/goals.css') }}">
    <title>Goals</title>
</head>
<body>
    <div class="header">
        <div class="header-contents">
            <a href="/posts" class="logo.jpg">
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
    <div class="container">
        <h1>Goals</h1>

        <!-- Display existing goals -->
     <!-- Display existing goals -->
<!-- Display existing goals -->
<ul class="goal-list">
    @foreach ($goals as $goal)
        @if ($goal->user_id === auth()->id())
            <li>
                <label for="goal-{{ $goal->id }}">{{ $goal->title }}</label>
                <p>{{ $goal->description }}</p>
                <p><strong>Start Date:</strong> {{ $goal->start_date }}</p>
                <p><strong>Due Date:</strong> {{ $goal->due_date }}</p>
                <form method="POST" action="{{ route('goals.destroy', $goal->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Remove</button>
                </form>
            </li>
        @endif
    @endforeach
</ul>



        <!-- Form to input new goal -->
        <form method="POST" action="{{ route('goals.store') }}" class="goal-form">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
            <br>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
            <br>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date">
            <br>
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" id="due_date" required>
            <br>
            <button type="submit" class="submit-button">Add Goal</button>
        </form>
        
        <!-- Form to mark a goal as completed -->
      
        
    </div>

 
</body>
</html>
