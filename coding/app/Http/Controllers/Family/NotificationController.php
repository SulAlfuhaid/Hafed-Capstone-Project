<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // عرض الإشعارات
    public function index()
    {
        $studentIds = auth()->user()->family->students->pluck('student_id');
        $notifications = Notification::whereIn('student_id', $studentIds)
            ->orWhere('family_id', auth()->user()->family->family_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('family.notifications', compact('notifications'));
    }

    // تحديد جميع الإشعارات كمقروءة
    public function markAllAsRead()
    {
        $studentIds = auth()->user()->family->students->pluck('student_id');

        Notification::whereIn('student_id', $studentIds)->update(['is_read' => 1]);

        return redirect()->route('family.notifications')->with('success', 'تم تحديد جميع الإشعارات كمقروءة.');
    }

    // حذف جميع الإشعارات
    public function deleteAll()
    {
        $studentIds = auth()->user()->family->students->pluck('student_id');

        Notification::whereIn('student_id', $studentIds)->delete();

        return redirect()->route('family.notifications')->with('success', 'تم حذف جميع الإشعارات.');
    }

    // تحديد إشعار واحد كمقروء
    public function markAsRead($id)
    {
        $notification = Notification::where('notification_id', $id)
            ->whereIn('student_id', auth()->user()->family->students->pluck('student_id'))
            ->firstOrFail();

        $notification->update(['is_read' => 1]);

        return redirect()->route('family.notifications')->with('success', 'تم تحديد الإشعار كمقروء.');
    }

    // حذف إشعار واحد
    public function delete($id)
    {
        $notification = Notification::where('notification_id', $id)
            ->whereIn('student_id', auth()->user()->family->students->pluck('student_id'))
            ->firstOrFail();

        $notification->delete();

        return redirect()->route('family.notifications')->with('success', 'تم حذف الإشعار.');
    }
}
