<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Page,PageCategory};

class PageController extends Controller
{
    public function pagelist()
    {
        $pages = Page::select('id', 'slug', 'title', 'type')->get();
        return view('admin.page.list', compact('pages'));
    }



    public function detail($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('admin.page.detail', compact('page', 'slug'));
    }

    // Page Crud Functions:-
public function add()
{
    $pageCategories = PageCategory::all();
    return view('admin.pages.add', compact('pageCategories'));
}

    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->input('slug'))
        ]);
        $request->validate([
            'page_category_id' => 'required|exists:page_categories,id',

            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_title' => 'nullable|string|max:255',
            'hero_sub_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'route_name' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'order_no' => 'integer',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable',
            'slug' => 'required|unique:pages,slug|max:255',
            'status' => 'required|in:draft,published',
            'type' => 'required|in:website,marketing,seo,whatsapp-Marketing',
            'page_link_for' => 'required|in:header,footer,services,none',
            'hero_image' => 'required|image|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',

        ]);

        $page = new Page();
        if ($request->hasFile('hero_image')) {
            $file = $request->file('hero_image');
            $image = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img/page/hero_image'), $image);
            $page->hero_image = 'assets/admin/img/page/hero_image/' . $image;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img/page/image'), $imageName);
            $page->image = 'assets/admin/img/page/image/' . $imageName;
        }

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img/page/icon'), $iconName);
            $page->icon = 'assets/admin/img/page/icon/' . $iconName;
        }
        $page->page_category_id = $request->page_category_id;

        $page->slug = $request->slug;
        $page->status = $request->status;
        $page->type = $request->type;
        $page->route_name = $request->route_name;
        $page->page_link_for = $request->page_link_for ?? 'none';
        $page->order_no = $request->order_no ?? 0;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;

        $page->title = $request->title;
        $page->description = $request->description;
        $page->hero_title = $request->hero_title;
        $page->hero_sub_title = $request->hero_sub_title;
        $page->hero_description = $request->hero_description;
        $page->title = $request->title;
        $page->save();

        $notification = array(
            'message' => 'Page Added Successfully!',
            'alert' => 'success',
        );

        return redirect()->route('admin.page.detail', ['slug' => $page->slug])->with('notification', $notification);
    }

    // Page Delete
    public function delete($id)
    {
        $page = Page::findOrFail($id);
        @unlink(public_path($page->hero_image));
        @unlink(public_path($page->image));
        @unlink(public_path($page->icon));

        $page->delete();
        $notification = array(
            'message' => 'Page Deleted Successfully!',
            'alert' => 'success',
        );
        return redirect()->route('admin.page.index')->with('notification', $notification);
    }

    // Page Edit
    public function edit($id)
    {
    $page = Page::findOrFail($id);
    $pageCategories = PageCategory::all(); 
    return view('admin.pages.edit', compact('page', 'pageCategories'));
    }

public function update(Request $request, $id)
{
    $page = Page::findOrFail($id);

    $request->merge([
        'slug' => Str::slug($request->input('slug'))
    ]);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'hero_title' => 'nullable|string|max:255',
        'hero_sub_title' => 'nullable|string|max:255',
        'hero_description' => 'nullable|string',
        'route_name' => 'nullable|string|max:255',
        'meta_title' => 'nullable|string|max:255',
        'order_no' => 'integer',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable',
        'slug' => 'required|max:255|unique:pages,slug,' . $page->id,
        'status' => 'required|in:draft,published',
        'type' => 'required|in:website,marketing,seo,whatsapp-Marketing',
        'page_link_for' => 'required|in:header,footer,services,none',
        'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
    ]);

    $data = $request->except(['hero_image', 'image', 'icon']);

    if ($request->hasFile('hero_image')) {
        @unlink(public_path($page->hero_image));
        $file = $request->file('hero_image');
        $filename = time() . rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/admin/img/page/hero_image'), $filename);
        $data['hero_image'] = 'assets/admin/img/page/hero_image/' . $filename;
    }

    if ($request->hasFile('image')) {
        @unlink(public_path($page->image));
        $file = $request->file('image');
        $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/admin/img/page/image'), $imageName);
        $data['image'] = 'assets/admin/img/page/image/' . $imageName;
    }

    if ($request->hasFile('icon')) {
        @unlink(public_path($page->icon));
        $file = $request->file('icon');
        $iconName = time() . rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/admin/img/page/icon'), $iconName);
        $data['icon'] = 'assets/admin/img/page/icon/' . $iconName;
    }

    $page->meta_keywords = $request->meta_keywords;
    $page->update($data);

    $notification = [
        'message' => 'Page Updated Successfully!',
        'alert'   => 'success',
    ];

    return back()->with('notification', $notification);
}
}
