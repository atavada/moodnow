@extends('layouts.auth')

@section('content')
<div class="container" id="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-container sign-in-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <h1>Reset Password</h1>
                <span class="mb-2 mt-1">need verification email to reset password</span>
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
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    <button type="submit" class="mt-2">
                        {{ __('Send Reset Link') }}
                    </button>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p class="mb-3 mt-1">Type email to reset your password or</p>
                        <a href="{{ route('login') }}"><button class="ghost" id="signIn">Login</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
