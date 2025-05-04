<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Family\ChildController;
use App\Http\Controllers\Family\FamilyController;
use App\Http\Controllers\Family\NotificationController;
use App\Http\Controllers\Family\ReportController;
use App\Http\Controllers\Teacher\ReportController as  TReportController;
use App\Http\Controllers\Teacher\AttendanceController;
use App\Http\Controllers\Teacher\EvaluationController;
use App\Http\Controllers\Teacher\StudyCircleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::get('/', [WebsiteController::class, 'home'])->name('home');

Route::get('/services', [WebsiteController::class, 'services'])->name('services');

Route::get('/about', [WebsiteController::class, 'about'])->name('about');

Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');



Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'redirectUser'])->name('dashboard');
});
Route::prefix('family')->name('family.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FamilyController::class, 'dashboard'])->name('dashboard');
    Route::get('profile/edit', [FamilyController::class, 'editProfile'])->name('profile');
    Route::post('profile/update', [FamilyController::class, 'updateProfile'])->name('profile.update');
    Route::resource('children', ChildController::class);
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
    Route::post('/notifications/delete-all', [NotificationController::class, 'deleteAll'])->name('notifications.deleteAll');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/{id}/delete', [NotificationController::class, 'delete'])->name('notifications.delete');
    Route::get('/reports/memorization', [ReportController::class, 'memorizationProgress'])->name('reports.memorization');
    Route::get('/reports/evaluations', [ReportController::class, 'evaluationReport'])->name('reports.evaluations');
    Route::get('/reports/attendance', [ReportController::class, 'attendanceReport'])->name('reports.attendance');
    Route::get('/reports/ranking', [ReportController::class, 'rankingReport'])->name('reports.ranking');
    Route::get('/reports', [FamilyController::class, 'reports'])->name('reports');

});


use App\Http\Controllers\Teacher\TeacherController;

Route::prefix('teacher')->name('teacher.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [TeacherController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [TeacherController::class, 'updateProfile'])->name('profile.update');
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::resource('study-circles', StudyCircleController::class)->except(['show']);

    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('/evaluations/store', [EvaluationController::class, 'store'])->name('evaluations.store');
    Route::resource('reports', TReportController::class)->except(['edit', 'update', 'show']);

});
use App\Http\Controllers\Student\StudentController;

Route::prefix('student')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::post('/profile/update', [StudentController::class, 'updateProfile'])->name('student.profile.update');
    Route::get('/attendance', [StudentController::class, 'attendance'])->name('student.attendance');
    Route::get('/evaluations', [StudentController::class, 'evaluations'])->name('student.evaluations');
    Route::get('/study-circles', [StudentController::class, 'studyCircles'])->name('student.study_circles');
    Route::get('/leaderboard', [StudentController::class, 'leaderboard'])->name('student.leaderboard');
    Route::get('/notifications', [StudentController::class, 'notifications'])->name('student.notifications');
    Route::post('/notifications/read/{id}', [StudentController::class, 'markAsRead'])->name('student.notifications.read');
    Route::post('/notifications/delete/{id}', [StudentController::class, 'delete'])->name('student.notifications.delete');
    Route::post('/notifications/read-all', [StudentController::class, 'markAllAsRead'])->name('student.notifications.readAll');
    Route::post('/notifications/delete-all', [StudentController::class, 'deleteAll'])->name('student.notifications.deleteAll');
});
