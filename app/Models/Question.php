<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'question',
        'options_1',
        'options_2',
        'options_3',
        'options_4',
        'answer',
        'status',
        'marks',
        'attempt',
        'recruiter_type',
    ];
}
