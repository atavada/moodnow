@extends('layouts.master')

@section('content')
<!-- page title -->
<section class="page-title bg-primary position-relative">
    <div class="container">
    <div class="row">
        <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">Contact Us</h1>
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

<!-- contact -->
<section class="section" data-background="{{ asset('kroos/images/backgrounds/bg-dots.png') }}">
    <div class="container">
        <div class="row">
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
@endsection 