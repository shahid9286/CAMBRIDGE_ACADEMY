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
        Schema::create('course_block_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_block_id')->constrained('course_blocks')->onDelete('cascade');
            $table->string('title');         
            $table->integer('order_no')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_block_features');
    }
};
