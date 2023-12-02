<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exam::create([
            'exam_name' => 'Certify Recruit Certification Exam',
            'exam_instructions' => 'Sample Instruction for Exam',
            'm_p_r_to_pass' => 23,
            'marks_per_question' => 1,
            'exam_duration' => 15,
            'exam_start_date' => now(),
            'exam_end_date' => now()->addMinutes(15),
            'max_tab_switch_allow' => 3,
            'negative_makrs_per_question' => 0,
        ]);
    }
}
