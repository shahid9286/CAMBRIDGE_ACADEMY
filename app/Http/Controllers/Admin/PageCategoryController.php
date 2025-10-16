<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PageCategory;

class PageCategoryController extends Controller
{
    public function pagelist()
    {
        $page_categories = PageCategory::select('id', 'slug', 'title')->get();
        return view('admin.page-category.index', compact('page_categories'));
    }


    // Page Crud Functions:-
    public function add()
    {
        return view('admin.page-category.add');
    }

    public function store(Request $request)
    {
        
        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $request->merge(['slug' => $slug]);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_title' => 'nullable|string|max:255',
            'hero_sub_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'order_no' => 'integer',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'slug' => 'required|unique:page_categories,slug|max:255', 
            'status' => 'required|in:draft,published',
            'hero_image' => 'required|image|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',

        ]);

        $page_category = new PageCategory();

        if ($request->hasFile('hero_image')) {
            $file = $request->file('hero_image');
            $image = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img/page_category/hero_image'), $image);
            $page_category->hero_image = 'assets/admin/img/page_category/hero_image/' . $image;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img/page_category/image'), $imageName);
            $page_category->image = 'assets/admin/img/page_category/image/' . $imageName;
        }

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img/page_category/icon'), $iconName);
            $page_category->icon = 'assets/admin/img/page_category/icon/' . $iconName;
        }

        $page_category->slug = $request->slug;
        $page_category->status = $request->status;
        $page_category->order_no = $request->order_no ?? 0;
        $page_category->meta_title = $request->meta_title;
        $page_category->meta_description = $request->meta_description;
        $page_category->meta_keywords = $request->meta_keywords;

        $page_category->title = $request->title;
        $page_category->description = $request->description;
        $page_category->hero_title = $request->hero_title;
        $page_category->hero_sub_title = $request->hero_sub_title;
        $page_category->hero_description = $request->hero_description;
        $page_category->title = $request->title;
        $page_category->save();

        $notification = array(
            'message' => 'Page Category Added Successfully!',
            'alert' => 'success',
        );

        return redirect()->route('admin.page_category.edit', ['id' => $page_category->id])
            ->with('notification', $notification);
    }

    // Page Delete
    public function delete($id)
    {
        $page_category = PageCategory::findOrFail($id);
        @unlink(public_path($page_category->hero_image));
        @unlink(public_path($page_category->image));
        @unlink(public_path($page_category->icon));

        $page_category->delete();
        $notification = array(
            'message' => 'Page Deleted Successfully!',
            'alert' => 'success',
        );
        return redirect()->route('admin.page_category.index')->with('notification', $notification);
    }

    // Page Edit
    public function edit($id)
    {
        $page_category = PageCategory::findOrFail($id);
        return view('admin.page-category.edit', compact('page_category'));
    }

    public function update(Request $request, $id)
    {
        
        $page_category = PageCategory::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_title' => 'nullable|string|max:255',
            'hero_sub_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'order_no' => 'integer',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'slug' => 'required|max:255|unique:page_categories,slug,' . $page_category->id,
            'status' => 'required|in:draft,published',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',

        ]);

        $data = $request->except('hero_image');

        if ($request->hasFile('hero_image')) {
            @unlink(public_path($page_category->hero_image));
            $file = $request->file('hero_image');
            $filename = time() . '' . Str::slug($file->getClientOriginalName(), '') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img/page_category/hero_image'), $filename);
            $data['hero_image'] = 'assets/admin/img/page_category/hero_image/' . $filename;
        }

        if ($request->hasFile('image')) {
            @unlink(public_path($page_category->image));
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img/page_category/image'), $imageName);
            $data['image'] = 'assets/admin/img/page_category/image/' . $imageName;
        }

        if ($request->hasFile('icon')) {
            @unlink(public_path($page_category->icon));
            $file = $request->file('icon');
            $iconName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img/page_category/icon'), $iconName);
            $page_category->icon = 'assets/admin/img/page_category/icon/' . $iconName;
        }

        // dd($data['icon']);

        $page_category->update($data);
        $notification = array(
            'message' => 'Page Category Upldated Successfully!',
            'alert' => 'success',
        );
        return back()->with('notification', $notification);
    }
}
