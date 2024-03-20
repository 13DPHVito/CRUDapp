<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/loginRegisterPage.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<div class="background-container"></div>
<div class="contents">
    <div class="introductionText">
        <div class="bothCon">
            <div class="firstCon">
                <h1>facebook</h1>
                <p>Connect with friends.</p>
            </div>

            <div class="secondCon">
                <div class="registerLoginContainer">
                    <!-- Registration Form -->
                    <form action="/register" method="POST">
                        @csrf
                        <input name="name" type="text" placeholder="name">
                        <input name="email" type="text" placeholder="email">
                        <input name="password" type="password" placeholder="password">
                        <button>Register</button>
                    </form>
                    <p>Or Sign In</p>
                    <!-- Login Form -->
                    <form action="/login" method="POST">
                        @csrf
                        <input name="loginname" type="text" placeholder="email">
                        <input name="loginpassword" type="password" placeholder="password">
                        <button>Login</button>
                    </form>

                    <a class="signIn" href="#">or Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ownerName">
    <a>Lepre</a>
</div>
</body>
</html>
