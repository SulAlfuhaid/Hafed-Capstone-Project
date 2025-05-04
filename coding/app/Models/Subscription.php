<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscription';
    protected $primaryKey = 'subscription_id';
    public $timestamps = false;

    protected $fillable = ['teacher_id', 'type', 'status', 'amount', 'start_date', 'end_date', 'last_renewal'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
