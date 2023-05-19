@extends('layouts.auth')

@section('content')
<div class="container" id="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-container sign-in-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <h1>Login</h1>
                <span class="mb-2 mt-1">login to get access to moodnow</span>
                    <input id="email" type="email" placeholder="Email Address" 
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
                        <a href="{{ route('password.request') }}" class="text-small mt-2">{{ __('Forgot Your Password?') }}</a>
                    @endif
                    
                    <button type="submit">
                        Login
                    </button>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p class="mb-3 mt-1">Enter your personal details and start journey with us</p>
                        <a href="{{ route('register') }}"><button class="ghost" id="signUp">Register</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop