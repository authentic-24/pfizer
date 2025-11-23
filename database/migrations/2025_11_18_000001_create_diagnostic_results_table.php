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
        Schema::create('diagnostic_results', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->integer('excel_score')->default(0);
            $table->integer('powerbi_score')->default(0);
            $table->integer('powerautomate_score')->default(0);
            $table->integer('total_score')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnostic_results');
    }
};
