<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!DOCTYPE html>
<html>
<head>
    <title>Login/Register</title>
</head>
<body>
    <header class="header">
        <a href="/login">Register</a> 
        <a href="#">Settings</a>
        </header>
    <div class="contents"> 
    <div class="loginContainer">
     
        <form action="/login" method="POST">
             <h2 class="mb-5">  
                Sign in to BlogPost
            </h2>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label > Username</label><br>
            <input class="mb-3" type="text" name="loginname"><br>
            <div class="passwordContainer"><label class="">Password</label> <a href="#">Forgot Password?</a><br></div>
            <input type="password" name="loginpassword"><br><br>
            <button class="mt-1" type="submit">Sign in</button>
            <p class="mt-3">New to GitHub? <a href="{{ url('/register') }}">Create an account</a></p>
        </form> 
    
    </div>

 
</div>
</body>
</html>


<script src="{{ asset('js/loginform.js') }}"></script>
</body>
</html>
