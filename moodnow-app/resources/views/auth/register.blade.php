<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Sekolah</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/iconmoodnow.png') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
</head>

<body>
    
    <div class="container" id="container">
        <div class="form-container sign-in-container">
          <form action="#">
            <h1>Create Account</h1>
            <span style="margin-bottom: 10px">or use your email for registration</span>
            <input type="text" placeholder="Name" />
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="Password" />
            <button style="margin-top: 10px">Sign Up</button>
        </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                  <h1>Welcome Back!</h1>
                  <p>To keep connected with us please login with your personal info</p>
                  <a href="{{ route('login') }}"><button class="ghost" id="signIn">Sign In</button></a>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Template JS File -->
    <script src="https://kit.fontawesome.com/53d82b54ee.js" crossorigin="anonymous"></script>
    <script src="{{ asset('auth/script.js') }}"></script>
</body>

</html>
