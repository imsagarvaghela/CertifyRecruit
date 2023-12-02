<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReffralBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'email_verification_token',
        'team_id',
        'address',
        'state',
        'city',
        'reffral_code'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function teams()
    {
        return $this->belongsTo(Teams::class, 'team_id', 'id');
    }

    public function reffral(){
        return $this->belongsTo(Employee::class, 'reffral_code', 'employee_id');
    }
}
