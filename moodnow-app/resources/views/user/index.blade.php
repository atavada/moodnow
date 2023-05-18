@extends('layouts.master')

@section('content')
<!-- hero area -->
<section class="hero-area bg-primary" id="parallax">
    <div class="container">
      <div class="row">
        <div class="col-lg-11 mx-auto">
          <h1 class="text-white font-tertiary">A website <br> To help intensify <br> Your Mood.</h1>
        </div>
      </div>
    </div>
    <div class="layer-bg w-100">
      <img class="img-fluid w-100" src="{{ asset('kroos/images/illustrations/leaf-bg.png') }}" alt="bg-shape" />
    </div>
    <div class="layer" id="l2">
      <img src="{{ asset('kroos/images/illustrations/dots-cyan.png') }}" alt="bg-shape" />
    </div>
    <div class="layer" id="l3">
      <img src="{{ asset('kroos/images/illustrations/leaf-orange.png') }}" alt="bg-shape" />
    </div>
    <div class="layer" id="l4">
      <img src="{{ asset('kroos/images/illustrations/dots-orange.png') }}" alt="bg-shape" />
    </div>
    <div class="layer" id="l5">
      <img src="{{ asset('kroos/images/illustrations/leaf-yellow.png') }}" alt="bg-shape" />
    </div>
    <div class="layer" id="l6">
      <img src="{{ asset('kroos/images/illustrations/leaf-cyan.png') }}" alt="bg-shape" />
    </div>
    <div class="layer" id="l7">
      <img src="{{ asset('kroos/images/illustrations/dots-group-orange.png') }}" alt="bg-shape" />
    </div>
    <div class="layer" id="l8">
      <img src="{{ asset('kroos/images/illustrations/leaf-pink-round.png') }}" alt="bg-shape" />
    </div>
    <div class="layer" id="l9">
      <img src="{{ asset('kroos/images/illustrations/leaf-cyan-2.png') }}" alt="bg-shape" />
    </div>

    <!-- social icon -->
    <ul class="list-unstyled ml-5 mt-3 position-relative zindex-1">
      <li class="mb-3">
        <a class="text-white" href="#"><i class="ti-facebook"></i></a>
      </li>
      <li class="mb-3">
        <a class="text-white" href="#"><i class="ti-instagram"></i></a>
      </li>
      <li class="mb-3">
        <a class="text-white" href="#"><i class="ti-twitter"></i></a>
      </li>
      <li class="mb-3">
        <a class="text-white" href="#"><i class="ti-email"></i></a>
      </li>
    </ul>
    <!-- /social icon -->
  </section>
  <!-- /hero area -->
  
  <!-- about -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto text-center">
          <h3><i style="text-decoration: underline">Did you know</i></h3>
          <br>
          <p class="font-secondary paragraph-lg text-dark">
            Mood plays a crucial role in our mental health, as it can significantly 
            impact our overall well-being. It is a state of mind that can fluctuate 
            from day-to-day, hour-to-hour, or even minute-to-minute. Our mood can 
            influence our thoughts, feelings, and behaviors, and it can also affect 
            our physical health.</p>
            <br>
          <a href="{{ route('about') }}" class="btn btn-transparent">know more</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section bg-primary position-relative testimonial-bg-shapes">
    <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title text-white mb-5">MoodTracker</h2>
      </div>
      <div class="col-lg-10 mx-auto testimonial-slider">
        <!-- slider-item -->
        <div class="text-center testimonial-content mb-3">
          <p class="text-white">
            Our mood tracker questionnaire is designed to help you track your moods and emotions over time. 
            By answering a few simple questions each day, you can gain insight into your mental health, 
            identify patterns in your mood, and track changes over time. It's a powerful tool for anyone 
            looking to improve their mental well-being.
          </p>
          <a href="{{ route('user.detect.index') }}" class="btn btn-artistic"><button class="btn btn-sm btn-light w-100">Detect Your Mood Now!</button></a>
        </div>
        <!-- slider-item -->
        <div class="text-center testimonial-content">
          <p class="text-white mb-4">
            A mood tracker is a tool that helps you monitor and track your emotional state over time. 
            It can be a helpful way to identify patterns in mood, triggers for mood changes, and to provide 
            insight into one's mental health. By using a color-coded system, you can quickly and easily 
            track your mood on a daily basis, making it easier to identify patterns or changes over time..</p>
        </div>
      </div>
    </div>
  </div>
    <!-- bg shapes -->
    <img src="{{ asset('kroos/images/backgrounds/map.png') }}" alt="map" class="img-fluid bg-map" />
    <img src="{{ asset('kroos/images/illustrations/dots-group-v.png') }}" alt="bg-shape" class="img-fluid bg-shape-1" />
    <img src="{{ asset('kroos/images/illustrations/leaf-orange.png') }}" alt="bg-shape" class="img-fluid bg-shape-2" />
    <img src="{{ asset('kroos/images/illustrations/dots-group-sm.png') }}" alt="bg-shape" class="img-fluid bg-shape-3" />
    <img src="{{ asset('kroos/images/illustrations/leaf-pink-round.png') }}" alt="bg-shape" class="img-fluid bg-shape-4" />
    <img src="{{ asset('kroos/images/illustrations/leaf-cyan.png') }}" alt="bg-shape" class="img-fluid bg-shape-5" id="contact"  />
  </section>
  <!-- /about -->

  <!-- contact -->
  <section class="section section-on-footer" data-background="{{ asset('kroos/images/backgrounds/bg-dots.png') }}">
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
@stop 