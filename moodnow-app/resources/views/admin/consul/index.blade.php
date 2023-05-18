@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Jawab MoodNoow</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-comments"></i> Jawab MoodNoow</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.consul.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan pertanyaan user">
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
                                <th scope="col">USERNAME</th>
                                <th scope="col">QUESTION</th>
                                <th scope="col">ANSWER</th>
                                <th scope="col" style="width: 10%;text-align: center">CREATED AT</th>
                                <th scope="col" style="width: 10%;text-align: center">ANSWERED AT</th>
                                <th scope="col" style="width: 15%;text-align: center">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($consuls as $no => $consul)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($consuls->currentPage()-1) * $consuls->perPage() }}</th>
                                    <td>{{ $consul->name }}</td>
                                    <td>{{ $consul->question }}</td>
                                    <td>{{ $consul->answer }}</td>
                                    <td class="text-center">
                                      {{ $consul->created_at }}
                                    </td>
                                    <td class="text-center">
                                      {{ $consul->updated_at }}
                                    </td>
                                    <td class="text-center">
                                        @can('consuls.edit')
                                            <a href="{{ route('admin.consul.edit', $consul->id) }}" class="btn btn-sm btn-primary">
                                                Answer
                                            </a>
                                        @endcan
                                        @can('consuls.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $consul->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{ $consuls->links("vendor.pagination.bootstrap-5") }}
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
                            url: "{{ route("admin.consul.index") }}/"+id,
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