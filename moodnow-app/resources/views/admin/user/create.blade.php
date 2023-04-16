@extends('layouts.dashboard')
@section('title', 'User Admin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah User Admin</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-unlock"></i> Tambah User Admin</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>USERNAME</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama User"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>EMAIL</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email"
                                class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>PASSWORD</label>
                                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Password"
                                        class="form-control @error('password') is-invalid @enderror">
        
                                    @error('password')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>PASSWORD</label>
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Masukkan Konfirmasi Password"
                                        class="form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ROLE</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="type" value="1">
                                <label class="form-check-label">Admin &nbsp;</label>
                                <input class="form-check-input" type="checkbox" name="type" value="2">
                                <label class="form-check-label">Operator &nbsp;</label>
                                <input class="form-check-input" type="checkbox" name="type" value="3">
                                <label class="form-check-label">Sobat MoodNow &nbsp;</label>
                                <input class="form-check-input" type="checkbox" name="type" value="0">
                                <label class="form-check-label">User</label>
                            </div>

                            @error('type')
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