@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Mood Control</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-cogs"></i> Tambah Mood Control</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.analysisMood.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>LOGIC</label>
                        <input type="text" name="logic" value="{{ old('logic') }}" placeholder="Masukkan Nama Logika"
                        class="form-control @error('logic') is-invalid @enderror">

                        @error('logic')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Question 1</label>
                                <select class="form-control @error('quiz_1') is-invalid @enderror" name="quiz_1">
                                    <option value="">--</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
    
                                @error('quiz_1')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Question 2</label>
                                <select class="form-control @error('quiz_2') is-invalid @enderror" name="quiz_2">
                                    <option value="">--</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
    
                                @error('quiz_2')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Question 3</label>
                                <select class="form-control @error('quiz_3') is-invalid @enderror" name="quiz_3">
                                    <option value="">--</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
    
                                @error('quiz_3')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Question 4</label>
                                <select class="form-control @error('quiz_4') is-invalid @enderror" name="quiz_4">
                                    <option value="">--</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
    
                                @error('quiz_4')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>OUTPUT</label>
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
                        </div>
                    </div>

                    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                </form>
            </div>
        </div>
    </div>
</section>
@stop