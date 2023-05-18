@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Jawab MoodNoow</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-unlock"></i> Jawab MoodNoow</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.consul.update', $consul->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>USERNAME</label>
                            <p>{{ $consul->name }}</p>
                        </div>

                        <div class="form-group">
                            <label>QUESTION</label>
                            <p>{{ $consul->question }}</p>
                        </div>

                        <div class="form-group">
                            <label>ANSWER</label>
                            <input type="text" name="answer" value="{{ old('answer', $consul->answer) }}" placeholder="Masukkan jawaban"
                                class="form-control @error('answer') is-invalid @enderror">

                            @error('answer')
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