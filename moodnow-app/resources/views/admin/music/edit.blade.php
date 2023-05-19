@extends('layouts.app')

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
                    <form action="{{ route('admin.music.update', $music->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>TITLE</label>
                            <input type="text" name="title" value="{{ old('title', $music->title) }}" placeholder="Masukkan Judul Lagu"
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
                                    <option value="{{ $quiz->id }}" {{ old('mood', $quiz->mood) == $music->mood ? 'selected' : '' }}>{{ $quiz->mood }}</option>
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
                            <textarea class="form-control embed @error('embed') is-invalid @enderror" name="embed" placeholder="Masukkan Link Lagu"  style="height: 200px;">{!! old('embed', $music->embed) !!}</textarea>

                            @error('embed')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
@stop