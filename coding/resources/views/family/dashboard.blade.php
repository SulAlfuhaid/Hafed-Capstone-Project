@extends('family.layouts.app')

@section('title', 'لوحة تحكم ولي الأمر')

@section('content')

    <div class="container">
        <h2 class="title mt-3"><i class="fas fa-chart-pie"></i> لوحة تحكم ولي الأمر</h2>

        <!-- ملخص سريع -->
        <div class="row">
            <div class="col-md-4">
                <div style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-primary text-white">
                    <span><i class="ti ti-users fa-3x"></i></span>
                    <h5 class="text-white">عدد الأبناء</h5>
                    <h2 class="text-white">{{ $totalChildren }}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div  style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-success text-white">
                    <span><i class="ti ti-charging-pile fa-3x"></i></span>
                    <h5 class="text-white">متوسط التقييم</h5>
                    <h2 class="text-white">{{ number_format($averageScore, 2) }}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div  style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-warning text-white">
                    <span><i class="ti ti-chart-arrows fa-3x"></i></span>
                    <h5 class="text-white">عدد الحلقات الدراسية</h5>
                    <h2 class="text-white">{{ $totalSessions }}</h2>
                </div>
            </div>
        </div>

        <!-- الرسم البياني لحفظ الأبناء -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title"><i class="fas fa-book-open"></i> تقدم الحفظ</h5>
                    <div id="memorizationChart"></div>
                </div>
            </div>

            <!-- الرسم البياني لمتوسط التقييم -->
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title"><i class="fas fa-star"></i> متوسط التقييم</h5>
                    <div id="evaluationChart"></div>
                </div>
            </div>
        </div>

        <!-- جدول بيانات الأبناء -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title"><i class="fas fa-users"></i> بيانات الأبناء</h5>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>الطالب</th>
                            <th>مستوى الحفظ</th>
                            <th>النقاط</th>
                            <th>متوسط التقييم</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($children as $child)
                            <tr>
                                <td>{{ $child->name }}</td>
                                <td>{{ $child->memorization_level }} جزء</td>
                                <td>{{ $child->leaderboard->points ?? 0 }}</td>
                                <td>{{ number_format($child->evaluations->avg('score') ?? 0, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let memorizationOptions = {
                series: [{
                    name: 'عدد الأجزاء المحفوظة',
                    data: @json($children->pluck('memorization_level'))
                }],
                chart: {
                    type: 'bar',
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
                    title: { text: 'عدد الأجزاء' },
                    min: 0,
                    max: 30
                },
                colors: ['#008FFB']
            };

            let evaluationOptions = {
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
                        horizontal: true,
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
                    title: { text: 'متوسط التقييم' },
                    min: 0,
                    max: 100
                },
                colors: ['#FF4560']
            };

            new ApexCharts(document.querySelector("#memorizationChart"), memorizationOptions).render();
            new ApexCharts(document.querySelector("#evaluationChart"), evaluationOptions).render();
        });
    </script>

@endsection
