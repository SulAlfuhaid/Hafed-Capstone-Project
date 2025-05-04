<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChildController extends Controller
{
    public function index()
    {
        $children = Student::where('family_id', auth()->user()->family->family_id)->get();
        return view('family.children.index', compact('children'));
    }

    public function create()
    {
        $memorizationLevels = range(0, 30);
        return view('family.children.create', compact('memorizationLevels'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8|confirmed',
            'memorization_level' => 'required|integer|min:0|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            // إنشاء مستخدم جديد
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => 'student',
                'created_at' => now(),
            ]);
            Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_id' => $user->user_id,
                'family_id' => auth()->user()->family->family_id,
                'memorization_level' => $request->memorization_level,
                'points' => 0,
                'created_at' => now(),
            ]);
            DB::commit();
            return redirect()->route('family.children.index')->with('success', 'تمت إضافة الطالب بنجاح!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة الطالب، يرجى المحاولة مرة أخرى.');
        }
    }

    // عرض نموذج تعديل بيانات الطالب
    public function edit($id)
    {
        $child = Student::where('family_id', auth()->user()->family->family_id)->findOrFail($id);
        $memorizationLevels = range(0, 30);
        return view('family.children.edit', compact('child', 'memorizationLevels'));
    }

    public function update(Request $request, $id)
    {
        $child = Student::where('family_id', auth()->user()->family->family_id)->findOrFail($id);
        $user = $child->user;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $user->user_id . ',user_id',
            'memorization_level' => 'required|integer|min:0|max:30',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $user->update([
                'email' => $request->email,
            ]);

            $child->update([
                'email' => $request->email,
                'name' => $request->name,
                'memorization_level' => $request->memorization_level,
            ]);
            if ($request->filled('password')) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            DB::commit();
            return redirect()->route('family.children.index')->with('success', 'تم تحديث بيانات الطالب بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث بيانات الطالب.');
        }
    }


    public function destroy($id)
    {
        $child = Student::where('family_id', auth()->user()->family->family_id)->findOrFail($id);

        DB::beginTransaction();
        try {
            $child->delete();
            User::where('user_id', $child->user_id)->delete();
            DB::commit();
            return redirect()->route('family.children.index')->with('success', 'تم حذف الطالب بنجاح!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('family.children.index')->with('error', 'حدث خطأ أثناء حذف الطالب.');
        }
    }
}
