@extends('teacher.layouts.app')

@section('title', 'إدارة الحضور')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">قائمة الحضور</h2>
                <a href="{{ route('teacher.attendance.create') }}" class="btn btn-primary">إضافة حضور جديد</a>
            </div>

            <div class="card-body">
                <form method="GET" action="{{ route('teacher.attendance.index') }}">
                    <div class="form-group col-md-6">
                        <label for="study_circle_id">اختر الحلقة الدراسية</label>
                        <select name="study_circle_id" class="form-control" onchange="this.form.submit()">
                            <option value="">-- كل الحلقات --</option>
                            @foreach($studyCircles as $circle)
                                <option value="{{ $circle->study_circle_id }}" {{ $selectedCircle == $circle->study_circle_id ? 'selected' : '' }}>
                                    {{ $circle->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>

                <table id="datatable" class="table table-bordered text-center table-striped mt-3">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الطالب</th>
                        <th>الحالة</th>
                        <th>التاريخ</th>
                        <th>الملاحظات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($attendances as $index => $attendance)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ optional($attendance->student)->name }} {{optional($attendance->student->family)->name}}</td>
                            <td>
                                <span class="badge {{ $attendance->status == 'حاضر' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $attendance->status }}
                                </span>
                            </td>
                            <td>{{ $attendance->date_time }}</td>
                            <td>{{ $attendance->notes ?? 'لا يوجد ملاحظات' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
