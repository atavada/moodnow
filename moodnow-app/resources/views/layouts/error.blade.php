<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>MoodNow &dash; Error</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Creative Portfolio Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Kross Template v1.0">
    
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/iconmoodnow.png') }}" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('kroos/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('kroos/plugins/slick/slick.css') }}">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('kroos/plugins/themify-icons/themify-icons.css') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Main Stylesheet -->
    <link href="{{ asset('error/style.css') }}" rel="stylesheet">

    <!-- Addition Stylesheet -->
    <link href="{{ asset('error/error.css') }}" rel="stylesheet">

</head>

<body>
    <header class="navigation fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand h3" href="{{ route('home') }}">MoodNow</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ setActive('home') }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item {{ setActive('about') }}">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item {{ setActive('contact') }}">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Detect Now</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login / Register') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item {{ setActive('detect') }}">
                            <a class="nav-link" href="{{ route('detect') }}">Detect Mood</a>
                        </li>
                        <li class="nav-item {{ setActive('consul-user') }}">
                            <a class="nav-link" href="{{ route('user.consul') }}">Consultation</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <div class="d-sm-inline-block nav-link">Hi,&nbsp;{{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item nav-link text-dark">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                                <a href="#" class="dropdown-item nav-link text-dark">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                                <a href="{{ route('logout') }}" class="dropdown-item nav-link text-danger"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> 
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                @endguest
                
            </ul>
            </div>
        </nav>
    </header>

<!-- page title -->
<section class="page-title bg-primary position-relative">
    <!-- background shapes -->
    <img src="{{ asset('kroos/images/illustrations/page-title.png') }}" alt="illustrations" class="bg-shape-1 w-100">
    <img src="{{ asset('kroos/images/illustrations/leaf-pink-round.png') }}" alt="illustrations" class="bg-shape-2">
    <img src="{{ asset('kroos/images/illustrations/dots-cyan.png') }}" alt="illustrations" class="bg-shape-3">
    <img src="{{ asset('kroos/images/illustrations/leaf-orange.png" alt="illustrations') }}" class="bg-shape-4">
</section>
<!-- /page title -->

@yield('content')

<!-- jQuery -->
<script src="{{ asset('kroos/plugins/jQuery/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('kroos/plugins/bootstrap/bootstrap.min.js') }}"></script>
<!-- slick slider -->
<script src="{{ asset('kroos/plugins/slick/slick.min.js') }}"></script>
<!-- filter -->
<script src="{{ asset('kroos/plugins/shuffle/shuffle.min.js') }}"></script>

<!-- Main Script -->
<script src="{{ asset('kroos/js/script.js') }}"></script>

<!-- Addition Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
<script src="{{ asset('error/error.js') }}"></script>

</body>
</html>