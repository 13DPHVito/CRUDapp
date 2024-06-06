<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/76706864c8.js" crossorigin="anonymous"></script>
    <title>Posts</title>
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

    @auth
    <div class="container">
        <section class="introductionSection">
            <img class="profileImage" src="https://robohash.org/mail@ashallendesign.co.uk">
            <p>Hello, {{ auth()->user()->name }}!</p>
        </section>

        <div class="createPost">
            <div class="contents">
                <h2>Create a New Post</h2>
                <form action="/create-post" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="post title">
                    <textarea name="body" placeholder="body content..."></textarea>
                    <button class="greenButton">Save Post</button>
                </form>
            </div>
        </div>

        <div class="posts-container">
            <h2>All Posts</h2>
            @foreach($posts as $post)
                <div class="post">
                    <h3>{{ $post->user->name }}</h3>
                    <h3>{{ $post->Title }}</h3>
                    <p>{{ $post->body }}</p>
                    @if (auth()->check() && (auth()->user()->id === $post->user_id || auth()->user()->is_admin))
                        <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                        <form action="/delete-post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="greenButton">Delete</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    @endauth

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">Goal Plan.com <i>CODE WANTS TO BE SIMPLE</i> is an initiative to help the upcoming programmers with the code...</p>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2024 All Rights Reserved by
                        <a href="#">Goal Plan</a>.
                    </p>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
