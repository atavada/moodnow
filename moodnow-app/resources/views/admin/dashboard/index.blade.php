@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')
  <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/weathericons/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/weathericons/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/summernote/dist/summernote-bs4.css') }}">

        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Users Total</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\User::count() ?? '0' }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Quiz</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\Questionnaire::count() ?? '0' }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-paint-brush"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Color</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\Color::count() ?? '0' }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-comments"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Consul</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\Consul::count() ?? '0' }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

  <script src="{{ asset('assets/modules/simpleweather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('assets/modules/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('assets/modules/summernote/dist/summernote-bs4.js') }}"></script>
  <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
  
  <script src="{{ asset('stisla/js/page/index-0.js') }}"></script>
@endsection