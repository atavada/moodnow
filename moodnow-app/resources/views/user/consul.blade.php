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
        <img src="{{ asset('kroos/images/illustrations/page-title.png') }}" alt="illustrations" class="bg-shape-1 w-100">
        <img src="{{ asset('kroos/images/illustrations/leaf-pink-round.png') }}" alt="illustrations" class="bg-shape-2">
        <img src="{{ asset('kroos/images/illustrations/dots-cyan.png') }}" alt="illustrations" class="bg-shape-3">
        <img src="{{ asset('kroos/images/illustrations/leaf-orange.png" alt="illustrations') }}" class="bg-shape-4">
        <img src="{{ asset('kroos/images/illustrations/leaf-yellow.png') }}" alt="illustrations" class="bg-shape-5">
        <img src="{{ asset('kroos/images/illustrations/dots-group-cyan.png') }}" alt="illustrations" class="bg-shape-6">
        <img src="{{ asset('kroos/images/illustrations/leaf-cyan-lg.png') }}" alt="illustrations" class="bg-shape-7">
    </section>
    <!-- /page title -->

    <!-- consul -->
    <section class="section" data-background="{{ asset('kroos/images/backgrounds/bg-dots.png') }}">
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
                        <textarea name="question" id="question" class="form-control px-0 mb-3"
                        placeholder="Tulis pesan yang kamu inginkan" value="{{ old('question') }}"
                        class="@error('question') is-invalid @enderror"></textarea>

                        @error('question')
                            <div class="invalid-feedback mb-3" style="display: block">
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
                        <table class="table">
                        @foreach ($consuls->where('user_id', auth()->id()) as $no => $consul)
                            <tr>
                            <td>
                                Question : {{ $consul->question }}
                            <br>
                                Answer : {{ $consul->answer }}</td>
                            </tr>                        
                        @endforeach
                        </table>  
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

    <script>
        //ajax delete
        function Delete(id)
            {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
    
                swal({
                    title: "APAKAH KAMU YAKIN ?",
                    text: "INGIN MENGHAPUS DATA INI!",
                    icon: "warning",
                    buttons: [
                        'TIDAK',
                        'YA'
                    ],
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
    
                        //ajax delete
                        jQuery.ajax({
                            url: "{{ route("user.consul") }}/"+id,
                            data:   {
                                "id": id,
                                "_token": token
                            },
                            type: 'DELETE',
                            success: function (response) {
                                if (response.status == "success") {
                                    swal({
                                        title: 'BERHASIL!',
                                        text: 'DATA BERHASIL DIHAPUS!',
                                        icon: 'success',
                                        timer: 1000,
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        buttons: false,
                                    }).then(function() {
                                        location.reload();
                                    });
                                }else{
                                    swal({
                                        title: 'GAGAL!',
                                        text: 'DATA GAGAL DIHAPUS!',
                                        icon: 'error',
                                        timer: 1000,
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        buttons: false,
                                    }).then(function() {
                                        location.reload();
                                    });
                                }
                            }
                        });
    
                    } else {
                        return true;
                    }
                })
            }
    </script>
@endsection 