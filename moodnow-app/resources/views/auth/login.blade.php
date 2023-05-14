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
        <div class="row">
            <div class="col-12 col-md-6">
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <h1>{{ __('Login') }}</h1>
            <span style="margin-bottom: 10px">login to get access to moodnow</span>
                
                <input id="email" type="email" placeholder="Email" 
                    class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    name="email"
                    tabindex="1"
                    required
                    autocomplete="email"
                    autofocus
                    />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror

                <input id="password" type="password" placeholder="Password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        required 
                        autocomplete="current-password"
                        name="password"
                        tabindex="2"
                        required
                    />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-small">{{ __('Forgot Your Password?') }}</a>
                @endif
                
                <button
                    type="submit"
                    tabindex="4">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <a href="{{ route('register') }}"><button class="ghost" id="signUp">Sign Up</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    </div>

    <!-- Template JS File -->
    <script src="https://kit.fontawesome.com/53d82b54ee.js" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('assets/js/scripts.js') }}"></script> --}}
</body>

</html>
