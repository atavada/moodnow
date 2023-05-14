<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>MoodNow &dash; Detect Your Mood</title>

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
    <link href="{{ asset('kroos/css/style.css') }}" rel="stylesheet">

    <!-- Addition Stylesheet -->

    @yield('style')

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
                <li class="nav-item {{ setActive('/') }}">
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
                        <li class="nav-item {{ setActive('history') }}">
                            <a class="nav-link" href="#">Tracker</a>
                        </li>
                        <li class="nav-item {{ setActive('consul-user') }}">
                            <a class="nav-link" href="{{ route('user.consul') }}">Consultation</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <div class="d-sm-inline-block nav-link">Hi,&nbsp;{{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu">
                                @can('dashboards.index')
                                <a href="{{ route('admin.dashboard.index') }}" class="dropdown-item nav-link text-dark">
                                    <i class="fa fa-gauge"></i> &nbsp;&nbsp;Dashboard
                                </a>
                                @endcan
                                <a href="#" class="dropdown-item nav-link text-dark">
                                    <i class="fas fa-cog"></i> &nbsp;&nbsp;Settings
                                </a>
                                <a href="{{ route('logout') }}" class="dropdown-item nav-link text-danger"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> &nbsp;&nbsp;{{ __('Logout') }}
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

    @yield('content')

    <!-- footer -->
    <footer class="bg-dark footer-section">
        <div class="section">
            <div class="container">
            <div class="row">
                <div class="col-md-4">
                <h5 class="text-light">Email</h5>
                <p class="text-white paragraph-lg font-secondary">sobat.moodnow@gmail.com</p>
                </div>
                <div class="col-md-4">
                <h5 class="text-light">Phone</h5>
                <p class="text-white paragraph-lg font-secondary">+62 823 xxxx xxxx</p>
                </div>
                <div class="col-md-4">
                <h5 class="text-light">Address</h5>
                <p class="text-white paragraph-lg font-secondary">Universitas Negeri Malang</p>
                </div>
            </div>
            </div>
        </div>
        <div class="border-top text-center border-dark py-5">
            <p class="mb-0 text-light">Copyright &copy;<script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
            </script> Designed &amp; Developed by <a class="text-white-50" href="Themefisher">MoodNow</a></p>
        </div>
    </footer>
    <!-- /footer -->

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
    <script src="https://kit.fontawesome.com/53d82b54ee.js" crossorigin="anonymous"></script>

</body>
</html>