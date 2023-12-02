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
        Schema::table('exam_starts', function (Blueprint $table) {
            $table->text('questions_ans')->nullable(false)->change();
            $table->text('start_time')->nullable(false)->change();
            $table->text('end_time')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('question_starts', function (Blueprint $table) {
            //
        });
    }
};
