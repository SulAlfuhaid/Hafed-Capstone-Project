@extends('family.layouts.app')

@section('title', 'تقرير الحفظ')

@section('content')

    <div class="container">
        <h2 class="title mt-3"><i class="fas fa-chart-line"></i> تقرير الحفظ والتقدم</h2>

        @if($children->isEmpty())
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> لا يوجد بيانات متاحة للأبناء.
            </div>
        @else
            <div id="memorizationChart" class="mt-4"></div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                series: [{
                    name: 'عدد الأجزاء المحفوظة',
                    data: @json($children->pluck('memorization_level'))
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
                        text: 'عدد الأجزاء'
                    },
                    min: 0,
                    max: 30
                },
                colors: ['#008FFB'],
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " جزء";
                        }
                    }
                }
            };

            let chart = new ApexCharts(document.querySelector("#memorizationChart"), options);
            chart.render();
        });
    </script>

@endsection
