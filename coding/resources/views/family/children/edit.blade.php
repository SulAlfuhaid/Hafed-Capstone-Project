@extends('family.layouts.app')

@section('title', 'تعديل بيانات الطالب')

@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h2 class="title">تعديل بيانات الطالب</h2>

                <a href="{{ route('family.children.index') }}" class="btn btn-danger mb-3"> عودة للخلف <i class="fa fa-arrow-left"></i>  </a>
            </div>
            <div class="card-body">
                <form action="{{ route('family.children.update', $child->student_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="text" name="name" class="form-control" value="{{ $child->user->name }}" required>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" value="{{ $child->user->email }}" required>
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

                        <!-- مستوى الحفظ -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="memorization_level">مستوى الحفظ</label>
                            <select name="memorization_level" class="form-control" required>
                                @foreach($memorizationLevels as $level)
                                    <option value="{{ $level }}" {{ $child->memorization_level == $level ? 'selected' : '' }}>
                                        {{ $level }} جزء
                                    </option>
                                @endforeach
                            </select>
                            @error('memorization_level') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">تحديث</button>
                </form>
            </div>
        </div>

    </div>
@endsection
