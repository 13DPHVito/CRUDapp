<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
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
      <h2>Register for Goal Post</h2>
      <p>Join our community!</p>
      
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      
      <form action="/register" method="POST">
        @csrf
        <div class="login-input">
          <input name="name" type="text" placeholder="name" value="{{ old('name') }}">
        </div>
        <div class="login-input">
          <input name="email" type="text" placeholder="email" value="{{ old('email') }}">
        </div>
        <div class="login-input">
          <input name="password" type="password" placeholder="password">
        </div>
        <button class="login-button" type="submit">Register</button>
      </form>
      <div class="login-link">
        <div class="logos">
            <a href="{{ url('/auth/github/redirect') }}" class="social-link github"><i class="fab fa-github"></i></a>
            <a href="{{ url('/auth/google/redirect') }}" class="social-link google"><i class="fab fa-google"></i></a>
            <a href="{{ url('/auth/twitter/redirect') }}" class="social-link twitter"><i class="fab fa-twitter"></i></a>
          </div>
        <p>Or <a href="/">Log in</a></p>
      </div>
    </div>
  </div>
</body>
</html>
