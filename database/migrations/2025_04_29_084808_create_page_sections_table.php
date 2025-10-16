<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('id')->on('pages');
            $table->string('title');
            $table->string('subtitle');
            $table->string('description');
            $table->string('image');
            $table->enum('type', ['R-2-L', 'L-2-R']);
            $table->string('order_no');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
