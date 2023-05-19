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
            <div class="col-12 mx-auto mb-3">
                <div class="bg-white rounded text-center p-3 shadow mb-3">
                    <h4 class="mb-5">Table History</h4>
                    <table class="table" style="background-color: #f8f8f8">
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
                            @foreach ($userMood as $no => $user_mood)
                                @if ($user_mood == null)
                                    <tr>
                                        <td colspan="5"><i>Detect mood kamu terlebih dahulu untuk melihat histori</i>
                                            <br>
                                            <a href="{{ route('user.detect.index') }}" class="btn btn-transparent">Detect Mood</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no }}</th>
                                        <td>{{ $user_mood->name }}</td>
                                        <td>{{ ($user_mood->mood_result) == 'mood_baik' ? 'Mood Baik' : 'Mood Buruk' }}</td>
                                        <td><a href="{{ route('user.detect.result', $user_mood->id) }}">Go to Detail</a></td>
                                        <td>{{ $user_mood->created_at }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 mx-auto">
                <div class="bg-white rounded text-center p-3 shadow mb-3">
                    <h4 class="mb-5">History Mood Harian</h4>
                    <div><canvas id="myChart"></canvas></div>
                      
                      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                      
                      <script>    
                        const ctx = document.getElementById('myChart');

                        const chartData = {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                            datasets: [{
                                label: 'Mood Baik',
                                data: [1, 19, 3, 5, 2, 3, 1, 1, 1, 1],
                                borderWidth: 1
                            }]
                        };

                        const chartOptions = {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        };

                        const myChart = new Chart(ctx, {
                            type: 'line',
                            data: chartData,
                            options: chartOptions
                        });

                        // Tambahkan dataset garis baru
                        function addNewDataset() {
                            const newDataset = {
                                label: 'Mood Buruk',
                                data: [2, 4, 6, 8, 3, 4, 14, 13, 5, 20, 22, 24],
                                borderWidth: 1
                            };

                            myChart.data.datasets.push(newDataset);
                            myChart.update();
                        }

                        // Panggil fungsi untuk menambahkan dataset baru
                        addNewDataset();
                      </script>
                </div>
            </div>
        </div>
    </div>
</section>
@stop 