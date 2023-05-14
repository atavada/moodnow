@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Music Recommendation</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-music"></i> Music Recommendation</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.music.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('musics.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.music.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan judul musik">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
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
                                <th scope="col">TITLE</th>
                                <th scope="col" style="width: 15%;text-align: center">GENRE</th>
                                <th scope="col" style="width: 40%;text-align: center">EMBED</th>
                                <th scope="col" style="width: 15%;text-align: center">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($musics as $no => $music)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($musics->currentPage()-1) * $musics->perPage() }}</th>
                                    <td>{{ $music->title }}</td>
                                    <td style="text-align: center">{{ $music->genre }}</td>
                                    <td class="text-center">
                                       {!! $music->embed !!}
                                    </td>
                                    <td class="text-center">
                                        @can('musics.edit')
                                            <a href="{{ route('admin.music.edit', $music->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan
                                        @can('musics.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $music->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{ $musics->links("vendor.pagination.bootstrap-5") }}
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
                            url: "{{ route("admin.music.index") }}/"+id,
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
@stop