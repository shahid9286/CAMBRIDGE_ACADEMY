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
        Schema::create('service_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->string('image_gallery');
            $table->string('thumbnail');
             $table->text('description'); 
            $table->enum('isfeature', ['featured', 'unfeatured'])->default('featured');
            $table->string('show_on_home');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_projects');
    }
};
