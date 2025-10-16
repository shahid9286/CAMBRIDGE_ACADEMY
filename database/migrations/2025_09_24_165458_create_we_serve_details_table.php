<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('we_serve_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('we_serve_id')->constrained('we_serves')->onDelete('cascade');
            $table->string('name');
            $table->string('logo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('we_serve_details');
    }
};
