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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            // Foreign Keys
            $table->foreignId('company_jobs_id')->constrained('company_jobs')->onDelete('cascade');
            $table->foreignId('industry_jobs_id')->constrained('industry_jobs')->onDelete('cascade');
            $table->foreignId('job_types_id')->constrained('job_types')->onDelete('cascade');
            $table->foreignId('job_cities_id')->constrained('job_cities')->onDelete('cascade');
            $table->foreignId('job_countries_id')->constrained('job_countries')->onDelete('cascade');
            $table->foreignId('job_experiences_id')->constrained('job_experiences')->onDelete('cascade');

            // Job Info
            $table->string('title');
            $table->string('thumbnail')->nullable();
            $table->enum('gender', ['male', 'female', 'both'])->default('both');
            $table->integer('min_age')->nullable();
            $table->integer('max_age')->nullable();

            $table->text('description');
            $table->integer('job_vacancy')->default(1);
            $table->boolean('is_active')->default(true);


            // Salary
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();

            // Contact Info
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('whatsapp_no')->nullable();
            $table->string('website')->nullable();
            $table->string('location')->nullable();


            
       

            // Dates
             // Expiry date
            $table->date('post_date');
            $table->date('deadline');
            
          $table->longText('job_details');
         $table->softDeletes();

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
