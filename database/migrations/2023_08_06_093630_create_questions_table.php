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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('type')->comment('1 = Multiple Choice Single Answer');
            $table->text('question');
            $table->string('options_1');
            $table->string('options_2');
            $table->string('options_3');
            $table->string('options_4');
            $table->string('answer');
            $table->unsignedTinyInteger('status')->default(1)->comment('1 = active');
            $table->unsignedSmallInteger('marks')->default(0);
            $table->integer('attempt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
