<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $primaryKey = 'attendance_id';
    public $timestamps = false;

    protected $fillable = [
        'student_id', 'study_circle_id', 'date_time', 'status', 'notes'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function studyCircle()
    {
        return $this->belongsTo(StudyCircle::class, 'study_circle_id');
    }
}
