@extends('family.layouts.app')

@section('title', 'تحديث بيانات الحساب')

@section('content')

    <div class="container">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">تحديث بيانات الحساب</h2>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('family.profile.update') }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- الاسم -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="name">الاسم</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $family->name) }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- البريد الإلكتروني -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- رقم الهاتف -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="phone_number">رقم الهاتف</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $family->phone_number) }}" required>
                            @error('phone_number') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- كلمة المرور (اختيارية) -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="password">كلمة المرور (اختياري)</label>
                            <input type="password" name="password" class="form-control">
                            <small class="text-muted">اتركه فارغًا إذا كنت لا ترغب في تغييره.</small>
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- تأكيد كلمة المرور -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="password_confirmation">تأكيد كلمة المرور</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">حفظ التغييرات</button>
                </form>
            </div>
        </div>
    </div>

@endsection
