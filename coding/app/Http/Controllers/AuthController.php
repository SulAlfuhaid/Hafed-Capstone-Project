<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Family;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8|confirmed',
            'user_type' => 'required|in:family,teacher',
            'phone_number' => $request->user_type == 'family' ? ['required', new PhoneNumber] : 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
                'created_at' => now(),
            ]);

            if ($request->user_type == 'family') {
                Family::create([
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'user_id' => $user->user_id,
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'created_at' => now(),
                ]);
            } elseif ($request->user_type == 'teacher') {
                Teacher::create([
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'user_id' => $user->user_id,
                    'name' => $request->name,
                    'created_at' => now(),
                ]);
            }
            DB::commit();
            return redirect()->route('auth.login')->with('success', 'تم التسجيل بنجاح! الرجاء تسجيل الدخول.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'حدث خطأ أثناء التسجيل. الرجاء المحاولة مرة أخرى.');
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
           return $this->redirectUser();
        }

        return back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function redirectUser()
    {
        if (auth()->user()->user_type == 'teacher') {
            return redirect()->route('teacher.dashboard');
        } elseif (auth()->user()->user_type == 'family') {
            return redirect()->route('family.dashboard');
        }

        return redirect()->route('student.dashboard');
    }
}
