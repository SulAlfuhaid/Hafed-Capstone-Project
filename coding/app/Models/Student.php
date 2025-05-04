<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';
    protected $primaryKey = 'student_id';
    public $timestamps = false;

    protected $fillable = ['user_id', 'family_id','name', 'memorization_level', 'points', 'created_at', 'email', 'password'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function family()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'student_id');
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'student_id');
    }
    public function leaderboard()
    {
        return $this->hasOne(Leaderboard::class, 'student_id');
    }

    public function studyCircles()
    {
        return $this->belongsToMany(StudyCircle::class, 'study_circle_student', 'student_id', 'study_circle_id');
    }

}
