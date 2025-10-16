<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseSectionController extends Controller
{
    public function index($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $sections = CourseSection::where('course_id', $course->id)->get();

        return view('admin.course.partials.course_section_list', compact('sections', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.course.partials.course_section_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'required|string|max:255',
            'type'        => 'required|in:L-2-R,R-2-L',
            'description' => 'required|string',
            'image'       => 'required|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        DB::beginTransaction();

        $course = Course::where('slug', $slug)->firstOrFail();
        $section = new CourseSection();
        $section->course_id   = $course->id;
        $section->title       = $request->title;
        $section->subtitle    = $request->subtitle;
        $section->description = $request->description;
        $section->type        = $request->type;

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/CourseSection/thumb/'), $imageName);
            $section->image = 'assets/admin/uploads/CourseSection/thumb/' . $imageName;
        }

        $section->save();

        $lastOrder = CourseSetting::where('course_id', $course->id)->max('order_no');
        $orderNo   = $lastOrder ? $lastOrder + 1 : 1;

        CourseSetting::create([
            'course_id'      => $course->id,
            'reference_id'   => $section->id,
            'reference_type' => CourseSection::class,
            'order_no'       => $orderNo,
        ]);

        DB::commit();

        return redirect()->route('admin.course.section.index', $slug)
            ->with('notification', [
                'message' => 'Course Section Added Successfully!',
                'alert'   => 'success',
            ]);
    }

    public function edit($id)
    {
        $section = CourseSection::findOrFail($id);
        $slug    = $section->course->slug;

        return view('admin.course.partials.course_section_edit', compact('section', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'required|string|max:255',
            'image'       => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'type'        => 'required|in:L-2-R,R-2-L',
            'description' => 'required|string',
        ]);

        DB::beginTransaction();

        $section = CourseSection::findOrFail($id);
        $section->title       = $request->title;
        $section->subtitle    = $request->subtitle;
        $section->description = $request->description;
        $section->type        = $request->type;

        // Handle new image upload
        if ($request->hasFile('image')) {
            if ($section->image && file_exists(public_path($section->image))) {
                unlink(public_path($section->image));
            }

            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/CourseSection/thumb/'), $imageName);
            $section->image = 'assets/admin/uploads/CourseSection/thumb/' . $imageName;
        }

        $section->save();

        DB::commit();

        return redirect()->route('admin.course.section.index', $section->course->slug)
            ->with('notification', [
                'message' => 'Course Section Updated Successfully!',
                'alert'   => 'success',
            ]);
    }

    public function delete($id)
    {
        DB::beginTransaction();

        $section = CourseSection::findOrFail($id);

        if ($section->image && file_exists(public_path($section->image))) {
            unlink(public_path($section->image));
        }

        $section->delete();

        CourseSetting::where('reference_id', $section->id)
            ->where('reference_type', CourseSection::class)
            ->delete();

        $settings = CourseSetting::where('course_id', $section->course_id)
            ->orderBy('order_no')
            ->get();

        $order = 1;
        foreach ($settings as $setting) {
            $setting->update(['order_no' => $order++]);
        }

        DB::commit();

        return back()->with('notification', [
            'message' => 'Course Section Deleted Successfully!',
            'alert'   => 'success',
        ]);
    }
}
