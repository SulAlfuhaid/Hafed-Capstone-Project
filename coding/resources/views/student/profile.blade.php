@extends('student.layouts.app')

@section('title', 'ملفي الشخصي')

@section('content')

    <div class="container">
        <h2 class="title mt-3"><i class="fas fa-user"></i> ملفي الشخصي</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('student.profile.update') }}" method="POST">
            @csrf

            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="name">الاسم</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="password">كلمة المرور (اختياري)</label>
                    <input type="password" name="password" class="form-control">
                    <small class="text-muted">اتركه فارغًا إذا كنت لا ترغب في تغييره.</small>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="password_confirmation">تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">حفظ التغييرات</button>
        </form>
    </div>

@endsection
