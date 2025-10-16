<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoGlobal;

class SeoGlobalController extends Controller
{
  public function edit()
  {
    $seoGlobal = SeoGlobal::instance();
    return view('admin.seoglobal.edit', compact('seoGlobal'));
  }

  public function update(Request $request)
  {

    $seoGlobal = SeoGlobal::first();

    $request->validate([
      'site_name' => 'nullable|string|max:255',
      'default_meta_title' => 'nullable|string|max:255',
      'default_meta_description' => 'nullable|string',
      'default_meta_keywords' => 'nullable|string|max:255',
      'default_meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
      'global_canonical' => 'nullable|string|max:255',
      'robots_default' => 'nullable|string|max:255',
      'robots_txt' => 'nullable|string',
      'google_site_verification' => 'nullable|string|max:255',
      'bing_site_verification' => 'nullable|string|max:255',
      'sitemap_enabled' => 'nullable',
      'sitemap_urls' => 'nullable',
      'sitemap_urls.*' => 'nullable|url',
      'google_analytics_id' => 'nullable|string|max:255',
      'google_tag_manager_id' => 'nullable|string|max:255',
      'facebook_pixel_id' => 'nullable|string|max:255',
      'other_tracking_scripts' => 'nullable|string',
      'default_og_type' => 'nullable|string|max:255',
      'default_twitter_card' => 'nullable|string|max:255',
      'structured_data_global' => 'nullable|string',
      'global_header_scripts' => 'nullable|string',
      'global_body_end_scripts' => 'nullable|string',

    ]);




    if ($request->hasFile('default_meta_image')) {
      $file = $request->file('default_meta_image');
      $filename = time() . '_' . $file->getClientOriginalName();
      $file->move(public_path('assets/images/seo/'), $filename);
      $seoGlobal->default_meta_image = $filename;
    }


    $seoGlobal->site_name = $request->site_name;
    $seoGlobal->default_meta_title = $request->default_meta_title;
    $seoGlobal->default_meta_description = $request->default_meta_description;
    $seoGlobal->default_meta_keywords = $request->default_meta_keywords;
    $seoGlobal->global_canonical = $request->global_canonical;
    $seoGlobal->robots_default = $request->robots_default;
    $seoGlobal->robots_txt = $request->robots_txt;
    $seoGlobal->google_site_verification = $request->google_site_verification;
    $seoGlobal->bing_site_verification = $request->bing_site_verification;
    $seoGlobal->sitemap_enabled = $request->has('sitemap_enabled') ? true : false;
    $seoGlobal->sitemap_urls = $request->sitemap_urls? array_map('trim', explode(',', $request->sitemap_urls)): [];
    $seoGlobal->google_analytics_id = $request->google_analytics_id;
    $seoGlobal->google_tag_manager_id = $request->google_tag_manager_id;
    $seoGlobal->facebook_pixel_id = $request->facebook_pixel_id;
    $seoGlobal->other_tracking_scripts = $request->other_tracking_scripts;
    $seoGlobal->default_og_type = $request->default_og_type;
    $seoGlobal->default_twitter_card = $request->default_twitter_card;
    $seoGlobal->structured_data_global = $request->structured_data_global;
    $seoGlobal->global_header_scripts = $request->global_header_scripts;
    $seoGlobal->global_body_end_scripts = $request->global_body_end_scripts;


    $seoGlobal->save();


    $notification = [
      'alert' => 'success',
      'message' => 'SEO Global settings updated successfully!'
    ];

    return redirect()->route('admin.seoglobal.edit')->with('notification', $notification);

  }
}
