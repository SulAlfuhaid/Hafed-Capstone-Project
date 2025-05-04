<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $teacher = auth()->user()->teacher;
        $studyCircles = $teacher->studyCircles;
        $students = $studyCircles->pluck('students')->flatten();
        $totalCircles = $studyCircles->count();
        $totalStudents = $students->count();
        $averageScore = $students->pluck('evaluations')->flatten()->avg('score') ?? 0;
        $totalReports = $teacher->reports()->count();

        return view('teacher.dashboard', compact('totalCircles', 'totalStudents', 'averageScore', 'totalReports', 'studyCircles', 'students', 'teacher'));
    }


    public function profile()
    {
        $teacher = auth()->user()->teacher;
        return view('teacher.profile', compact('teacher'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $teacher = $user->teacher;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $user->user_id . ',user_id',
            'password' => 'nullable|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $user->update(['email' => $request->email]);
            $teacher->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($request->filled('password')) {
                $user->update(['password' => Hash::make($request->password)]);
            }

            DB::commit();
            return redirect()->route('teacher.profile')->with('success', 'تم تحديث البيانات بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث البيانات.');
        }
    }
}
