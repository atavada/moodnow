@extends('layouts.master')

@section('content')
<!-- page title -->
<section class="page-title bg-primary position-relative">
<div class="container">
<div class="row">
    <div class="col-12 text-center">
    <h1 class="text-white font-tertiary">Result</h1>
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

<section class="section" data-background="{{ asset('kroos/images/backgrounds/bg-dots.png') }}">
    <div class="container">
        <div class="bg-white rounded text-center p-3 shadow mb-3">
            <div class="row">
                <div class="col-12 mb-5">
                    <h4 class="mb-3">Mood Result</h4>
                    @if ($userMood->mood_result == 'mood_baik')
                        <p class="mb-0">Mood kamu sekarang baik baik saja</p>
                    @else
                        <p class="mb-3">Mood kamu sekarang sedang buruk, ada apa dengamu?</p>
                        <a href="{{ route('user.consul') }}" class="btn btn-transparent">Consultation</a>
                    @endif
                    <a href="{{ route('user.result') }}" class="btn btn-transparent">Go to History</a>
                </div>
                <div class="col-12">
                    <h4 class="mb-3">Music Recommendation</h4>
                    <p>Rekomendasi musik untuk mood kamu saat ini</p>
                    {{-- @if ($music->output == 'mood_baik')
                        <p class="mb-0">Mood kamu sekarang baik baik saja</p>
                    @else
                        <p class="mb-0">Mood kamu sekarang sedang buruk, ada apa dengamu?</p>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</section>
@stop 