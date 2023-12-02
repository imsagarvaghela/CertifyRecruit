<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Employee extends Model implements Authenticatable
{
    use AuthenticatableTrait, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'employee_id',
        'mobile_number',
        'email_verification_token',
        'team_id',
        'resume',
        'dob',
        'aadhar_no',
        'qualification_id',
        'address',
        'profile_path',
        'roles',
        'rules',
        'rewards',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function team()
    {
        return $this->belongsTo(Teams::class, 'team_id', 'id');
    }
    public function qualification()
    {
        return $this->belongsTo(qualification::class, 'qualification_id', 'id');
    }
    
}
