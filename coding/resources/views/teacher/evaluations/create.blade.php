@extends('teacher.layouts.app')

@section('title', 'إضافة تقييم')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">إضافة تقييم</h2>
                <a href="{{ route('teacher.evaluations.index') }}" class="btn btn-danger mb-3"> عودة للخلف <i class="fa fa-arrow-left"></i> </a>

            </div>

            <div class="card-body">
                <form method="GET" action="{{ route('teacher.evaluations.create') }}">
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
                    <form action="{{ route('teacher.evaluations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="study_circle_id" value="{{ $selectedCircle }}">

                        <table class="table table-bordered text-center mt-3">
                            <thead>
                            <tr>
                                <th>اسم الطالب</th>
                                <th>السورة</th>
                                <th>من آية</th>
                                <th>إلى آية</th>
                                <th>التقييم</th>
                                <th>نوع التقييم</th>
                                <th>ملاحظات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>   {{ $student->name }} {{optional($student->family)->name}}</td>
                                    <td>
                                        <select name="evaluations[{{ $student->student_id }}][surah_name]" class="form-control">
                                            @foreach(getQuranSurahs() as $surah)
                                                <option value="{{ $surah }}">{{ $surah }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" name="evaluations[{{ $student->student_id }}][from_verse]" class="form-control" required></td>
                                    <td><input type="number" name="evaluations[{{ $student->student_id }}][to_verse]" class="form-control" required></td>
                                    <td><input type="number" name="evaluations[{{ $student->student_id }}][score]" class="form-control" required></td>
                                    <td>
                                        <select name="evaluations[{{ $student->student_id }}][evaluation_type]" class="form-control">
                                            <option value="شفوي">شفوي</option>
                                            <option value="تحريري">تحريري</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="evaluations[{{ $student->student_id }}][comments]" class="form-control"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <button type="submit" class="btn btn-primary">حفظ التقييمات</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

@endsection
