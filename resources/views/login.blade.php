<!DOCTYPE html>
<html lang="en">
<head>
    <title>AL RAMZ :: Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">

</head>
<body>
<div class="limiter">
    <div class="container-login100" style="background-image: url({{ asset('images/alramz-background.jpg') }});">
        <div class="wrap-login100">
            @if(session()->has('error'))<div style="margin-bottom: 20px; font-size: 18px; color: #FF0000; text-align: center; text-transform: uppercase;">Credentials do not exists!!</div>@endif
            <form class="login100-form validate-form" method="post">@csrf
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}" autocomplete="off">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>
                <div class="container-login100-form-btn" style="padding: 20px">
                    <button class="login100-form-btn" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

