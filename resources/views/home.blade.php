<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" /></head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <body>
    <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
 
 
    <div class="container">
      <div class="header">
       
      </div>
      <div class="login-form">
        <h2>Login</h2>
        <form action="/login" method="POST">
          @csrf
          <div class="login-input">
            <input name="loginname" type="text" placeholder="name">
          </div>
          <div class="login-input">
            <input name="loginpassword" type="password" placeholder="password">
          </div>
          <button class="login-button">Log in</button>
        </form>
        <div class.login-link>
          <p>or <a href="/auth">Register</a></p>
        </div>
      </div>
    </div>
 
 
  </body>
</html>