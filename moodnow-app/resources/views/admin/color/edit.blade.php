@extends('layouts.dashboard')
@section('title', 'Color Managed')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Color</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-unlock"></i>Edit Color</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.color.update', $color->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>NAME</label>
                            <input type="text" name="name" value="{{ old('name', $color->name) }}"
                                placeholder="Masukkan Warna"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>HEX</label>
                            <input type="text" name="hex" value="{{ old('hex', $color->hex) }}"
                                placeholder="Masukkan Kode Warna" class="form-control @error('hex') is-invalid @enderror">

                            @error('hex')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>OUTPUT</label>
                            <input type="text" name="output" value="{{ old('output', $color->output) }}"
                                placeholder="Masukkan Output" class="form-control @error('output') is-invalid @enderror">

                            @error('output')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>UPDATE</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
@stop