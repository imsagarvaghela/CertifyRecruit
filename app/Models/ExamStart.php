<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamStart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'exam_id',
        'start_time',
        'end_time',
        'questions_ans',
        'status',
        'attempts',
    ];
}
