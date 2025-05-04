<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $table = 'family';
    protected $primaryKey = 'family_id';
    public $timestamps = false;

    protected $fillable = ['user_id', 'name', 'phone_number', 'created_at', 'email', 'password'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'family_id');
    }
    public function reports()
    {
        return $this->hasMany(Report::class, 'family_id');
    }
}
