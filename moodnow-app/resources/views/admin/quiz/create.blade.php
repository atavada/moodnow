@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Questionnaire</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-folder"></i> Tambah Questionnaire</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.quiz.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>QUESTION</label>
                        <input type="text" name="question" value="{{ old('question') }}" placeholder="Masukkan Question" class="form-control @error('question') is-invalid @enderror">

                        @error('question')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>MOOD</label>
                        <input type="text" name="mood" value="{{ old('mood') }}" placeholder="Masukkan Mood" class="form-control @error('mood') is-invalid @enderror">

                        @error('mood')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>OUTPUT JIKA LEBIH DARI 5 POIN</label>
                        <select class="form-control @error('output') is-invalid @enderror" name="output">
                            <option value="">--</option>
                            <option value="mood_baik">Mood Baik</option>
                            <option value="mood_buruk">Mood Buruk</option>
                        </select>

                        @error('output')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                </form>
            </div>
        </div>
    </div>
</section>
@stop