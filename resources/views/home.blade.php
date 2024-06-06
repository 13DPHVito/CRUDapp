<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>

  <div class="container">
 

    <div class="login-form">
      <h2>Sign in To Goal Post</h2>
      <p>Free & efficient goal planner!</p>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
     
      <form action="/login" method="POST">
        @csrf
        <div class="login-input">
          <input name="loginname" type="text" placeholder="email or username" value="{{ old('loginname') }}">
        </div>
        <div class="login-input">
          <input name="loginpassword" type="password" placeholder="password">
        </div>
        <button class="login-button">Log in</button>
      </form>
      <div class="login-links">
        <p>or Sign up Using</p>
        <div class="logos">
          <a href="{{ url('/auth/github/redirect') }}" class="social-link github"><i class="fab fa-github"></i></a>
          <a href="{{ url('/auth/google/redirect') }}" class="social-link google"><i class="fab fa-google"></i></a>
          <a href="{{ url('/auth/twitter/redirect') }}" class="social-link twitter"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
      
      <div class="login-link">
        <p>or <a href="/auth">Register</a></p>
      </div>
      
    </div>
  </div>
</body>
</html>
