@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Questionnaire</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-unlock"></i>Edit Questionnaire</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.quiz.update', $quiz->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>QUESTION</label>
                            <input type="text" name="title" value="{{ old('title', $quiz->title) }}"
                                placeholder="Masukkan Questionnaire"
                                class="form-control @error('quiz') is-invalid @enderror">

                            @error('quiz')
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