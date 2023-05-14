<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Sekolah</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/school.svg') }}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body style="background: #e2e8f0">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img
                                src="{{ asset('assets/img/iconmoodnow.png') }}"
                                alt="logo"
                                width="100"
                                class="shadow-light rounded-circle"
                            />
                        </div>

                        <div class="card card-primary">
                            <div class="card-header"><h4>{{ __('Login') }}</h4></div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input
                                            id="email"
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                            name="email"
                                            tabindex="1"
                                            required
                                            autocomplete="email"
                                            autofocus
                                        />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="control-label">{{ __('Password') }}</label>
                                        <input
                                            id="password"
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror" 
                                            required 
                                            autocomplete="current-password"
                                            name="password"
                                            tabindex="2"
                                            required
                                        />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input
                                                type="checkbox"
                                                name="remember"
                                                class="custom-control-input"
                                                tabindex="3"
                                                id="remember"
                                                {{ old('remember') ? 'checked' : '' }}
                                            />
                                            <label
                                                class="custom-control-label"
                                                for="remember-me"
                                                > {{ __('Remember Me') }}</label
                                            >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-lg btn-block"
                                            tabindex="4"
                                        >
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                        <div class="float-right mt-2">
                                            <a href="{{ route('password.request') }}" class="text-small">{{ __('Forgot Your Password?') }}</a>
                                        </div>
                                        @endif

                                    </div>
                                </form>
                                
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Don't have an account?
                            <a href="{{ route('register') }}">Create One</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
