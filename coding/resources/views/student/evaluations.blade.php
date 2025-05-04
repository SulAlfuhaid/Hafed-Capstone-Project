@extends('student.layouts.app')

@section('title', 'سجل التقييمات')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="title text-primary"><i class="ti ti-star"></i> سجل التقييمات</h2>
            </div>

            <div class="card-body">
                @if($evaluations->isEmpty())
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle"></i> لا يوجد تقييمات متاحة حالياً.
                    </div>
                @else
                    <h5 class="mb-3"><i class="fas fa-chart-line"></i> تطور التقييمات بمرور الوقت</h5>
                    <div id="evaluationChart"></div>

                    <table id="datatable" class="table table-bordered text-center table-striped mt-4">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>التاريخ</th>
                            <th>السورة</th>
                            <th>من آية</th>
                            <th>إلى آية</th>
                            <th>التقييم</th>
                            <th>نوع التقييم</th>
                            <th>ملاحظات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($evaluations as $index => $evaluation)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $evaluation->evaluation_date }}</td>
                                <td>{{ $evaluation->surah_name }}</td>
                                <td>{{ $evaluation->from_verse }}</td>
                                <td>{{ $evaluation->to_verse }}</td>
                                <td>
                                    <span class="badge {{ $evaluation->score >= 80 ? 'bg-success' : ($evaluation->score >= 50 ? 'bg-warning' : 'bg-danger') }}">
                                        {{ $evaluation->score }}
                                    </span>
                                </td>
                                <td>{{ $evaluation->evaluation_type }}</td>
                                <td>{{ $evaluation->comments ?? 'لا يوجد ملاحظات' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let evaluationOptions = {
                series: [{
                    name: 'درجة التقييم',
                    data: @json(array_column($evaluationChartData, 'score'))
                }],
                chart: {
                    type: 'area',
                    height: 300
                },
                xaxis: {
                    categories: @json(array_column($evaluationChartData, 'date'))
                },
                yaxis: {
                    title: { text: 'الدرجة' },
                    min: 0,
                    max: 100
                },
                colors: ['#008FFB']
            };

            new ApexCharts(document.querySelector("#evaluationChart"), evaluationOptions).render();
        });
    </script>

@endsection
