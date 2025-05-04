@extends('teacher.layouts.app')

@section('title', 'تسجيل الحضور')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">تسجيل الحضور</h2>
                <a href="{{ route('teacher.attendance.index') }}" class="btn btn-danger mb-3"> عودة للخلف <i class="fa fa-arrow-left"></i> </a>

            </div>

            <div class="card-body">
                <form method="GET" action="{{ route('teacher.attendance.create') }}">
                    <div class="form-group col-md-6">
                        <label for="study_circle_id">اختر الحلقة الدراسية</label>
                        <select name="study_circle_id" class="form-control" onchange="this.form.submit()">
                            <option value="">-- اختر --</option>
                            @foreach($studyCircles as $circle)
                                <option value="{{ $circle->study_circle_id }}" {{ $selectedCircle == $circle->study_circle_id ? 'selected' : '' }}>
                                    {{ $circle->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>

                @if ($selectedCircle)
                    <form action="{{ route('teacher.attendance.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="study_circle_id" value="{{ $selectedCircle }}">

                        <table class="table table-bordered text-center mt-3">
                            <thead>
                            <tr>
                                <th>اسم الطالب</th>
                                <th>الحالة</th>
                                <th>الوقت والتاريخ</th>
                                <th>ملاحظات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>   {{ $student->name }} {{optional($student->family)->name}}</td>
                                    <td>
                                        <select name="attendance[{{ $student->student_id }}]" class="form-control">
                                            <option value="حاضر">حاضر</option>
                                            <option value="غائب">غائب</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="datetime-local" name="date_time[{{ $student->student_id }}]" value="{{now()}}" class="form-control">
                                    </td>
                                    <td><input type="text" name="notes[{{ $student->student_id }}]" class="form-control"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <button type="submit" class="btn btn-primary">حفظ الحضور</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

@endsection
