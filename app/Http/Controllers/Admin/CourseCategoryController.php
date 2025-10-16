<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $categories = CourseCategory::all();
        return view('admin.course.course-category.index', compact('categories'));
    }

    public function add()
    {
        return view('admin.course.course-category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'thumbnail'         => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description'       => 'required|string',
            'icon'              => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'order_no'          => 'required|integer|min:0',
            'status'            => 'required|in:publish,draft',
            'isfeature'         => 'required|in:featured,unfeatured',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'font_awesome_icon' => 'nullable|string|max:255',
        ]);

        $category = new CourseCategory();
        $category->title = $request->title;

        $slug = Str::slug($request->title);
        $count = CourseCategory::where('slug', $slug)->count();
        $category->slug = $count ? $slug . '-' . time() : $slug;

        $category->description       = $request->description;
        $category->order_no          = $request->order_no ?? 0;
        $category->status            = $request->status;
        $category->isfeature         = $request->isfeature;
        $category->meta_title        = $request->meta_title;
        $category->meta_description  = $request->meta_description;
        $category->font_awesome_icon = $request->font_awesome_icon;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $icon = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/course_category/', $icon);
            $category->icon = $icon;
        }

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $thumbnail = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/course_category/', $thumbnail);
            $category->thumbnail = $thumbnail;
        }

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $image = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/course_category/', $image);
            $category->banner_image = $image;
        }

        $category->save();

        return redirect()->route('admin.course.category.index')
            ->with('notification', ['message' => 'Course Category Added Successfully!', 'alert' => 'success']);
    }

    public function edit($id)
    {
        $category = CourseCategory::findOrFail($id);
        return view('admin.course.course-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = CourseCategory::findOrFail($id);

        $request->validate([
            'title'             => 'required|string|max:255',
            'thumbnail'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description'       => 'required|string',
            'icon'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'order_no'          => 'required|integer|min:0',
            'status'            => 'required|in:publish,draft',
            'isfeature'         => 'required|in:featured,unfeatured',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'font_awesome_icon' => 'nullable|string|max:255',
        ]);

        $category->title = $request->title;

        $slug = Str::slug($request->title);
        $count = CourseCategory::where('slug', $slug)
            ->where('id', '!=', $id)
            ->count();
        $category->slug = $count ? $slug . '-' . time() : $slug;

        $category->description       = $request->description;
        $category->order_no          = $request->order_no ?? 0;
        $category->status            = $request->status;
        $category->isfeature         = $request->isfeature;
        $category->meta_title        = $request->meta_title;
        $category->meta_description  = $request->meta_description;
        $category->font_awesome_icon = $request->font_awesome_icon;

        if ($request->hasFile('icon')) {
            if ($category->icon && file_exists('assets/admin/uploads/course_category/' . $category->icon)) {
                @unlink('assets/admin/uploads/course_category/' . $category->icon);
            }
            $file = $request->file('icon');
            $icon = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/course_category/', $icon);
            $category->icon = $icon;
        }

        if ($request->hasFile('thumbnail')) {
            if ($category->thumbnail && file_exists('assets/admin/uploads/course_category/' . $category->thumbnail)) {
                @unlink('assets/admin/uploads/course_category/' . $category->thumbnail);
            }
            $file = $request->file('thumbnail');
            $thumbnail = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/course_category/', $thumbnail);
            $category->thumbnail = $thumbnail;
        }

        if ($request->hasFile('banner_image')) {
            if ($category->banner_image && file_exists('assets/admin/uploads/course_category/' . $category->banner_image)) {
                @unlink('assets/admin/uploads/course_category/' . $category->banner_image);
            }
            $file = $request->file('banner_image');
            $image = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/course_category/', $image);
            $category->banner_image = $image;
        }

        $category->save();

        return redirect()->route('admin.course.category.index')
            ->with('notification', ['message' => 'Course Category Updated Successfully!', 'alert' => 'success']);
    }

    public function delete($id)
    {
        $category = CourseCategory::findOrFail($id);

        if ($category->courses->count() === 0) {
            if ($category->icon && file_exists('assets/admin/uploads/course_category/' . $category->icon)) {
                @unlink('assets/admin/uploads/course_category/' . $category->icon);
            }
            if ($category->thumbnail && file_exists('assets/admin/uploads/course_category/' . $category->thumbnail)) {
                @unlink('assets/admin/uploads/course_category/' . $category->thumbnail);
            }
            if ($category->banner_image && file_exists('assets/admin/uploads/course_category/' . $category->banner_image)) {
                @unlink('assets/admin/uploads/course_category/' . $category->banner_image);
            }

            $category->delete();

            $notification = [
                'message' => 'Course Category Deleted Successfully!',
                'alert'   => 'success',
            ];
        } else {
            $notification = [
                'message' => 'First Delete Courses of this Category!',
                'alert'   => 'warning',
            ];
        }

        return back()->with('notification', $notification);
    }
}
