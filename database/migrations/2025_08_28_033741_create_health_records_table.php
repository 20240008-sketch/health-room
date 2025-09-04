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
        Schema::create('health_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->decimal('height', 4, 1);
            $table->decimal('weight', 4, 1);
            $table->decimal('vision_left', 3, 2)->nullable();
            $table->decimal('vision_right', 3, 2)->nullable();
            $table->decimal('vision_left_corrected', 3, 2)->nullable();
            $table->decimal('vision_right_corrected', 3, 2)->nullable();
            $table->boolean('hearing_test');
            $table->boolean('dental_exam');
            $table->date('recorded_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_records');
    }
};
