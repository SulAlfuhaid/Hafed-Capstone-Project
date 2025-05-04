<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';
    protected $primaryKey = 'report_id';
    public $timestamps = false;

    protected $fillable = [
        'teacher_id', 'family_id', 'report_type', 'content', 'created_at', 'is_read'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function family()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }
}
