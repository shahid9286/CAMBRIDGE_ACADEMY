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
        Schema::create('seo_metas', function (Blueprint $table) {
            $table->id();

            // Page Identification
            $table->string('page_slug')->nullable()->unique(); // e.g. 'home', 'about', 'service-1', 'blog/5'
            $table->unsignedBigInteger('page_id')->nullable(); // relation to another table (e.g., blog, product, service)
            $table->enum('is_global',['global','local'])->default('global');

            // General Meta
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots_tag')->nullable();
            $table->string('meta_author')->nullable();
            $table->string('meta_image')->nullable();
            $table->string(column: 'meta_type')->nullable(); // e.g. Article, Product, Event, Website

            // Open Graph (Social Sharing)
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_url')->nullable();
            $table->string('og_type')->nullable();

            // Twitter Cards
            $table->string('twitter_card')->nullable(); // e.g., summary, summary_large_image
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();

            // Schema / JSON-LD
            $table->longText('schema_json')->nullable();
            $table->string('structured_data_type')->nullable(); // e.g., Product, Article, FAQPage, Event

            // Custom Code Injections
            $table->longText('header_top')->nullable();    // before </head>
            $table->longText('header_bottom')->nullable(); // end of <head>
            $table->longText('body_start')->nullable();    // after <body>
            $table->longText('body_end')->nullable();      // before </body>

            // Optional Extras
            $table->longText('custom_css')->nullable();
            $table->longText('custom_js')->nullable();

            // Sitemap / Priority
            $table->integer('priority')->default(0); // useful for sitemap ordering


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_metas');
    }
};
