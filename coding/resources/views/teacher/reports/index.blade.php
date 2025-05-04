@extends('teacher.layouts.app')

@section('title', 'إدارة التقارير')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">   قائمة التقارير لأولياء الامور </h2>
                <a href="{{ route('teacher.reports.create') }}" class="btn btn-primary">إضافة تقرير جديد</a>
            </div>

            <div class="card-body">
                <table id="datatable" class="table table-bordered text-center table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ولي الأمر</th>
                        <th>نوع التقرير</th>
                        <th>التاريخ</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reports as $index => $report)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $report->family->name }}</td>
                            <td>{{ $report->report_type }}</td>
                            <td>{{ $report->created_at }}</td>
                            <td>
                                <span class="badge {{ $report->is_read ? 'bg-success' : 'bg-danger' }}">
                                    {{ $report->is_read ? 'مقروء' : 'غير مقروء' }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('teacher.reports.destroy', $report->report_id) }}" method="POST" class="d-inline">
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
