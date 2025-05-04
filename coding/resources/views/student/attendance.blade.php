@extends('student.layouts.app')

@section('title', 'سجل الحضور')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="title text-primary"><i class="ti ti-calendar-check"></i> سجل الحضور</h2>
            </div>

            <div class="card-body">
                <h5 class="mb-3"><i class="fas fa-chart-line"></i> نسبة الحضور: {{ number_format($attendancePercentage, 2) }}%</h5>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $attendancePercentage }}%;"
                         aria-valuenow="{{ $attendancePercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                @if($attendances->isEmpty())
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle"></i> لا يوجد سجلات حضور حالياً.
                    </div>
                @else
                    <table id="datatable" class="table table-bordered text-center table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">الحلقة الدراسية</th>
                            <th class="text-center">التاريخ</th>
                            <th class="text-center">الحالة</th>
                            <th class="text-center">الملاحظات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($attendances as $index => $attendance)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $attendance->studyCircle->name }}</td>
                                <td>{{ $attendance->date_time }}</td>
                                <td>
                                    <span class="badge {{ $attendance->status == 'حاضر' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $attendance->status == 'حاضر' ? '✔ حاضر' : '✘ غائب' }}
                                    </span>
                                </td>
                                <td>{{ $attendance->notes ?? 'لا يوجد ملاحظات' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

@endsection
