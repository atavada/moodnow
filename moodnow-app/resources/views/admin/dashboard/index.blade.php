@extends('layouts.app')

@section('content')
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
                {{ App\Models\User::whereHas('roles', function($query) {
                  $query->where('name', 'user');
              })->count() }}
              </div>
            </div>
          </div>
        </div>

        @can('musics.index')
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-book"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Music</h4>
              </div>
              <div class="card-body">
                {{ App\Models\Music::count() ?? '0' }}
              </div>
            </div>
          </div>
        </div>
        @endcan

        @can('colors.index')
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
        @endcan
        
        @can('consuls.index')
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
        @endcan
      </div>
  </section>
@endsection