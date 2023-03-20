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
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/iconmoodnow.png') }}" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('landpage/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('landpage/plugins/slick/slick.css') }}">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('landpage/plugins/themify-icons/themify-icons.css') }}">

    <!-- Main Stylesheet -->
    <link href="{{ asset('landpage/css/style.css') }}" rel="stylesheet">

    @yield('style')

</head>
<body>
    <header class="navigation fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand font-tertiary h3" href="{{ route('main') }}">MoodNow</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('main') }}">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('detect') }}">Detect Mood</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('consul') }}">Consultation</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login / Register') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
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
                <p class="text-white paragraph-lg font-secondary">moodnow@gmail.com</p>
                </div>
                <div class="col-md-4">
                <h5 class="text-light">Phone</h5>
                <p class="text-white paragraph-lg font-secondary">+880 2544 658 256</p>
                </div>
                <div class="col-md-4">
                <h5 class="text-light">Address</h5>
                <p class="text-white paragraph-lg font-secondary">125/A, CA Commercial Area, California, USA</p>
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
    <script src="{{ asset('landpage/plugins/jQuery/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('landpage/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!-- slick slider -->
    <script src="{{ asset('landpage/plugins/slick/slick.min.js') }}"></script>
    <!-- filter -->
    <script src="{{ asset('landpage/plugins/shuffle/shuffle.min.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ asset('landpage/js/script.js') }}"></script>

</body>
</html>