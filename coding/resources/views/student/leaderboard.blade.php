@extends('student.layouts.app')

@section('title', 'لوحة الترتيب')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="title text-primary"><i class="ti ti-trophy"></i> لوحة الترتيب</h2>
            </div>

            <div class="card-body">
                <h5 class="mb-3"><i class="fas fa-chart-line"></i> ترتيبك الحالي: <strong>#{{ $studentRank }}</strong></h5>

                <div id="leaderboardChart" style="height: 350px;"></div>

                <table id="datatable" class="table table-bordered text-center table-striped mt-4">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الطالب</th>
                        <th>النقاط</th>
                        <th>الترتيب</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($leaderboard as $index => $entry)
                        <tr class="{{ $entry->student_id == auth()->user()->student->student_id ? 'bg-light' : '' }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $entry->student->name }}</td>
                            <td>{{ $entry->points }}</td>
                            <td>
                                <span class="badge {{ $index == 0 ? 'bg-warning' : ($index == 1 ? 'bg-success' : ($index == 2 ? 'bg-danger' : 'bg-secondary')) }}">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let leaderboardOptions = {
                series: [{
                    name: 'النقاط',
                    data: @json(array_column($leaderboardChartData, 'points'))
                }],
                chart: {
                    type: 'area',
                    height: 350
                },
                xaxis: {
                    categories: @json(array_column($leaderboardChartData, 'name'))
                },
                yaxis: {
                    title: { text: 'النقاط' },
                    min: 0
                },
                colors: ['#303f80']
            };

            new ApexCharts(document.querySelector("#leaderboardChart"), leaderboardOptions).render();
        });
    </script>

@endsection
