@extends('website.layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')

    <section style="margin-top: 100px;" class="login-page sec-pad text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 login-form shadow-sm col-md-8">
                    <h4  class="title mt-3">تسجيل الدخول</h4>
                    <p class="mb-4">يرجى اختيار نوع الحساب وإدخال بيانات تسجيل الدخول.</p>

                    <!-- اختيار نوع الحساب -->
                    <div class="row col-md-12 justify-content-center mb-4">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="user-type-box shadow-sm rounded p-3 text-center bg-light selectable" data-value="family">
                                <i class="fas fa-user-friends fa-3x text-primary mb-2"></i>
                                <h6 class="title">ولي أمر</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="user-type-box shadow-sm rounded p-3 text-center bg-light selectable" data-value="teacher">
                                <i class="fas fa-chalkboard-teacher fa-3x text-primary mb-2"></i>
                                <h6 class="title">معلم</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="user-type-box shadow-sm rounded p-3 text-center bg-light selectable" data-value="student">
                                <i class="fas fa-user-graduate fa-3x text-primary mb-2"></i>
                                <h6 class="title">طالب</h6>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 rounded bg-white">
                        <form action="{{ route('auth.login') }}" method="POST">
                            @csrf

                            <input type="hidden" name="user_type" id="selected_user_type" required>

                            <!-- البريد الإلكتروني -->
                            <div class="form-group">
                                <label for="email">البريد الإلكتروني</label>
                                <input style="direction: rtl;" type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- كلمة المرور -->
                            <div class="form-group">
                                <label for="password">كلمة المرور</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg mt-3">تسجيل الدخول</button>
                        </form>
                        <br>
                        <a class="text-center" href="{{route('auth.register')}}">ليس لديك حساب؟</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let userTypeBoxes = document.querySelectorAll(".user-type-box");
            let selectedUserTypeInput = document.getElementById("selected_user_type");

            userTypeBoxes.forEach(box => {
                box.addEventListener("click", function () {
                    userTypeBoxes.forEach(b => b.classList.remove("selected"));
                    this.classList.add("selected");
                    selectedUserTypeInput.value = this.getAttribute("data-value");
                });
            });
        });
    </script>

    <style>
        .user-type-box {
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            border: 2px solid transparent;
        }

        .user-type-box:hover,
        .user-type-box.selected {
            border-color: #9e5a13;
            background-color: #e3f2fd;
        }

        .login-form {
            border: 2px solid #f0f0f0;
        }
    </style>

@endsection
