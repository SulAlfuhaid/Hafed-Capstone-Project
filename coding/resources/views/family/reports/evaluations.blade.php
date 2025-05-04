@extends('family.layouts.app')

@section('title', 'تقرير التقييمات')

@section('content')

    <div class="container">
        <h2 class="title mt-3"><i class="fas fa-star"></i> تقرير التقييمات</h2>

        @if($children->isEmpty())
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> لا يوجد تقييمات متاحة للأبناء.
            </div>
        @else

            <div class="row mt-4">
                @foreach($children as $child)
                    <div class="col-md-12">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $child->name }}</h5>
                                <p class="card-text">متوسط التقييم: <strong>{{ $child->evaluations->avg('score') ?? 'لا يوجد بيانات' }}</strong></p>

                                @if($child->evaluations->isNotEmpty())
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>المعلم</th>
                                            <th>التقييم</th>
                                            <th>الملاحظات</th>
                                            <th>التاريخ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($child->evaluations as $evaluation)
                                            <tr>
                                                <td>{{ $evaluation->teacher->name }}</td>
                                                <td>{{ $evaluation->score }}</td>
                                                <td>{{ $evaluation->comments }}</td>
                                                <td>{{ $evaluation->evaluation_date }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-warning">لا يوجد تقييمات لهذا الطالب.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="evaluationChart"></div>
                </div>
            </div>

        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                series: [{
                    name: 'متوسط التقييم',
                    data: @json($children->map(fn($child) => $child->evaluations->avg('score') ?? 0))
                }],
                chart: {
                    type: 'line',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: @json($children->pluck('name')),
                    labels: {
                        rotate: -45
                    }
                },
                yaxis: {
                    title: {
                        text: 'متوسط التقييم'
                    },
                    min: 0,
                    max: 100
                },
                colors: ['#FF4560'],
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " / 100";
                        }
                    }
                }
            };

            let chart = new ApexCharts(document.querySelector("#evaluationChart"), options);
            chart.render();
        });
    </script>

@endsection
