<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'page_id',
        'is_global',
        'priority',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'robots_tag',
        'meta_author',
        'meta_type',
        'meta_image',
        'og_title',
        'og_description',
        'og_image',
        'og_url',
        'og_type',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'structured_data_type',
        'schema_json',
        'header_top',
        'header_bottom',
        'body_start',
        'body_end',
        'custom_css',
        'custom_js',
    ];
        public function blog()
    {
        return $this->hasMany(Blog::class);
    }

            public function product()
    {
        return $this->hasMany(Service::class);
    }

}
