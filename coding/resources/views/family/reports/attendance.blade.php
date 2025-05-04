@extends('family.layouts.app')

@section('title', 'تقرير الحضور والانضباط')

@section('content')

    <div class="container">
        <h2 class="title mt-3"><i class="fas fa-calendar-check"></i> تقرير الحضور والانضباط</h2>

        @if($children->isEmpty())
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> لا يوجد بيانات متاحة للأبناء.
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <div id="attendanceChart"></div>
                </div>
            </div>

            <div class="row mt-4">
                @foreach($children as $child)
                    <div class="col-md-12">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $child->name }}</h5>
                                <p class="card-text">
                                    عدد الجلسات: <strong>{{ $child->attendance->count() }}</strong> |
                                    عدد الغيابات: <strong>{{ $child->attendance->where('status', 'غائب')->count() }}</strong>
                                </p>

                                @if($child->attendance->isNotEmpty())
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>التاريخ</th>
                                            <th>الحالة</th>
                                            <th>الملاحظات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($child->attendance as $attendance)
                                            <tr>
                                                <td>{{ $attendance->date_time }}</td>
                                                <td>
                                                    @if($attendance->status == 'حاضر')
                                                        <span class="badge bg-success">حاضر</span>
                                                    @else
                                                        <span class="badge bg-danger">غائب</span>
                                                    @endif
                                                </td>
                                                <td>{{ $attendance->notes ?? 'لا يوجد' }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-warning">لا يوجد بيانات حضور لهذا الطالب.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                series: [{
                    name: 'حضور',
                    data: @json($children->map(fn($child) => $child->attendance->where('status', 'حاضر')->count()))
                }, {
                    name: 'غياب',
                    data: @json($children->map(fn($child) => $child->attendance->where('status', 'غائب')->count()))
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
                    title: {
                        text: 'عدد الجلسات'
                    },
                    min: 0
                },
                colors: ['#28a745', '#dc3545'],
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " جلسة";
                        }
                    }
                }
            };

            let chart = new ApexCharts(document.querySelector("#attendanceChart"), options);
            chart.render();
        });
    </script>

@endsection
