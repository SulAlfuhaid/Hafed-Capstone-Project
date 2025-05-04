<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = auth()->user()->student;
        $totalStudyCircles = $student->studyCircles()->count();
        $totalEvaluations = $student->evaluations()->count();
        $averageScore = $student->evaluations()->avg('score') ?? 0;
        $totalNotifications = $student->notifications()->count();
        $evaluationChartData = $student->evaluations()
            ->orderBy('evaluation_date')
            ->get()
            ->map(fn($eval) => [
                'date' => $eval->evaluation_date,
                'score' => $eval->score
            ])->toArray();

        $memorizationProgress = [
            'total' => 30,
            'memorized' => $student->memorization_level ?? 0
        ];

        return view('student.dashboard', compact(
            'totalStudyCircles', 'totalEvaluations', 'averageScore', 'totalNotifications',
            'evaluationChartData', 'memorizationProgress'
        ));
    }

    public function profile()
    {
        $student = auth()->user()->student;
        return view('student.profile', compact('student'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $student = $user->student;

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

            $student->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if ($request->filled('password')) {
                $user->update(['password' => Hash::make($request->password)]);
            }

            DB::commit();
            return redirect()->route('student.profile')->with('success', 'تم تحديث البيانات بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث البيانات.');
        }
    }

    public function attendance()
    {
        $student = auth()->user()->student;
        $attendances = $student->attendances()->latest('date_time')->get();
        $totalSessions = $attendances->count();
        $presentCount = $attendances->where('status', 'حاضر')->count();
        $attendancePercentage = $totalSessions > 0 ? ($presentCount / $totalSessions) * 100 : 0;
        return view('student.attendance', compact('attendances', 'attendancePercentage'));
    }

    public function evaluations()
    {
        $student = auth()->user()->student;
        $evaluations = $student->evaluations()->latest('evaluation_date')->get();

        $evaluationChartData = $evaluations->map(fn($eval) => [
            'date' => $eval->evaluation_date,
            'score' => $eval->score
        ])->toArray();

        return view('student.evaluations', compact('evaluations', 'evaluationChartData'));
    }

    public function studyCircles()
    {
        $student = auth()->user()->student;
        $studyCircles = $student->studyCircles;
        return view('student.study_circles', compact('studyCircles'));
    }
    public function leaderboard()
    {
        $student = auth()->user()->student;
        $leaderboard = \App\Models\Leaderboard::orderBy('points', 'desc')->get();
        $studentRank = $leaderboard->search(fn($item) => $item->student_id == $student->student_id) + 1;
        $leaderboardChartData = $leaderboard->take(10)->map(fn($entry) => [
            'name' => $entry->student->name,
            'points' => $entry->points
        ])->toArray();

        return view('student.leaderboard', compact('leaderboard', 'studentRank', 'leaderboardChartData'));
    }


    public function notifications()
    {
        $student = auth()->user()->student;
        $notifications = $student->notifications()->latest()->get();

        return view('student.notifications', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->student->notifications()->findOrFail($id);
        $notification->update(['is_read' => 1]);

        return redirect()->route('student.notifications')->with('success', 'تم تعليم الإشعار كمقروء.');
    }

    public function delete($id)
    {
        $notification = auth()->user()->student->notifications()->findOrFail($id);
        $notification->delete();

        return redirect()->route('student.notifications')->with('success', 'تم حذف الإشعار بنجاح.');
    }

    public function markAllAsRead()
    {
        auth()->user()->student->notifications()->update(['is_read' => 1]);

        return redirect()->route('student.notifications')->with('success', 'تم تعليم جميع الإشعارات كمقروءة.');
    }

    public function deleteAll()
    {
        auth()->user()->student->notifications()->delete();

        return redirect()->route('student.notifications')->with('success', 'تم حذف جميع الإشعارات بنجاح.');
    }


}
