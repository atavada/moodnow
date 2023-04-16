<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">

  <title>{{ Auth::user()->type }} &mdash; @yield('title', 'Dashboard')</title>

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/iconmoodnow.png') }}" />
    
</head>

<body style="background: #e2e8f0">
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('stisla/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
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
        </ul>
      </nav>
      
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index.html">MoodNow</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index.html">MN</a>
            </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="{{ setActive('dashboard') }}">
                  <a href="{{ route('admin.dashboard.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>

              {{-- @can('appSettings.index') --}}
              <li class="menu-header">App Setting</li>
              <li class="{{ setActive('admin/questionnaire') }}">
                <a href="#" class="nav-link"><i class="fas fa-book"></i><span>Questionnaire</span></a>
              </li>
              <li class="{{ setActive('admin/color') }}">
                <a href="#" class="nav-link"><i class="fas fa-paint-brush"></i><span>Color</span></a>
              </li>
              <li class="{{ setActive('admin/analysisMood') }}">
                <a href="#" class="nav-link"><i class="fas fa-cogs"></i><span>Mood Control</span></a>
              </li>
              <li class="{{ setActive('admin/music') }}">
                <a href="#" class="nav-link"><i class="fas fa-music"></i><span>Music Recommendation</span></a>
              </li>
              {{-- @endcan --}}

              {{-- @can('consuls.index') --}}
              <li class="menu-header">Consul</li>
              <li class="{{ setActive('admin/consul') }}">
                <a href="#" class="nav-link"><i class="fas fa-fw fa-comments"></i><span>Jawab MoodNow</span></a>
              </li>
              {{-- @endcan --}}

              {{-- @can('users.index'); --}}
              <li class="menu-header">User Setting</li>
              <li class="{{ setActive('user') }}">
                <a href="{{ route('admin.user.index') }}" class="nav-link"><i class="fas fa-user"></i><span>Users Control</span></a>
              </li>
              <li class="{{ setActive('moodnow-user') }}">
                <a href="{{ route('admin.userMoodnow.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Users MoodNow</span></a>
              </li>
              {{-- @endcan --}}
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  {{-- <script src="https://kit.fontawesome.com/53d82b54ee.js" crossorigin="anonymous"></script> --}}

  <script src="{{ asset('stisla/js/stisla.js"') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('stisla/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/js/custom.js') }}"></script>

  <script>
    //active select2
    $(document).ready(function () {
      $('select').select2({
        theme: 'bootstrap4',
        width: 'style',
      });
    });
    @if(session()-> has('success'))
    swal({
      type: "success",
      icon: "success",
      title: "BERHASIL!",
      text: "{{ session('success') }}",
      timer: 1500,
      showConfirmButton: false,
      showCancelButton: false,
      buttons: false,
    });
    @elseif(session()-> has('error'))
    swal({
      type: "error",
      icon: "error",
      title: "GAGAL!",
      text: "{{ session('error') }}",
      timer: 1500,
      showConfirmButton: false,
      showCancelButton: false,
      buttons: false,
    });
    @endif
  </script>

</body>
</html>
