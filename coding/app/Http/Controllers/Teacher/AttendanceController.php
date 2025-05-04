<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Notification;
use App\Models\StudyCircle;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $teacher = auth()->user()->teacher;
        $studyCircles = $teacher->studyCircles;

        $selectedCircle = $request->study_circle_id;
        $attendances = Attendance::whereHas('studyCircle', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->teacher_id);
        })->when($selectedCircle, function ($query) use ($selectedCircle) {
            $query->where('study_circle_id', $selectedCircle);
        })->get();

        return view('teacher.attendance.index', compact('studyCircles', 'selectedCircle', 'attendances'));
    }

    public function create(Request $request)
    {
        $teacher = auth()->user()->teacher;
        $studyCircles = $teacher->studyCircles;
        $selectedCircle = $request->study_circle_id;
        $students = [];

        if ($selectedCircle) {
            $students = StudyCircle::findOrFail($selectedCircle)->students;
        }

        return view('teacher.attendance.create', compact('studyCircles', 'selectedCircle', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'study_circle_id' => 'required|exists:study_circle,study_circle_id',
            'attendance' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            foreach ($request->attendance as $studentId => $status) {
                $student = Student::find($studentId);
                Attendance::create([
                    'study_circle_id' => $request->study_circle_id,
                    'student_id' => $studentId,
                    'date_time' => $request->date_time[$studentId] ?? null,
                    'status' => $status,
                    'notes' => $request->notes[$studentId] ?? null,
                ]);
                Notification::create([
                    'student_id' => $studentId,
                    'family_id' => optional($student->family)->family_id ?? null,
                    'type' => 'تحديث الحضور',
                    'message' => "تم تسجيل حالة الحضور للطالب",
                    'is_read' => 0,
                    'created_at' => now(),
                ]);
            }

            DB::commit();
            return redirect()->route('teacher.attendance.index')->with('success', 'تم تسجيل الحضور بنجاح!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء تسجيل الحضور.');
        }
    }
}
