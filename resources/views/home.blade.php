 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<div class="background-container">
    
</div>

<div class="header">
   
    @csrf
    <form action="/logout" method="POST">
        @auth
        {{ auth()->user()->name }}</a>
        @endauth
        @csrf
        <button>Log Out</button>

    </form>
 
 

</div>
 <div class="contents"> 
<div class="introductionText">
<div class="bothCon"> 
<div class="firstCon">
 
@auth
 

<div class="postDiscussion">
    <form action="/create-post" method="POST">
    <h2>Create a new Post</h2>
    @csrf 
    <input type="text" name="title" placeholder="title">
    <textarea name="body" placeholder="body content..."></textarea> 
    <button>Save Post </button>

    </title>
    </form>
</div>

<div class="postContainer">
<div>
<h2>All Posts</h2>
@foreach($posts as $post)
<div class="post">
 
    <h3>{{$post['title']}} by {{$post->user->name}}
    <h3>{{$post['Title']}}</h3>
    {{$post['body']}}
    <p><a href="/edit-post/{{$post->id}}">EDIT</a></p>
    <form action="/delete-post/{{$post->id}}" method="POST">
    @csrf
    @method('DELETE')
    <button>DELETE</button>
    </form>
</div>
@endforeach
</div>


@else
<div class="secondCon">
<div class="registerLoginContainer">
    <form action="/register" method="POST">
        @csrf
        <input name="name" type="text" placeholder="name">
        <input name="email" type="text" placeholder="email">
        <input name="password" type="password" placeholder="password">
        <button>Register</button>
        
        <a class="signIn" href="#">or Sign in</a>
    </div>
</div>
    </form>
 </div>
 
</body>
 
</html>
 

 
@endauth

</div>
 