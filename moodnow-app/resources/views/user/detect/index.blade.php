@extends('layouts.master')

@section('content')

  <!-- page title -->
  <section class="page-title bg-primary position-relative">
    <div class="container">
    <div class="row">
        <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">Detect Your Mood</h1>
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
      <div class="row">
        {{-- <div class="col-12 text-center">
          <h2 class="section-title text-dark mb-4">Detect Your Mood Now!</h2>
        </div> --}}
          <div class="text-center testimonial-content">
            <p class="text-dark">
              Our mood tracker questionnaire is designed to help you track your moods and emotions over time. 
              By answering a few simple questions each day, you can gain insight into your mental health, 
              identify patterns in your mood, and track changes over time. It's a powerful tool for anyone 
              looking to improve their mental well-being.
            </p>
            <a href="{{ route('user.detect.detectQuiz') }}"><button class="btn btn-primary mt-2">Detect Now!</button></a>
          </div>
      </div>
    </div>
  </section>
@endsection 