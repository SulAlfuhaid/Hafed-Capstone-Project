@extends('family.layouts.app')

@section('title', 'إضافة طالب')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">إضافة طالب جديد</h2>

                <a href="{{ route('family.children.index') }}" class="btn btn-danger mb-3"> عودة للخلف <i class="fa fa-arrow-left"></i>  </a>
            </div>
            <div class="card-body">
                <form action="{{ route('family.children.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="email">الاسم </label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="password">كلمة المرور</label>
                            <input type="password" name="password" class="form-control" required>
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="password_confirmation">تأكيد كلمة المرور</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="memorization_level">مستوى الحفظ</label>
                            <select name="memorization_level" class="form-control" required>
                                @foreach($memorizationLevels as $level)
                                    <option value="{{ $level }}" {{ old('memorization_level') == $level ? 'selected' : '' }}>
                                        {{ $level }} جزء
                                    </option>
                                @endforeach
                            </select>
                            @error('memorization_level') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">إضافة</button>
                </form>
            </div>
        </div>

    </div>
@endsection
