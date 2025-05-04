@extends('student.layouts.app')

@section('title', 'حلقاتي الدراسية')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="title text-primary"><i class="ti ti-books"></i> الحلقات الدراسية</h2>
            </div>

            <div class="card-body">
                @if($studyCircles->isEmpty())
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle"></i> لا يوجد حلقات دراسية مسجل بها حالياً.
                    </div>
                @else
                    <table id="datatable" class="table table-bordered text-center table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الحلقة</th>
                            <th>المعلم</th>
                            <th>الجدول الزمني</th>
                            <th>السعة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($studyCircles as $index => $circle)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $circle->name }}</td>
                                <td>{{ $circle->teacher->name }}</td>
                                <td>{{ $circle->schedule }}</td>
                                <td>{{ $circle->capacity }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

@endsection
