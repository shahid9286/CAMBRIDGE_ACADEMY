<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoGlobal extends Model
{

    protected $table = 'seo_globals';

    protected $fillable = [
        'site_name',
        'default_meta_title',
        'default_meta_description',
        'default_meta_keywords',
        'default_meta_image',
        'global_canonical',
        'robots_default',
        'robots_txt',
        'google_site_verification',
        'bing_site_verification',
        'sitemap_enabled',
        'sitemap_urls',
        'google_analytics_id',
        'google_tag_manager_id',
        'facebook_pixel_id',
        'other_tracking_scripts',
        'default_og_type',
        'default_twitter_card',
        'structured_data_global',
        'global_header_scripts',
        'global_body_end_scripts'
    ];

    public static function instance()
    {
        return self::firstOrCreate(['id' => 1]);
    }


}
