<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\Student;
use App\Models\StudyCircle;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    public function index(Request $request)
    {
        $teacher = auth()->user()->teacher;
        $studyCircles = $teacher->studyCircles;

        $selectedCircle = $request->study_circle_id;
        $evaluations = Evaluation::whereHas('student.studyCircles', function ($query) use ($teacher, $selectedCircle) {
            $query->where('teacher_id', $teacher->teacher_id);
            if ($selectedCircle) {
                $query->where('study_circle_id', $selectedCircle);
            }
        })->get();

        return view('teacher.evaluations.index', compact('studyCircles', 'selectedCircle', 'evaluations'));
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

        return view('teacher.evaluations.create', compact('studyCircles', 'selectedCircle', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'study_circle_id' => 'required|exists:study_circle,study_circle_id',
            'evaluations' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            foreach ($request->evaluations as $studentId => $data) {
                $student = Student::find($studentId);

                Evaluation::create([
                    'student_id' => $studentId,
                    'teacher_id' => auth()->user()->teacher->teacher_id,
                    'surah_name' => $data['surah_name'],
                    'from_verse' => $data['from_verse'],
                    'to_verse' => $data['to_verse'],
                    'score' => $data['score'],
                    'comments' => $data['comments'],
                    'evaluation_date' => now(),
                    'evaluation_type' => $data['evaluation_type'],
                    'notes' => $data['notes'] ?? null,
                ]);
                Notification::create([
                    'student_id' => $studentId,
                    'family_id' => optional($student->family)->family_id ?? null,
                    'type' => 'تقييم جديد',
                    'message' => "تم إضافة تقييم جديد للطالب {$data['student_name']}",
                    'is_read' => 0,
                    'created_at' => now(),
                ]);
            }
            DB::commit();
            return redirect()->route('teacher.evaluations.index')->with('success', 'تمت إضافة التقييم بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة التقييم.');
        }
    }
}
