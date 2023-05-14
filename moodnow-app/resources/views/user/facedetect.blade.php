@extends('layouts.master')

@section('style')
<style>

    .text-header {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 50px;
      color: rgb(0, 0, 0);
      font-family: "Playfair Display", serif;
      word-spacing: 3px;
      font-size: 44px;
      transition: 500ms;
    }
    .text-header:hover {
      color: #000000;
      text-shadow: 2px 2px 3px #ffffff;
      transform: translateY(-1px);
    }

    .card {
      height: 40rem;
    }

    .card-body {
        background: #000000;
    }

    .font {
      font-family: "Playfair Display", serif;
      font-weight: 100;
      word-spacing: 3px;
    }
    .text-shadow {
      text-shadow: 0 0 2px rgba(0, 0, 0, 0.284);
    }
    .facecam {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    canvas {
      position: absolute;
    }
    .info {
      display: flex;
      justify-content: center;
      align-items: center;
      color: #000000;
      font-size: large;
      font-style: italic;
    }
  </style>
@stop

@section('content')

    <!-- page title -->
    <section class="page-title bg-primary position-relative">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="text-white font-tertiary">Face Detection</h1>
            </div>
          </div>
        </div>
        <!-- background shapes -->
        <img src="{{ asset('kroos/images/illustrations/page-title.png') }}" alt="illustrations" class="bg-shape-1 w-100">
        <img src="{{ asset('kroos/images/illustrations/leaf-pink-round.png') }}" alt="illustrations" class="bg-shape-2">
        <img src="{{ asset('kroos/images/illustrations/dots-cyan.png') }}" alt="illustrations" class="bg-shape-3">
        <img src="{{ asset('kroos/images/illustrations/leaf-orange.png" alt="illustrations') }}" class="bg-shape-4">
        <img src="{{ asset('kroos/images/illustrations/leaf-yellow.png') }}" alt="illustrations" class="bg-shape-5">
        <img src="{{ asset('kroos/images/illustrations/dots-group-cyan.png') }}" alt="illustrations" class="bg-shape-6">
        <img src="{{ asset('kroos/images/illustrations/leaf-cyan-lg.png') }}" alt="illustrations" class="bg-shape-7">
      </section>
      <!-- /page title -->

    <section class="section">
        <div class="container">
        <div class="card">
            <div class="card-body">
            <div class="facecam">
                <video id="video" autoplay muted></video>
                <canvas id="overlay"></canvas>
            </div>
            </div>
        </div>
        <p class="font info">Please wait until the detection appear.</p>
        </div>
    </section>

    <!-- Main Script -->
    <script src="{{ asset('face/js/script.js') }}"></script>
    <script src="{{ asset('face/face-api.min.js') }}"></script>
    <script src="{{ asset('face/face.js') }}"></script>
@stop