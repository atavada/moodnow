@extends('layouts.dashboard')
@section('title', 'Music')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Music</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-unlock"></i> Edit Music</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.music.update', $music->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>TITLE</label>
                            <input type="text" name="title" value="{{ $music->title }}" placeholder="Masukkan Judul Lagu"
                            class="form-control @error('title') is-invalid @enderror">

                            @error('title')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>GENRE</label>
                            <input type="genre" name="genre" value="{{ old('genre', $music->genre) }}" placeholder="Masukkan Genre Lagu"
                                class="form-control @error('genre') is-invalid @enderror">

                            @error('genre')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>EMBED</label>
                            <input type="embed" name="embed" value="{{ old('embed', $music->embed) }}" placeholder="Masukkan Link Lagu"
                                class="form-control @error('embed') is-invalid @enderror">

                            @error('embed')
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