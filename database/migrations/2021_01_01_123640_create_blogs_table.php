<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('bcategory_id')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('serial_number')->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}