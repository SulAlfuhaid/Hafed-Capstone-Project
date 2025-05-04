<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher';
    protected $primaryKey = 'teacher_id';
    public $timestamps = false;

    protected $fillable = ['user_id', 'name', 'created_at', 'email', 'password'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function studyCircles()
    {
        return $this->hasMany(StudyCircle::class, 'teacher_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'teacher_id');
    }
    public function reports()
    {
        return $this->hasMany(Report::class, 'teacher_id');
    }
}
