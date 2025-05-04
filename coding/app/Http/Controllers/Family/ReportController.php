<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Models\Leaderboard;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function memorizationProgress()
    {
        $children = Student::where('family_id', auth()->user()->family->family_id)->get();
        return view('family.reports.memorization', compact('children'));
    }

    public function evaluationReport()
    {
        $children = auth()->user()->family->students()->with('evaluations.teacher')->get();

        return view('family.reports.evaluations', compact('children'));
    }

    public function attendanceReport()
    {
        $children = auth()->user()->family->students()->with('attendance')->get();

        return view('family.reports.attendance', compact('children'));
    }

    public function rankingReport()
    {
        $children = auth()->user()->family->students()
            ->with(['leaderboard' => function ($query) {
                $query->orderBy('points', 'desc');
            }])
            ->get();

        $leaderboard = Leaderboard::orderBy('points', 'desc')->get();
        return view('family.reports.ranking', compact('children', 'leaderboard'));
    }
}
