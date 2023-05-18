<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap4.css') }}" />

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/iconmoodnow.png') }}" />
    
</head>

<body style="background: #e2e8f0">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                            <i class="fas fa-bars"></i></a>
                        </li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                      <a href="{{ route('home') }}">MoodNow</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                      <a href="{{ route('home') }}">MN</a>
                    </div>
                    <ul class="sidebar-menu">
                      <li class="menu-header">Dashboard</li>
                      <li class="{{ setActive('dashboard') }}">
                          <a href="{{ route('admin.dashboard.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                      </li>
        
                      @if(auth()->user()->can('quizs.index') || auth()->user()->can('analysisMoods.index') || auth()->user()->can('colors.index') || auth()->user()->can('musics.index'))
                      <li class="menu-header">App Setting</li>
                      @endif

                      @can('quizs.index')
                      <li class="{{ setActive('quiz') }}">
                        <a href="{{ route('admin.quiz.index') }}" class="nav-link"><i class="fas fa-book"></i><span>Questionnaire</span></a>
                      </li>
                      @endcan
        
                      @can('colors.index')
                      <li class="{{ setActive('color') }}">
                        <a href="{{ route('admin.color.index') }}" class="nav-link"><i class="fas fa-paint-brush"></i><span>Color Managed</span></a>
                      </li>
                      @endcan
        
                      @can('musics.index')
                      <li class="{{ setActive('music') }}">
                        <a href="{{ route('admin.music.index') }}" class="nav-link"><i class="fas fa-music"></i><span>Music Recommendation</span></a>
                      </li>
                      @endcan
        
                      @if(auth()->user()->can('consuls.index'))
                      <li class="menu-header">Consul</li>
                      @endif

                      @can('consuls.index')
                      <li class="{{ setActive('consul') }}">
                        <a href="{{ route('admin.consul.index') }}" class="nav-link"><i class="fas fa-fw fa-comments"></i><span>Jawab MoodNow</span></a>
                      </li>
                      @endcan
        
                      
                      @if(auth()->user()->can('roles.index') || auth()->user()->can('permissions.index') || auth()->user()->can('users.index'))
                      <li class="menu-header">User Setting</li>
                      @endif

                      @can('users.index')
                      <li class="{{ setActive('user') }}">
                        <a href="{{ route('admin.user.index') }}" class="nav-link"><i class="fas fa-user"></i><span>Users Admin</span></a>
                      </li>
                      <li class="{{ setActive('moodnow-user') }}">
                        <a href="{{ route('admin.userMoodnow.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Users MoodNow</span></a>
                      </li>
                      @endcan
        
                      @can('permissions.index')
                      <li class="{{ setActive('permission') }}">
                        <a href="{{ route('admin.permission.index') }}" class="nav-link"><i class="fas fa-key"></i><span>Permissions</span></a>
                      </li>
                      @endcan
        
                      @can('roles.index')
                      <li class="{{ setActive('role') }}">
                        <a href="{{ route('admin.role.index') }}" class="nav-link"><i class="fas fa-unlock"></i><span>Roles</span></a>
                      </li>
                      @endcan
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
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        //active select2
        $(document).ready(function () {
            $('select').select2({
                theme: 'bootstrap4',
                width: 'style',
            });
        });

        //flash message
        @if(session()->has('success'))
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
        @elseif(session()->has('error'))
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