@extends('family.layouts.app')

@section('title', 'أبنائي')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">قائمة الأبناء</h2>

                <a href="{{ route('family.children.create') }}" class="btn btn-primary mb-3">إضافة طالب جديد</a>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered text-center table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد الإالكتروني</th>
                        <th>مستوى الحفظ</th>
                        <th>النقاط</th>
                        <th>الإجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($children as $index=>$child)
                        <tr>
                            <td>{{$index +1 }}</td>
                            <td>{{ $child->name }}</td>
                            <td>{{ $child->user->email }}</td>
                            <td>{{ $child->memorization_level }}</td>
                            <td>{{ $child->points }}</td>
                            <td>
                                <a href="{{ route('family.children.edit', $child->student_id) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>
                                <form id="delete-form-{{ $child->student_id }}" action="{{ route('family.children.destroy', $child->student_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form-{{ $child->student_id }}')">
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
