@extends('teacher.layouts.app')

@section('title', 'إرسال تقرير إلى ولي الأمر')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title text-primary"><i class="ti ti-file-text"></i>  إرسال تقرير إلى ولي الأمر</h2>
                <a href="{{ route('teacher.reports.index') }}" class="btn btn-danger mb-3"> عودة للخلف <i class="fa fa-arrow-left"></i> </a>
            </div>

            <div class="card-body">
                <form action="{{ route('teacher.reports.create') }}" method="GET">
                    <div class="form-group col-md-6 mb-3">
                        <label for="family_id">اختر ولي الأمر</label>
                        <select name="family_id" class="form-control" onchange="this.form.submit()" required>
                            <option value="">-- اختر --</option>
                            @foreach($families as $family)
                                <option value="{{ $family->family_id }}" {{ request('family_id') == $family->family_id ? 'selected' : '' }}>
                                    {{ $family->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>

                @if(request('family_id'))
                    <form action="{{ route('teacher.reports.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="family_id" value="{{ request('family_id') }}">

                   <div class="row">
                       <div class="form-group col-md-6 mb-3">
                           <label for="student_id">اختر الطالب</label>
                           <select name="student_id" class="form-control" required>
                               <option value="">-- اختر الطالب --</option>
                               @foreach($students as $student)
                                   <option value="{{ $student->student_id }}" {{ old('student_id') == $student->student_id ? 'selected' : '' }}>
                                       {{ $student->name }}
                                   </option>
                               @endforeach
                           </select>
                           @error('student_id') <small class="text-danger">{{ $message }}</small> @enderror
                       </div>

                       <div class="form-group col-md-6 mb-3">
                           <label for="report_type">نوع التقرير</label>
                           <select name="report_type" class="form-control" required>
                               <option value="">-- اختر نوع التقرير --</option>
                               <option value="سلوك الطالب" {{ old('report_type') == 'سلوك الطالب' ? 'selected' : '' }}>سلوك الطالب</option>
                               <option value="التقدم الأكاديمي" {{ old('report_type') == 'التقدم الأكاديمي' ? 'selected' : '' }}>التقدم الأكاديمي</option>
                               <option value="ملاحظات المعلم" {{ old('report_type') == 'ملاحظات المعلم' ? 'selected' : '' }}>ملاحظات المعلم</option>
                               <option value="احتياج لدعم إضافي" {{ old('report_type') == 'احتياج لدعم إضافي' ? 'selected' : '' }}>احتياج لدعم إضافي</option>
                               <option value="تفوق ملحوظ" {{ old('report_type') == 'تفوق ملحوظ' ? 'selected' : '' }}>تفوق ملحوظ</option>
                           </select>
                           @error('report_type') <small class="text-danger">{{ $message }}</small> @enderror
                       </div>

                       <div class="form-group col-md-12 mb-3">
                           <label for="content">محتوى التقرير</label>
                           <textarea name="content" class="form-control" required></textarea>
                           @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                       </div>

                   </div>
                        <button type="submit" class="btn btn-primary">إرسال التقرير</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

@endsection
