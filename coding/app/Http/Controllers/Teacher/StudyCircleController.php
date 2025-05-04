<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudyCircle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyCircleController extends Controller
{
    public function index()
    {
        $studyCircles = StudyCircle::where('teacher_id', auth()->user()->teacher->teacher_id)->get();
        return view('teacher.study_circles.index', compact('studyCircles'));
    }

    public function create()
    {
        $students = Student::all();
        return view('teacher.study_circles.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'schedule' => 'required|string',
            'description' => 'nullable|string',
            'students' => 'array',
        ]);

        DB::beginTransaction();
        try {
            $studyCircle= StudyCircle::create([
                'name' => $request->name,
                'capacity' => $request->capacity,
                'schedule' => $request->schedule,
                'description' => $request->description,
                'teacher_id' => auth()->user()->teacher->teacher_id,
            ]);
            if ($request->has('students')) {
                $studyCircle->students()->attach($request->students);
            }
            DB::commit();
            return redirect()->route('teacher.study-circles.index')->with('success', 'تمت إضافة الحلقة الدراسية بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة الحلقة الدراسية.');
        }
    }

    public function edit($id)
    {
        $studyCircle = StudyCircle::where('teacher_id', auth()->user()->teacher->teacher_id)->findOrFail($id);
        $students = Student::all();
        return view('teacher.study_circles.edit', compact('studyCircle', 'students'));
    }

    public function update(Request $request, $id)
    {
        $studyCircle = StudyCircle::where('teacher_id', auth()->user()->teacher->teacher_id)->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'schedule' => 'required|string',
            'description' => 'nullable|string',
            'students' => 'array',
        ]);

        DB::beginTransaction();
        try {
            $studyCircle->update($request->all());
            if ($request->has('students')) {
                $studyCircle->students()->sync($request->students);
            }
            DB::commit();
            return redirect()->route('teacher.study-circles.index')->with('success', 'تم تحديث الحلقة الدراسية بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث الحلقة الدراسية.');
        }
    }

    public function destroy($id)
    {
        $studyCircle = StudyCircle::where('teacher_id', auth()->user()->teacher->teacher_id)->findOrFail($id);

        DB::beginTransaction();
        try {
            $studyCircle->delete();
            DB::commit();
            return redirect()->route('study-circles.index')->with('success', 'تم حذف الحلقة الدراسية بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('study-circles.index')->with('error', 'حدث خطأ أثناء حذف الحلقة الدراسية.');
        }
    }
}
