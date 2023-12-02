<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_name',
        'exam_instructions',
        'm_p_r_to_pass',
        'marks_per_question',
        'exam_duration',
        'exam_start_date',
        'exam_end_date',
        'max_tab_switch_allow',
        'negative_makrs_per_question',
    ];
}
