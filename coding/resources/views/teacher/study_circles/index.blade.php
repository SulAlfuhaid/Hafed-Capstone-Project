@extends('teacher.layouts.app')

@section('title', 'إدارة الحلقات الدراسية')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">قائمة الحلقات الدراسية</h2>
                <a href="{{ route('teacher.study-circles.create') }}" class="btn btn-primary">إضافة حلقة جديدة</a>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered text-center table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الحلقة</th>
                        <th>السعة</th>
                        <th>الجدول الزمني</th>
                        <th>الوصف</th>
                        <th>الطلاب</th>
                        <th>الإجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($studyCircles as $index => $circle)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $circle->name }}</td>
                            <td>{{ $circle->capacity }}</td>
                            <td>{{ $circle->schedule }}</td>
                            <td>{{ $circle->description ?? 'لا يوجد' }}</td>
                            <td>
                                @if($circle->students->isNotEmpty())
                                    <button type="button" class="btn btn-primary p-1" data-bs-toggle="modal" data-bs-target="#studentsModal-{{ $circle->study_circle_id }}">
                                        {{ $circle->students->count() }} طالب
                                    </button>

                                    <!-- Modal لعرض الطلاب -->
                                    <div class="modal fade" id="studentsModal-{{ $circle->study_circle_id }}" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">الطلاب المسجلين في الحلقة: {{ $circle->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered text-center">
                                                        <thead class="text-center">
                                                        <tr class="text-center">
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">اسم الطالب</th>
                                                            <th class="text-center">البريد الإلكتروني</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($circle->students as $index => $student)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $student->name }}</td>
                                                                <td>{{ $student->user->email }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted">لا يوجد طلاب مسجلين</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('teacher.study-circles.edit', $circle->study_circle_id) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>
                                <form action="{{ route('teacher.study-circles.destroy', $circle->study_circle_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟');">
                                        <i class="fas fa-trash"></i> حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
