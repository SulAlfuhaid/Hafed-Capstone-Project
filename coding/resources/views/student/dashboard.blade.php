@extends('student.layouts.app')

@section('title', 'لوحة تحكم الطالب')

@section('content')

    <div class="container-fluid">
        <h2 class="title mt-3"><i class="fas fa-user-graduate"></i> لوحة تحكم الطالب</h2>

        <!-- ملخص سريع -->
        <div class="row">
            <div class="col-md-3">
                <div style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-primary text-white">
                    <span><i class="ti ti-arrow-autofit-down fa-3x"></i></span>
                    <h5 class="text-white">عدد الحلقات الدراسية</h5>
                    <h2 class="text-white">{{ $totalStudyCircles }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-primary text-white">
                    <span><i class="ti ti-stars fa-3x"></i></span>
                    <h5 class="text-white">عدد التقييمات</h5>
                    <h2 class="text-white">{{ $totalEvaluations }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-primary text-white">
                    <span><i class="ti ti-chart-area fa-3x"></i></span>
                    <h5 class="text-white">متوسط التقييم</h5>
                    <h2 class="text-white">{{ number_format($averageScore, 2) }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div style="background: #045b75 !important;" class="card shadow-sm p-4 text-center bg-primary text-white">
                    <span><i class="ti ti-notification fa-3x"></i></span>
                    <h5 class="text-white">عدد الإشعارات</h5>
                    <h2 class="text-white">{{ $totalNotifications }}</h2>
                </div>
            </div>
        </div>

        <!-- الرسم البياني لمستوى الحفظ -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title"><i class="fas fa-book-open"></i> مستوى الحفظ</h5>
                    <div id="memorizationChart"></div>
                </div>
            </div>

            <!-- الرسم البياني لمتوسط التقييم -->
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title"><i class="fas fa-star"></i> تطور التقييمات</h5>
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
                        @foreach(\App\Models\Evaluation::where('student_id', auth()->user()->student->student_id)->latest('evaluation_date')->take(5)->get() as $evaluation)
                            <li class="list-group-item">
                                {{ $evaluation->surah_name }} - {{ $evaluation->evaluation_date }}
                                <span class="badge bg-secondary float-end">{{ $evaluation->score }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="card-title"><i class="fas fa-bell"></i> أحدث الإشعارات</h5>
                    <ul class="list-group">
                        @foreach(\App\Models\Notification::where('student_id', auth()->user()->student->student_id)->latest('created_at')->take(5)->get() as $notification)
                            <li class="list-group-item">
                                {{ $notification->type }} - {{ date('Y-m-d h:i A', strtotime($notification->created_at)) }}
                                <span class="badge {{ $notification->is_read ? 'bg-success' : 'bg-danger' }} float-end">
                                {{ $notification->is_read ? 'مقروء' : 'غير مقروء' }}
                            </span>
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
                series: [{{ $memorizationProgress['memorized'] }}],
                chart: { type: 'radialBar', height: 350 },
                plotOptions: {
                    radialBar: {
                        dataLabels: { name: { show: false }, value: { formatter: function(val) { return val + " جزء"; } } }
                    }
                },
                labels: ['مستوى الحفظ']
            };

            let evaluationOptions = {
                series: [{
                    name: 'درجة التقييم',
                    data: @json(array_column($evaluationChartData, 'score'))
                }],
                chart: { type: 'line', height: 350 },
                xaxis: { categories: @json(array_column($evaluationChartData, 'date')) },
                yaxis: { title: { text: 'الدرجة' }, min: 0, max: 100 },
                colors: ['#008FFB']
            };

            new ApexCharts(document.querySelector("#memorizationChart"), memorizationOptions).render();
            new ApexCharts(document.querySelector("#evaluationChart"), evaluationOptions).render();
        });
    </script>

@endsection
