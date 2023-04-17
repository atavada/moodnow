@extends('layouts.master')

@section('content')

    <!-- page title -->
    <section class="page-title bg-primary position-relative">
        <div class="container">
        <div class="row">
            <div class="col-12 text-center">
            <h1 class="text-white font-tertiary">Consultation</h1>
            </div>
        </div>
        </div>
        <!-- background shapes -->
        <img src="{{ asset('landpage/images/illustrations/page-title.png') }}" alt="illustrations" class="bg-shape-1 w-100">
        <img src="{{ asset('landpage/images/illustrations/leaf-pink-round.png') }}" alt="illustrations" class="bg-shape-2">
        <img src="{{ asset('landpage/images/illustrations/dots-cyan.png') }}" alt="illustrations" class="bg-shape-3">
        <img src="{{ asset('landpage/images/illustrations/leaf-orange.png" alt="illustrations') }}" class="bg-shape-4">
        <img src="{{ asset('landpage/images/illustrations/leaf-yellow.png') }}" alt="illustrations" class="bg-shape-5">
        <img src="{{ asset('landpage/images/illustrations/dots-group-cyan.png') }}" alt="illustrations" class="bg-shape-6">
        <img src="{{ asset('landpage/images/illustrations/leaf-cyan-lg.png') }}" alt="illustrations" class="bg-shape-7">
    </section>
    <!-- /page title -->

    <!-- consul -->
    <section class="section section-on-footer" data-background="{{ asset('landpage/images/backgrounds/bg-dots.png') }}">
        <div class="container">
        <div class="row">
            <div class="col-12 text-center">
            <h2 class="section-title">Hi ada apa denganmu?</h2>
            </div>
            <div class="col-lg-8 mx-auto">
            <div class="bg-white rounded text-center p-5 shadow-down">
                <h4 class="mb-80">Chat dengan Sobat MoodNow</h4>
                <form action="{{ route('user.consul.store') }}" class="row" method="POST">
                    @csrf

                    <div class="col-12">
                        <textarea name="question" id="question" class="form-control px-0 mb-4"
                        placeholder="Tulis pesan yang kamu inginkan" value="{{ old('question') }}"
                        class="@error('question') is-invalid @enderror"></textarea>

                        @error('question')
                            <div class="invalid-feedback mb-5" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-10 mx-auto">
                        <button class="btn btn-primary w-100" type="submit">send</button>
                    </div>
                </form>
            </div>
            <div class="bg-white rounded text-center p-5 shadow-down mt-5">
                <h4 class="mb-80">History</h4>
                <div class="col-12">
                    <ol class="list-group">
                        @foreach ($consuls->where('user_id', auth()->id()) as $no => $consul)
                            <li class="list-group-item">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold"><b>Question:</b> {{ $consul->question }}</div>
                                    <b>Answer:</b> {{ $consul->answer }}
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- /consul -->

    <script>
        //active select2
        @if(session()-> has('success'))
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
        @elseif(session()-> has('error'))
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
@endsection 