<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name');
            $table->text('exam_instructions');
            $table->integer('m_p_r_to_pass');
            $table->integer('marks_per_question');
            $table->integer('exam_duration'); // In minutes
            $table->dateTime('exam_start_date');
            $table->dateTime('exam_end_date');
            $table->integer('max_tab_switch_allow');
            $table->integer('negative_makrs_per_question');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
