<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';
    protected $primaryKey = 'payment_id';
    public $timestamps = false;

    protected $fillable = ['subscription_id', 'amount', 'payment_method', 'payment_date', 'payment_status'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }
}
