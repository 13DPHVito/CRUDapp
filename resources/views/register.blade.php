<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/register.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

 
    <title>Join Us</title>
</head>
<body>
<header class="header">
<a href="/login">Sign in</a> 
<a href="#">Settings</a>
</header>
<div class="loginContainer">
     
    <form action="/register" method="POST">
        @csrf
 
        <h2 class="mb-5 text-center">  
            Register to BlogPost
        </h2>
        <label>Name</label>
        <input name="name" type="text">
        <label>email address</label><br>
        <input name="email" class="mb-3" type="text"><br>
        <div class="passwordContainer"><label class="">Password</label> <a href="#">Forgot Password?</a><br></div>
        <input type="password" name="password"><br><br>
        <button class="mt-1" type="submit">Register</button>
    </form>
    

     </form>

</div>

 

    <div class="area" >
        <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
        </ul>
</div >

      
    
</body>
</html>