@extends('website.layouts.app')

@section('title', 'التسجيل')

@section('content')

    <section style="margin-top: 100px;" class="register-page sec-pad text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 register-form shadow-sm col-md-8">
                    <h2 class="title">إنشاء حساب جديد</h2>
                    <p>يرجى اختيار نوع الحساب وإدخال البيانات المطلوبة.</p>

                    <!-- اختيار نوع الحساب -->
                    <div class="row col-md-12 justify-content-center mb-4">
                        <div class="col-lg-6 col-md-4 col-sm-6">
                            <div class="user-type-box shadow-sm rounded p-3 text-center bg-light selectable" data-value="family">
                                <i class="fas fa-user-friends fa-3x text-primary mb-2"></i>
                                <h6 class="title">ولي أمر</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6">
                            <div class="user-type-box shadow-sm rounded p-3 text-center bg-light selectable" data-value="teacher">
                                <i class="fas fa-chalkboard-teacher fa-3x text-primary mb-2"></i>
                                <h6 class="title">معلم</h6>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 rounded bg-white">
                        <form action="{{ route('auth.register') }}" method="POST">
                            @csrf

                            <input type="hidden" name="user_type" id="selected_user_type" required>

                            <!-- الاسم -->
                            <div class="form-group">
                                <label for="name">الاسم الكامل</label>
                                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

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
                                <small class="text-muted">يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل.</small>
                                <br>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- تأكيد كلمة المرور -->
                            <div class="form-group">
                                <label for="password_confirmation">تأكيد كلمة المرور</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>

                            <!-- رقم الهاتف (إجباري فقط إذا كان ولي أمر) -->
                            <div class="form-group" id="phone_number_group" style="display: none;">
                                <label for="phone_number">رقم الهاتف</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}">
                                <small class="text-muted">يجب أن يكون بصيغة +9665XXXXXXXX أو 05XXXXXXXX.</small>
                                <br>
                                @error('phone_number')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg mt-3">إنشاء حساب</button>

                        </form>
                        <br>
                        <br>
                        <a class="text-center" href="{{route('auth.login')}}">هل لديك حساب؟</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let userTypeBoxes = document.querySelectorAll(".user-type-box");
            let selectedUserTypeInput = document.getElementById("selected_user_type");
            let phoneNumberGroup = document.getElementById("phone_number_group");

            userTypeBoxes.forEach(box => {
                box.addEventListener("click", function () {
                    userTypeBoxes.forEach(b => b.classList.remove("selected"));
                    this.classList.add("selected");
                    selectedUserTypeInput.value = this.getAttribute("data-value");

                    if (selectedUserTypeInput.value === "family") {
                        phoneNumberGroup.style.display = "block";
                    } else {
                        phoneNumberGroup.style.display = "none";
                    }
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

        .register-form {
            border: 2px solid #f0f0f0;
        }
    </style>

@endsection
