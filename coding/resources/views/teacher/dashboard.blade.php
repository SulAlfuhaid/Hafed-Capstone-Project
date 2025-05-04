@extends('teacher.layouts.app')

@section('title', 'لوحة تحكم المعلم')

@section('content')

    <div class="container-fluid">
        <h2 class="title mt-3"><i class="fas fa-chalkboard-teacher"></i> لوحة تحكم المعلم</h2>

        <!-- ملخص سريع -->
        <div class="row">
            <div class="col-md-3">
                <div style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-primary text-white">
                    <span><i class="ti ti-book fa-3x"></i></span>
                    <h5 class="text-white">عدد الحلقات الدراسية</h5>
                    <h2 class="text-white">{{ $totalCircles }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-primary text-white">
                    <span><i class="ti ti-users fa-3x"></i></span>
                    <h5 class="text-white">عدد الطلاب</h5>
                    <h2 class="text-white">{{ $totalStudents }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-primary text-white">
                    <span><i class="ti ti-chart-arrows fa-3x"></i></span>
                    <h5 class="text-white">متوسط التقييم</h5>
                    <h2 class="text-white">{{ number_format($averageScore, 2) }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-primary text-white">
                    <span><i class="ti ti-report-analytics fa-3x"></i></span>
                    <h5 class="text-white">التقارير المرسلة</h5>
                    <h2 class="text-white">{{ $totalReports }}</h2>
                </div>
            </div>
        </div>

        <!-- الرسم البياني لحفظ الطلاب -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title"><i class="fas fa-book-open"></i> مستوى حفظ الطلاب</h5>
                    <div id="memorizationChart"></div>
                </div>
            </div>

            <!-- الرسم البياني لمتوسط التقييم -->
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title"><i class="fas fa-star"></i> متوسط التقييمات</h5>
                    <div id="evaluationChart"></div>
                </div>
            </div>
        </div>

        <!-- قائمة أحدث الأنشطة -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title"><i class="fas fa-clipboard-list"></i> أحدث التقييمات</h5>
                    <ul class="list-group">
                        @foreach($students->pluck('evaluations')->flatten()->take(5) as $evaluation)
                            <li class="list-group-item">
                                {{ $evaluation->student->user->email }} - {{ $evaluation->surah_name }}
                                <span class="badge bg-secondary float-end">{{ $evaluation->score }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title"><i class="fas fa-file-alt"></i> أحدث التقارير المرسلة</h5>
                    <ul class="list-group">
                        @foreach($teacher->reports()->latest()->take(5)->get() as $report)
                            <li class="list-group-item">
                                تقرير عن {{ $report->family->name }} - {{ $report->report_type }}
                                <span class="badge bg-primary float-end">{{ $report->created_at }}</span>
                            </li>
                        @endforeach
                    </ul>
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
                    data: @json($students->pluck('memorization_level'))
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
                dataLabels: { enabled: false },
                xaxis: {
                    categories: @json($students->pluck('name')),
                    labels: { rotate: -45 }
                },
                yaxis: { title: { text: 'عدد الأجزاء' }, min: 0, max: 30 },
                colors: ['#008FFB']
            };

            let evaluationOptions = {
                series: [{
                    name: 'متوسط التقييم',
                    data: @json($students->map(fn($student) => $student->evaluations->avg('score') ?? 0))
                }],
                chart: {
                    type: 'area',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    }
                },
                dataLabels: { enabled: false },
                xaxis: {
                    categories: @json($students->pluck('name')),
                    labels: { rotate: -45 }
                },
                yaxis: { title: { text: 'متوسط التقييم' }, min: 0, max: 100 },
                colors: ['#FF4560']
            };

            new ApexCharts(document.querySelector("#memorizationChart"), memorizationOptions).render();
            new ApexCharts(document.querySelector("#evaluationChart"), evaluationOptions).render();
        });
    </script>

@endsection
