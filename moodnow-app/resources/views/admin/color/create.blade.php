@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Color</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-unlock"></i> Tambah Color</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.color.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>NAME</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Warna Baru"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>COLOR HEX</label><br>
                            <input type="color" name="hex" value="{{ old('hex') }}" placeholder="Masukkan Kode Warna"
                                class="@error('hex') is-invalid @enderror">

                            @error('hex')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>OUTPUT</label>
                            <input type="text" name="output" value="{{ old('output') }}" placeholder="Masukkan Output"
                                class="form-control @error('output') is-invalid @enderror">

                            @error('output')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            SIMPAN</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
@stop