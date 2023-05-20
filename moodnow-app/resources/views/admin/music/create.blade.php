@extends('layouts.app')
@section('title', 'Create Music')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Music</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-music"></i> Tambah Music</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.music.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>TITLE</label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan Title"
                                class="form-control @error('title') is-invalid @enderror">

                            @error('title')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>MOOD</label>
                            <select class="form-control select-mood @error('mood') is-invalid @enderror" name="quiz_id">
                                <option value="">--</option>
                                @foreach ($quizs as $quiz)
                                    <option value="{{ $quiz->id }}">{{ $quiz->mood }}</option>
                                @endforeach
                            </select>
                            @error('mood')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>EMBED</label>
                            <textarea class="form-control embed @error('embed') is-invalid @enderror" name="embed" placeholder="Masukkan Embed Playlist or Lagu"  style="height: 200px;">{!! old('embed') !!}</textarea>

                            @error('embed')
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