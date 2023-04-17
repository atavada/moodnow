@extends('layouts.dashboard')
@section('title', 'Color Managed')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Color Managed</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-color"></i>Color Managed</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.color.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                {{-- @can('colors.create') --}}
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.color.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                {{-- @endcan --}}
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan warna">
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
                                <th scope="col">NAME</th>
                                <th scope="col">HEX</th>
                                {{-- <th scope="col" style="width: 15%">ROLE</th> --}}
                                <th scope="col" style="width: 15%;text-align: center">OUTPUT</th>
                                <th scope="col" style="width: 15%;text-align: center">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($colors as $no => $color)
                                {{-- @if ($color->type !== 'color') --}}
                                    <tr>
                                        <th scope="row" style="text-align: center"></th>
                                        <td>{{ $color->name }}</td>
                                        <td>{{ $color->hex }}</td>
                                        <td>
                                            <label class="badge badge-success">{{ $color->output }}</label>
                                        </td>
                                        <td style="text-align: center">{{ $color->action }}
                                        {{-- <td class="text-center"> --}}
                                            {{-- @can('colors.edit') --}}
                                                <a href="{{ route('admin.color.edit', $color->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                            {{-- @endcan --}}
                                            
                                            {{-- @can('colors.delete') --}}
                                                <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $color->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                    
                            @endforeach
                            </tbody>
                        </table>
                        {{-- <div style="text-align: center">
                            {{$colors->links("vendor.pagination.bootstrap-4")}}
                        </div> --}}
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
                    text: "INGIN MENGHAPUS WARNA INI!",
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
                            url: "{{ route("admin.color.index") }}/"+id,
                            data:   {
                                "id": id,
                                "_token": token
                            },
                            type: 'DELETE',
                            success: function (response) {
                                if (response.status == "success") {
                                    swal({
                                        title: 'BERHASIL!',
                                        text: 'WARNA BERHASIL DIHAPUS!',
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
                                        text: 'WARNA GAGAL DIHAPUS!',
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