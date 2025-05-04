<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Notification;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('teacher_id', auth()->user()->teacher->teacher_id)->get();
        return view('teacher.reports.index', compact('reports'));
    }

    public function create(Request $request)
    {
        $families = Family::all();
        $students = [];
        if ($request->family_id) {
            $students = Family::findOrFail($request->family_id)->students;
        }
        return view('teacher.reports.create', compact('families', 'students'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'family_id' => 'required|exists:family,family_id',
            'report_type' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $report = Report::create([
                'teacher_id' => auth()->user()->teacher->teacher_id,
                'family_id' => $request->family_id,
                'report_type' => $request->report_type,
                'content' => $request['content'] ?? '',
                'created_at' => now(),
                'is_read' => 0,
            ]);
            Notification::create([
                'student_id' => $request->student_id,
                'family_id' => $request->family_id,
                'type' => 'تقرير جديد',
                'message' => "تم إرسال تقرير جديد بخصوص ابنك.",
                'is_read' => 0,
                'created_at' => now(),
            ]);
            DB::commit();
            return redirect()->route('teacher.reports.index')->with('success', 'تم إرسال التقرير بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء إرسال التقرير.');
        }
    }

    public function destroy($id)
    {
        $report = Report::where('teacher_id', auth()->user()->teacher->teacher_id)->findOrFail($id);
        DB::beginTransaction();
        try {
            $report->delete();
            DB::commit();
            return redirect()->route('teacher.reports.index')->with('success', 'تم حذف التقرير بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('teacher.reports.index')->with('error', 'حدث خطأ أثناء حذف التقرير.');
        }
    }
}
