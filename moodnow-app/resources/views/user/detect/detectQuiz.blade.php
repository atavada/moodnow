@extends('layouts.master')

@section('content')
<style>
#rangeValue {
  position: relative;
  display: block;
  text-align: center;
}
.range {
  width: 400px;
  height: 15px;
  -webkit-appearance: none;
  background: #fff;
  outline: none;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: inset 0 0 2px;
}
.range::-webkit-slider-thumb {
  -webkit-appearance: none;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #fff;
  cursor: pointer;
  border: 4px solid #41228e;
  box-shadow: -407px 0 0 400px #41228e;
}

</style>
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

  <section class="section" data-background="{{ asset('kroos/images/backgrounds/bg-dots.png') }}">
    <div class="container">
        <form action="{{ route('user.detect.prosesQuiz') }}" method="POST">
            @csrf
            @foreach ($quizs as $key => $quiz)
            <div class="bg-white rounded text-center p-3 shadow mb-3">
                <h4>Quiz {{ $key + 1 }}</h4>
                <p class="mb-3">{{ $quiz->question }}</p>
                <input type="hidden" name="quiz_id[]" value="{{ $quiz->id }}">
                <input class="range" type="range" name="range[]" value="{{ old('range'.$key, 5) }}" min="0" max="10" onchange="rangeSlide(this, {{ $key }})" onmousemove="rangeSlide(this, {{ $key }})">
                <h4><span id="rangeValue{{ $key }}">{{ old('range'.$key, 5) }}</span></h4>
            </div>
            @endforeach

            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
  </section>

<script type="text/javascript">
    function rangeSlide(rangeInput, key) {
        document.getElementById('rangeValue' + key).innerHTML = rangeInput.value;
    }
</script>
@stop 