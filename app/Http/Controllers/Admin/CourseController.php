<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->get();
        return view('admin.course.index', compact('courses'));
    }

    public function add()
    {
        $categories = CourseCategory::all();

        return view('admin.course.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_category_id' => 'required|exists:course_categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'icon_font' => 'nullable|string|max:255',
            'status' => 'required|in:0,1',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'serial_number' => 'nullable|integer',
        ]);

        $course = new Course;
        $course->course_category_id = $request->course_category_id;
        $course->title = $request->title;

        $slug = Str::slug($request->title);
        $count = Course::where('slug', $slug)->count();
        $course->slug = $count ? $slug.'-'.time() : $slug;

        $course->content = $request->content;
        $course->status = $request->status;
        $course->meta_keywords = $request->meta_keywords;
        $course->meta_description = $request->meta_description;
        $course->serial_number = $request->serial_number ?? 0;
        $course->icon_font = $request->icon_font;

        // handle uploads
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $icon = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/courses/', $icon);
            $course->icon = $icon;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/courses/', $image);
            $course->image = $image;
        }

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $banner = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/courses/', $banner);
            $course->banner_image = $banner;
        }

        $course->save();

        return redirect()->route('admin.course.index')
            ->with('notification', ['message' => 'Course Added Successfully!', 'alert' => 'success']);
    }

    public function edit($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $categories = CourseCategory::all();

        return view('admin.course.edit', compact('course', 'categories', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'course_category_id' => 'nullable|exists:course_categories,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'icon_font' => 'nullable|string|max:255',
            'status' => 'required|in:0,1',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'serial_number' => 'nullable|integer',
        ]);

        $course->course_category_id = $request->course_category_id;
        $course->title = $request->title;

        // unique slug (ignore current record)
        $slug = Str::slug($request->title);
        $count = Course::where('slug', $slug)
            ->where('id', '!=', $id)
            ->count();
        $course->slug = $count ? $slug.'-'.time() : $slug;
        $course->content = $request->content;
        $course->status = $request->status;
        $course->meta_keywords = $request->meta_keywords;
        $course->meta_description = $request->meta_description;
        $course->serial_number = $request->serial_number ?? 0;
        $course->icon_font = $request->icon_font;

        // handle uploads
        if ($request->hasFile('icon')) {
            if ($course->icon && file_exists('assets/admin/uploads/courses/'.$course->icon)) {
                @unlink('assets/admin/uploads/courses/'.$course->icon);
            }
            $file = $request->file('icon');
            $icon = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/courses/', $icon);
            $course->icon = $icon;
        }

        if ($request->hasFile('image')) {
            if ($course->image && file_exists('assets/admin/uploads/courses/'.$course->image)) {
                @unlink('assets/admin/uploads/courses/'.$course->image);
            }
            $file = $request->file('image');
            $image = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/courses/', $image);
            $course->image = $image;
        }

        if ($request->hasFile('banner_image')) {
            if ($course->banner_image && file_exists('assets/admin/uploads/courses/'.$course->banner_image)) {
                @unlink('assets/admin/uploads/courses/'.$course->banner_image);
            }
            $file = $request->file('banner_image');
            $banner = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/courses/', $banner);
            $course->banner_image = $banner;
        }

        $course->save();

        return redirect()->back()->with('notification', ['message' => 'Course Updated Successfully!', 'alert' => 'success']);
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);

        if ($course->icon && file_exists('assets/admin/uploads/courses/'.$course->icon)) {
            @unlink('assets/admin/uploads/courses/'.$course->icon);
        }
        if ($course->image && file_exists('assets/admin/uploads/courses/'.$course->image)) {
            @unlink('assets/admin/uploads/courses/'.$course->image);
        }
        if ($course->banner_image && file_exists('assets/admin/uploads/courses/'.$course->banner_image)) {
            @unlink('assets/admin/uploads/courses/'.$course->banner_image);
        }

        $course->settings()->delete();
        $course->courseBlocks()->delete();
        $course->courseElements()->delete();
        $course->courseFeatures()->delete();
        $course->courseOutlines()->delete();
        $course->courseWhyChooseUs()->delete();
        $course->courseSections()->delete();
        $course->courseCTAs()->delete();

        $course->delete();

        return back()->with('notification', [
            'message' => 'Course Deleted Successfully!',
            'alert' => 'success',
        ]);
    }

    public function setting($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $course_sections = CourseSetting::where('course_id', $course->id)
            ->with('reference')
            ->orderBy('order_no', 'ASC')
            ->get();

        return view('admin.course.partials.setting', compact('course_sections', 'slug'));
    }

    public function updateSetting(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $order = $request->input('order', []);

        foreach ($order as $index => $id) {
            CourseSetting::where('id', $id)
                ->where('course_id', $course->id)
                ->update(['order_no' => $index + 1]);
        }

        return back()->with('notification', [
            'message' => 'Settings updated Successfully!',
            'alert' => 'success',
        ]);
    }
}
