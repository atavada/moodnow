@extends('layouts.master')

@section('content')
<!-- page title -->
<section class="page-title bg-primary position-relative">
<div class="container">
<div class="row">
    <div class="col-12 text-center">
    <h1 class="text-white font-tertiary">Mood Tracker</h1>
    </div>
</div>
</div>
<!-- background shapes -->
<img src="{{ asset('kroos/images/illustrations/page-title.png') }}" alt="illustrations" class="bg-shape-1 w-100">
<img src="{{ asset('kroos/images/illustrations/leaf-pink-round.png') }}" alt="illustrations" class="bg-shape-2">
<img src="{{ asset('kroos/images/illustrations/dots-cyan.png') }}" alt="illustrations" class="bg-shape-3">
<img src="{{ asset('kroos/images/illustrations/leaf-orange.png" alt="illustrations') }}" class="bg-shape-4">
<img src="{{ asset('kroos/images/illustrations/leaf-yellow.png') }}" alt="illustrations" class="bg-shape-5">
<img src="{{ asset('kroos/images/illustrations/dots-group-cyan.png') }}" alt="illustrations" class="bg-shape-6">
<img src="{{ asset('kroos/images/illustrations/leaf-cyan-lg.png') }}" alt="illustrations" class="bg-shape-7">
</section>
<!-- /page title -->

<section class="section" data-background="{{ asset('kroos/images/backgrounds/bg-dots.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="bg-white rounded text-center p-3 shadow mb-3">
                    <h4 class="mb-5">Table History</h4>
                    <table class="table">
                        <thead>
                        <tr class="text-white" style="background-color: #41228e">
                            <th scope="col">NO.</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">MOOD RESULT</th>
                            <th scope="col" style="width: 25%">DETAIL</th>
                            <th scope="col" style="width: 15%;text-align: center">DETECTED AT</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($userMood as $no => $userMood)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no }}</th>
                                    <td>{{ $userMood->name }}</td>
                                    <td>{{ ($userMood->mood_result) == 'mood_baik' ? 'Mood Baik' : 'Mood Buruk' }}</td>
                                    <td><a href="{{ route('user.detect.result') }}">Go to Detail</a></td>
                                    <td>{{ $userMood->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@stop 