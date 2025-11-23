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
        Schema::create('diagnostic_questions', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // excel, powerbi, powerautomate
            $table->text('question');
            $table->text('option_a');
            $table->text('option_b');
            $table->text('option_c');
            $table->text('option_d');
            $table->string('correct_answer'); // a, b, c, d
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnostic_questions');
    }
};
