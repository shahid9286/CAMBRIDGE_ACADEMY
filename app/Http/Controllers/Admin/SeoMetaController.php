<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeoMetaController extends Controller
{
    public function index()
    {
        $seoMetas = SeoMeta::all();
        return view('admin.seo-meta.index', compact('seoMetas'));
    }

    public function add()
        {
        return view('admin.seo-meta.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_slug' => 'nullable|string|unique:seo_metas,page_slug',
            'page_id' => 'nullable|integer',
            'is_global' => 'required|in:global,local',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'canonical_url' => 'nullable|string',
            'robots_tag' => 'nullable|string',
            'meta_author' => 'nullable|string',
            'meta_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'meta_type' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'og_url' => 'nullable|string',
            'og_type' => 'nullable|string',
            'twitter_card' => 'nullable|string',
            'twitter_title' => 'nullable|string',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'schema_json' => 'nullable',
            'structured_data_type' => 'nullable|string',
            'header_top' => 'nullable',
            'header_bottom' => 'nullable',
            'body_start' => 'nullable',
            'body_end' => 'nullable',
            'custom_css' => 'nullable',
            'custom_js' => 'nullable',
            'priority' => 'nullable|integer'
        ]);

        $seoMeta = new SeoMeta();

        if ($request->page_slug) {
            $slug = Str::slug($request->page_slug);
            $count = SeoMeta::where('page_slug', $slug)->count();
            $seoMeta->page_slug = $count ? $slug . '-' . time() : $slug;
        }
        $seoMeta->page_id = $request->page_id;
        $seoMeta->is_global = $request->is_global;
        $seoMeta->meta_title = $request->meta_title;
        $seoMeta->meta_description = $request->meta_description;
        $seoMeta->meta_keywords = $request->meta_keywords;
        $seoMeta->canonical_url = $request->canonical_url;
        $seoMeta->robots_tag = $request->robots_tag;
        $seoMeta->meta_author = $request->meta_author;
        $seoMeta->meta_type = $request->meta_type;
        $seoMeta->og_title = $request->og_title;
        $seoMeta->og_description = $request->og_description;
        $seoMeta->og_image = $request->og_image;
        $seoMeta->og_url = $request->og_url;
        $seoMeta->og_type = $request->og_type;
        $seoMeta->twitter_card = $request->twitter_card;
        $seoMeta->twitter_title = $request->twitter_title;
        $seoMeta->twitter_description = $request->twitter_description;
        $seoMeta->twitter_image = $request->twitter_image;
        $seoMeta->schema_json = $request->schema_json;
        $seoMeta->structured_data_type = $request->structured_data_type;
        $seoMeta->header_top = $request->header_top;
        $seoMeta->header_bottom = $request->header_bottom;
        $seoMeta->body_start = $request->body_start;
        $seoMeta->body_end = $request->body_end;
        $seoMeta->custom_css = $request->custom_css;
        $seoMeta->custom_js = $request->custom_js;
        $seoMeta->priority = $request->priority ?? 0;

        if ($request->hasFile('meta_image')) {
            $file = $request->file('meta_image');
            $meta_image = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/seo_metas/', $meta_image);
            $seoMeta->meta_image = $meta_image;
        }

        if ($request->hasFile('og_image')) {
            $file = $request->file('og_image');
            $og_image = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/seo_metas/', $og_image);
            $seoMeta->og_image = $og_image;
        }

        if ($request->hasFile('twitter_image')) {
            $file = $request->file('twitter_image');
            $twitter_image = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/seo_metas/', $twitter_image);
            $seoMeta->twitter_image = $twitter_image;
        }

        $seoMeta->save();

        return redirect()->route('admin.seo.meta.index')
            ->with('notification', ['message' => 'SEO Meta Added Successfully!', 'alert' => 'success']);
    }
    public function edit($id)
    {
        $seoMeta = SeoMeta::findOrFail($id);
        return view('admin.seo-meta.edit', compact('seoMeta'));
    }

    public function update(Request $request, $id)
    {
        $seoMeta = SeoMeta::findOrFail($id);

        $request->validate([
            'page_slug' => 'nullable|string|unique:seo_metas,page_slug,' . $id,
            'page_id' => 'nullable|integer',
            'is_global' => 'required|in:global,local',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'canonical_url' => 'nullable|string',
            'robots_tag' => 'nullable|string',
            'meta_author' => 'nullable|string',
            'meta_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'meta_type' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'og_url' => 'nullable|string',
            'og_type' => 'nullable|string',
            'twitter_card' => 'nullable|string',
            'twitter_title' => 'nullable|string',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'schema_json' => 'nullable',
            'structured_data_type' => 'nullable|string',
            'header_top' => 'nullable',
            'header_bottom' => 'nullable',
            'body_start' => 'nullable',
            'body_end' => 'nullable',
            'custom_css' => 'nullable',
            'custom_js' => 'nullable',
            'priority' => 'nullable|integer'
        ]);


        if ($request->page_slug) {
            $slug = Str::slug($request->page_slug);
            $count = SeoMeta::where('page_slug', $slug)
                ->where('id', '!=', $id)
                ->count();
            $seoMeta->page_slug = $count ? $slug . '-' . time() : $slug;
        }

        $seoMeta->page_id = $request->page_id;
        $seoMeta->is_global = $request->is_global;
        $seoMeta->meta_title = $request->meta_title;
        $seoMeta->meta_description = $request->meta_description;
        $seoMeta->meta_keywords = $request->meta_keywords;
        $seoMeta->canonical_url = $request->canonical_url;
        $seoMeta->robots_tag = $request->robots_tag;
        $seoMeta->meta_author = $request->meta_author;
        $seoMeta->meta_type = $request->meta_type;
        $seoMeta->og_title = $request->og_title;
        $seoMeta->og_description = $request->og_description;
        $seoMeta->og_url = $request->og_url;
        $seoMeta->og_type = $request->og_type;
        $seoMeta->twitter_card = $request->twitter_card;
        $seoMeta->twitter_title = $request->twitter_title;
        $seoMeta->twitter_description = $request->twitter_description;
        $seoMeta->schema_json = $request->schema_json;
        $seoMeta->structured_data_type = $request->structured_data_type;
        $seoMeta->header_top = $request->header_top;
        $seoMeta->header_bottom = $request->header_bottom;
        $seoMeta->body_start = $request->body_start;
        $seoMeta->body_end = $request->body_end;
        $seoMeta->custom_css = $request->custom_css;
        $seoMeta->custom_js = $request->custom_js;
        $seoMeta->priority = $request->priority ?? 0;

        if ($request->hasFile('meta_image')) {
            if ($seoMeta->meta_image && file_exists('assets/admin/uploads/seo_metas/' . $seoMeta->meta_image)) {
                @unlink('assets/admin/uploads/seo_metas/' . $seoMeta->meta_image);
            }
            $file = $request->file('meta_image');
            $meta_image = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/seo_metas/', $meta_image);
            $seoMeta->meta_image = $meta_image;
        }

        if ($request->hasFile('og_image')) {
            if ($seoMeta->og_image && file_exists('assets/admin/uploads/seo_metas/' . $seoMeta->og_image)) {
                @unlink('assets/admin/uploads/seo_metas/' . $seoMeta->og_image);
            }
            $file = $request->file('og_image');
            $og_image = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/seo_metas/', $og_image);
            $seoMeta->og_image = $og_image;
        }

        if ($request->hasFile('twitter_image')) {
            if ($seoMeta->twitter_image && file_exists('assets/admin/uploads/seo_metas/' . $seoMeta->twitter_image)) {
                @unlink('assets/admin/uploads/seo_metas/' . $seoMeta->twitter_image);
            }
            $file = $request->file('twitter_image');
            $twitter_image = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/seo_metas/', $twitter_image);
            $seoMeta->twitter_image = $twitter_image;
        }

        $seoMeta->save();

        return redirect()->route('admin.seo.meta.index')
            ->with('notification', ['message' => 'SEO Meta Updated Successfully!', 'alert' => 'success']);
    }

    public function delete($id)
    {
        $seoMeta = SeoMeta::findOrFail($id);

        if ($seoMeta->meta_image && file_exists('assets/admin/uploads/seo_metas/' . $seoMeta->meta_image)) {
            @unlink('assets/admin/uploads/seo_metas/' . $seoMeta->meta_image);
        }
        if ($seoMeta->og_image && file_exists('assets/admin/uploads/seo_metas/' . $seoMeta->og_image)) {
            @unlink('assets/admin/uploads/seo_metas/' . $seoMeta->og_image);
        }
        if ($seoMeta->twitter_image && file_exists('assets/admin/uploads/seo_metas/' . $seoMeta->twitter_image)) {
            @unlink('assets/admin/uploads/seo_metas/' . $seoMeta->twitter_image);
        }

        $seoMeta->delete();

        return back()->with('notification', ['message' => 'SEO Meta Deleted Successfully!', 'alert' => 'success']);
    }
}
