<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyCircle extends Model
{
    use HasFactory;

    protected $table = 'study_circle';
    protected $primaryKey = 'study_circle_id';
    public $timestamps = false;

    protected $fillable = ['name', 'capacity', 'schedule', 'description', 'teacher_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'study_circle_student', 'study_circle_id', 'student_id');
    }

}
