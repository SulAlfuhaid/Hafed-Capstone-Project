@extends('family.layouts.app')

@section('title', 'تقرير النقاط والترتيب')

@section('content')

    <div class="container">
        <h2 class="title mt-3"><i class="fas fa-trophy"></i> تقرير النقاط والترتيب</h2>

        @if($children->isEmpty())
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> لا يوجد بيانات متاحة للأبناء.
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <div id="rankingChart"></div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>الترتيب</th>
                            <th>الطالب</th>
                            <th>النقاط</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leaderboard as $index => $entry)
                            <tr class="{{ in_array($entry->student_id, $children->pluck('student_id')->toArray()) ? 'table-success' : '' }}">
                                <td>#{{ $index + 1 }}</td>
                                <td>{{ $entry->student->name }}</td>
                                <td>{{ $entry->points }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                series: [{
                    name: 'النقاط',
                    data: @json($children->map(fn($child) => $child->leaderboard->points ?? 0))
                }],
                chart: {
                    type: 'line',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: @json($children->pluck('email')),
                    labels: {
                        rotate: -45
                    }
                },
                yaxis: {
                    title: {
                        text: 'النقاط'
                    },
                    min: 0
                },
                colors: ['#FFD700'],
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " نقطة";
                        }
                    }
                }
            };

            let chart = new ApexCharts(document.querySelector("#rankingChart"), options);
            chart.render();
        });
    </script>

@endsection
