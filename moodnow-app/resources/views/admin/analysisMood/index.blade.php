@extends('layouts.dashboard')
@section('title', 'Mood Control')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Mood Control</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-cogs"></i> Mood Control</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.analysisMood.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                {{-- @can('analysisMood.create') --}}
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.analysisMood.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                {{-- @endcan --}}
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col" style="text-align: center">QUESTION 1</th>
                                <th scope="col" style="text-align: center">QUESTION 2</th>
                                <th scope="col" style="text-align: center">QUESTION 3</th>
                                <th scope="col" style="text-align: center">QUESTION 4</th>
                                <th scope="col" style="text-align: center">OUTPUT</th>
                                <th scope="col" style="width: 15%;text-align: center">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($analysisMoods as $no => $analysisMood)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no }}</th>
                                    <td style="text-align: center">{{ ($analysisMood->quiz_1) == 'yes' ? 'YES' : 'NO' }}</td>
                                    <td style="text-align: center">{{ ($analysisMood->quiz_2) == 'yes' ? 'YES' : 'NO' }}</td>
                                    <td style="text-align: center">{{ ($analysisMood->quiz_3) == 'yes' ? 'YES' : 'NO' }}</td>
                                    <td style="text-align: center">{{ ($analysisMood->quiz_4) == 'yes' ? 'YES' : 'NO' }}</td>
                                    <td style="text-align: center">{{ ($analysisMood->output) == 'mood_baik' ? 'Mood Baik' : 'Mood Buruk' }}</td>
                                    <td class="text-center">
                                        {{-- @can('analysisMoods.edit') --}}
                                            <a href="{{ route('admin.analysisMood.edit', $analysisMood->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        {{-- @endcan
                                        @can('analysisMoods.delete') --}}
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $analysisMood->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>  
                                        {{-- @endcan --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- <div style="text-align: center">
                            {{$analysisMoods->links("vendor.pagination.bootstrap-4")}}
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
                        url: "{{ route("admin.analysisMood.index") }}/"+id,
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