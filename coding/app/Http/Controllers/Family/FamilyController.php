<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Student;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function dashboard()
    {
        $family = auth()->user()->family;

        if (!$family) {
            return view('family.dashboard', [
                'children' => collect(),
                'totalChildren' => 0,
                'averageScore' => 0,
                'totalSessions' => 0,
            ]);
        }

        $children = $family->students()->with(['leaderboard', 'attendance', 'evaluations'])->get();

        $totalChildren = $children->count();
        $averageScore = $children->pluck('evaluations')->flatten()->avg('score') ?? 0;
        $totalSessions = $children->pluck('attendance')->flatten()->count();

        return view('family.dashboard', compact('children', 'totalChildren', 'averageScore', 'totalSessions'));
    }



    public function editProfile()
    {
        return view('family.profile', ['family' => auth()->user()->family]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => ['required', new PhoneNumber]
        ]);
        auth()->user()->family->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);
        return redirect()->route('family.profile')->with('success', 'تم تحديث بيانات الحساب بنجاح!');
    }

    public function notifications()
    {
        $studentIds = auth()->user()->family->students->pluck('student_id');
        $notifications = Notification::whereIn('student_id', $studentIds)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('family.notifications', compact('notifications'));
    }

//    public function reports()
//    {
//        $children = Student::where('family_id', auth()->user()->family->family_id)->with('evaluations')->get();
//        return view('family.reports', compact('children'));
//    }

    public function reports()
    {
        $family = auth()->user()->family;
        $reports = $family->reports()->latest()->get();

        return view('family.repo', compact('reports'));
    }


}
