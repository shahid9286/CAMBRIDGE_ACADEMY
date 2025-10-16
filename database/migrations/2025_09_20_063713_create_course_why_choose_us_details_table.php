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
        Schema::create('course_why_choose_us_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_why_choose_us_id')->constrained('course_why_choose_us')->onDelete('cascade');
            $table->string('icon');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_why_choose_us_details');
    }
};
