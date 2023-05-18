@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Questionniare</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-book"></i> Questionniare</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.quiz.index') }}" method="GET">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            @can('quizs.create')
                                <div class="input-group-prepend">
                                    <a href="{{ route('admin.quiz.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                </div>
                            @endcan
                            <input type="text" class="form-control" name="q"
                                   placeholder="cari berdasarkan question">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i> CARI
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" style="text-align: center;width: 6%">NO.</th>
                            <th scope="col">QUESTION</th>
                            <th scope="col" style="text-align: center;width: 20%">MOOD</th>
                            <th scope="col" style="text-align: center;width: 20%">OUTPUT</th>
                            <th scope="col" style="width: 15%;text-align: center">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($quizs as $no => $quiz)
                            <tr>
                                <th scope="row" style="text-align: center">{{ ++$no + ($quizs->currentPage()-1) * $quizs->perPage() }}</th>
                                <td>{{ $quiz->question }}</td>
                                <td style="text-align: center">{{ $quiz->mood }}</td>
                                <td style="text-align: center">{{ ($quiz->output) == 'mood_baik' ? 'Mood Baik' : 'Mood Buruk' }}</td>
                                <td class="text-center">
                                    @can('quizs.edit')
                                        <a href="{{ route('admin.quiz.edit', $quiz->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                    @endcan

                                    @can('quizs.delete')
                                        <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $quiz->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: center">
                        {{$quizs->links("vendor.pagination.bootstrap-5")}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

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
                        url: "{{ route("admin.quiz.index") }}/"+id,
                        data:     {
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
@stop