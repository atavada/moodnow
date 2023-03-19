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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landpage/images/favicon.png') }}" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('landpage/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('landpage/plugins/slick/slick.css') }}">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('landpage/plugins/themify-icons/themify-icons.css') }}">

    <!-- Main Stylesheet -->
    <link href="{{ asset('landpage/css/style.css') }}" rel="stylesheet">

</head>
<body>
    <header class="navigation fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand font-tertiary h3" href="index.html">MoodNow</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="mood.html">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="blog.html">Detect Mood</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="portfolio.html">Consultation</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
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

    <!-- contact -->
    <section class="section section-on-footer" data-background="{{ asset('landpage/images/backgrounds/bg-dots.png') }}">
        <div class="container">
            <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">Contact Info</h2>
            </div>
            <div class="col-lg-8 mx-auto">
                <div class="bg-white rounded text-center p-5 shadow-down">
                <h4 class="mb-80">Contact Form</h4>
                <form action="#" class="row">
                    <div class="col-md-6">
                    <input type="text" id="name" name="name" placeholder="Full Name" class="form-control px-0 mb-4" required>
                    </div>
                    <div class="col-md-6">
                    <input type="email" id="email" name="email" placeholder="Email Address" class="form-control px-0 mb-4" required>
                    </div>
                    <div class="col-12">
                    <textarea name="message" id="message" class="form-control px-0 mb-4"
                        placeholder="Type Message Here" required></textarea>
                    </div>
                    <div class="col-lg-6 col-10 mx-auto">
                    <button class="btn btn-primary w-100">send</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- /contact -->

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