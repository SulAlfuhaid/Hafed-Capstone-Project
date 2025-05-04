@extends('teacher.layouts.app')

@section('title', 'تعديل بيانات الحلقة الدراسية')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">تعديل بيانات الحلقة الدراسية</h2>
                <a href="{{ route('teacher.study-circles.index') }}" class="btn btn-danger mb-3"> عودة للخلف <i class="fa fa-arrow-left"></i> </a>
            </div>
            <div class="card-body">
                <form action="{{ route('teacher.study-circles.update', $studyCircle->study_circle_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="name">اسم الحلقة</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $studyCircle->name) }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="capacity">السعة</label>
                            <input type="number" name="capacity" class="form-control" value="{{ old('capacity', $studyCircle->capacity) }}" required>
                            @error('capacity') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="schedule">الجدول الزمني</label>
                            <input type="text" name="schedule" class="form-control" value="{{ old('schedule', $studyCircle->schedule) }}" required>
                            @error('schedule') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="description">الوصف (اختياري)</label>
                            <textarea name="description" class="form-control">{{ old('description', $studyCircle->description) }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="students">اختر الطلاب</label>
                            <div class="border p-3 rounded shadow-sm">
                                <div class="row">
                                    @foreach($students as $student)
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="students[]"
                                                       value="{{ $student->student_id }}"
                                                    {{ isset($studyCircle) && $studyCircle->students->contains($student->student_id) ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {{ $student->name }} {{optional($student->family)->name}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-3">تحديث</button>
                </form>
            </div>
        </div>
    </div>

@endsection
