<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Result extends Authenticatable
{
    protected $fillable = [
				'exam_id',
				'user_id',
				'total_ans',
				'total_marks',
				'total',
				'negative',
				'status',
				'result_status',
				'm_p_r_to_pass',
			];

}
