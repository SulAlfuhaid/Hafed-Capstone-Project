@extends('teacher.layouts.app')

@section('title', 'إدارة التقييمات')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">قائمة التقييمات</h2>
                <a href="{{ route('teacher.evaluations.create') }}" class="btn btn-primary">إضافة تقييم جديد</a>
            </div>

            <div class="card-body">
                <form method="GET" action="{{ route('teacher.evaluations.index') }}">
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
                        <th>السورة</th>
                        <th>من آية</th>
                        <th>إلى آية</th>
                        <th>التقييم</th>
                        <th>الملاحظات</th>
                        <th>التاريخ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($evaluations as $index => $evaluation)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ optional($evaluation->student)->name }} {{optional($evaluation->student->family)->name}}</td>
                            <td>{{ $evaluation->surah_name }}</td>
                            <td>{{ $evaluation->from_verse }}</td>
                            <td>{{ $evaluation->to_verse }}</td>
                            <td>{{ $evaluation->score }}</td>
                            <td>{{ $evaluation->comments ?? 'لا يوجد ملاحظات' }}</td>
                            <td>{{ $evaluation->evaluation_date }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
