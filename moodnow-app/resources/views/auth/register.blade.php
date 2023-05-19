@extends('layouts.auth')

@section('content')
<div class="container" id="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-container sign-in-container">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                <h1>Create Account</h1>
                <span class="mb-2 mt-1">use your email for registration</span>
                    <input id="first_name" type="text" placeholder="Nama Pengguna"
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name" value="{{ old('name') }}" 
                        required 
                        autocomplete="name" 
                        autofocus 
                        />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    <input id="email" type="email" placeholder="Email Address" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" 
                        required 
                        autocomplete="email" 
                        />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="password" type="password" placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        required 
                        autocomplete="new-password" 
                        />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    <input id="password-confirm" type="password" placeholder="Confirm Password"
                        class="form-control" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" 
                        />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="mt-2">
                        Register
                    </button>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Welcome Back!</h1>
                        <p class="mb-3 mt-1">To keep connected with us please login with your personal info</p>
                        <a href="{{ route('login') }}"><button class="ghost" id="signIn">Login</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
