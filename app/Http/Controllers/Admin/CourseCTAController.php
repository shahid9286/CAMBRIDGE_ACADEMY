<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCTA;
use App\Models\CourseSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseCTAController extends Controller
{
    public function index($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $ctas = CourseCTA::where('course_id', $course->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.course.partials.call_to_actions_list', compact('slug', 'ctas'));
    }

    public function add($slug)
    {
        return view('admin.course.partials.call_to_action_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'button_text_1' => 'required|string|max:255',
            'button_link_1' => 'required|url|max:255',
            'button_text_2' => 'nullable|string|max:255',
            'button_link_2' => 'nullable|url|max:255',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        DB::beginTransaction();
        $course = Course::where('slug', $slug)->firstOrFail();

        $cta = new CourseCTA();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/course/cta/'), $imageName);
            $cta->image = 'assets/admin/uploads/course/cta/' . $imageName;
        }

        $cta->course_id = $course->id;
        $cta->title = $request->title;
        $cta->subtitle = $request->subtitle;
        $cta->description = $request->description;
        $cta->button_text_1 = $request->button_text_1;
        $cta->button_link_1 = $request->button_link_1;
        $cta->button_text_2 = $request->button_text_2;
        $cta->button_link_2 = $request->button_link_2;
        $cta->status = $request->status;
        $cta->save();

        $lastOrder = CourseSetting::where('course_id', $course->id)->max('order_no');
        $orderNo = $lastOrder ? $lastOrder + 1 : 1;

        CourseSetting::create([
            'course_id' => $course->id,
            'reference_id' => $cta->id,
            'reference_type' => CourseCTA::class,
            'order_no' => $orderNo,
        ]);

        DB::commit();

        return redirect()->route('admin.course.cta.index', $slug)
            ->with('notification', [
                'alert' => 'success',
                'message' => 'Course Call To Action added Successfully!',
            ]);
    }

    public function edit($id)
    {
        $cta = CourseCTA::findOrFail($id);
        $slug = $cta->course->slug;

        return view('admin.course.partials.call_to_action_edit', compact('cta', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'button_text_1' => 'required|string|max:255',
            'button_link_1' => 'required|url|max:255',
            'button_text_2' => 'nullable|string|max:255',
            'button_link_2' => 'nullable|url|max:255',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $cta = CourseCTA::findOrFail($id);

        if ($request->hasFile('image')) {
            @unlink(public_path($cta->image));
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/course/cta/'), $imageName);
            $cta->image = 'assets/admin/uploads/course/cta/' . $imageName;
        }

        $cta->title = $request->title;
        $cta->subtitle = $request->subtitle;
        $cta->description = $request->description;
        $cta->button_text_1 = $request->button_text_1;
        $cta->button_link_1 = $request->button_link_1;
        $cta->button_text_2 = $request->button_text_2;
        $cta->button_link_2 = $request->button_link_2;
        $cta->status = $request->status;
        $cta->save();

        return redirect()->route('admin.course.cta.index', $cta->course->slug)
            ->with('notification', [
                'alert' => 'success',
                'message' => 'Course Call To Action updated Successfully!',
            ]);
    }

    public function delete($id)
    {
        DB::beginTransaction();

        $cta = CourseCTA::findOrFail($id);
        @unlink(public_path($cta->image));
        $cta->delete();

        CourseSetting::where('reference_id', $cta->id)
            ->where('reference_type', CourseCTA::class)
            ->delete();

        $settings = CourseSetting::where('course_id', $cta->course_id)
            ->orderBy('order_no')
            ->get();

        $order = 1;
        foreach ($settings as $setting) {
            $setting->update(['order_no' => $order++]);
        }

        DB::commit();

        return redirect()->back()
            ->with('notification', value: [
                'alert' => 'success',
                'message' => 'Course Call To Action deleted Successfully!',
            ]);
    }
}
