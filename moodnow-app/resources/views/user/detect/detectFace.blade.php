@extends('layouts.master')

@section('style')
<style>
    .card {
      height: 40rem;
    }
    .card-body {
        background: #000000;
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
                <div id="my_camera"></div>
                <canvas id="overlay"></canvas>
            </div>
            </div>
        </div>
        <h4 class="font info mt-3" style="text-align: center">Please wait until the detection appear.</h4>
        </div>
    </section>

    <!-- Main Script -->
    <script src="face/js/script.js'"></script>
    <script src="face/face-api.min.js'"></script>
    <script src="face/face.js'"></script>

    {{-- <!-- Addition Script -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script language="JavaScript">
      Webcam.set({
          width: 490,
          height: 350
      });
      
      Webcam.attach( '#my_camera' );
    </script> --}}
@stop