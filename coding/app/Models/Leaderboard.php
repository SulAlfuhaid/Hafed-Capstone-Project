<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;

    protected $table = 'leaderboard';
    protected $primaryKey = 'leaderboard_id';
    public $timestamps = false;

    protected $fillable = [
        'student_id', 'points', 'ranking', 'board_type', 'period_start_date', 'period_end_date'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
