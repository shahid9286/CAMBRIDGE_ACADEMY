<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\CourseSetting;
use App\Models\CourseWhyChooseUs;
use App\Models\CourseWhyChooseUsDetail;

class CourseWhyChooseUsController extends Controller
{
    public function index($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $sections = CourseWhyChooseUs::where('course_id', $course->id)->get();

        return view('admin.course.partials.why_choose_us_list', compact('sections',  'slug'));
    }

    public function add($slug)
    {
        return view('admin.course.partials.why_choose_us_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'details.*.icon'        => 'nullable|string|max:255',
            'details.*.title'       => 'nullable|string|max:255',
            'details.*.description' => 'nullable|string',
        ]);

        DB::beginTransaction();

        $course = Course::where('slug', $slug)->firstOrFail();

        $section = new CourseWhyChooseUs();
        $section->course_id   = $course->id;
        $section->title       = $request->input('title');
        $section->subtitle    = $request->input('subtitle');
        $section->description = $request->input('description');

        if ($request->hasFile('image')) {
            $section->image = $this->uploadFile($request->file('image'), 'course_why_choose_us');
        }

        $section->save();

        if ($request->has('features')) {
            foreach ($request->features as $feature) {
                $sectionFeature = new CourseWhyChooseUsDetail();
                $sectionFeature->course_why_choose_us_id = $section->id;
                $sectionFeature->title = $feature['title'] ?? '';
                $sectionFeature->description = $feature['description'] ?? '';

                if (isset($feature['icon']) && $feature['icon'] instanceof \Illuminate\Http\UploadedFile) {
                    $sectionFeature->icon = $this->uploadFile($feature['icon'], 'why_choose_us_details');
                }

                $sectionFeature->save();
            }
        }

        $lastOrder = CourseSetting::where('course_id', $course->id)->max('order_no');
        $orderNo   = $lastOrder ? $lastOrder + 1 : 1;

        CourseSetting::create([
            'course_id'      => $course->id,
            'reference_id'   => $section->id,
            'reference_type' => CourseWhyChooseUs::class,
            'order_no'       => $orderNo,
        ]);

        DB::commit();

        return redirect()->route('admin.course.why-choose-us.index', $slug)->with('notification', [
            'message' => 'Course WhyChooseUs Added Successfully!',
            'alert'   => 'success',
        ]);
    }

    public function edit($id)
    {
        $section = CourseWhyChooseUs::with('details')->findOrFail($id);
        $slug  = $section->course->slug;
        return view('admin.course.partials.why_choose_us_edit', compact('section', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'details.*.icon'        => 'nullable|string|max:255',
            'details.*.title'       => 'required|string|max:255',
            'details.*.description' => 'required|string',
        ]);

        DB::beginTransaction();

        $section = CourseWhyChooseUs::findOrFail($id);
        $section->title       = $request->input('title');
        $section->subtitle    = $request->input('subtitle');
        $section->description = $request->input('description');

        if ($request->hasFile('image')) {
            $this->deleteFileIfExists($section->image);
            $section->image = $this->uploadFile($request->file('image'), 'course_why_choose_us');
        }

        $section->save();

    $existingIds = $section->details()->pluck('id')->toArray();
    $updatedIds = [];

    if ($request->has('features')) {
        foreach ($request->features as $feature) {
            // --- Update Existing ---
            if (!empty($feature['id'])) {
                $sectionFeature = CourseWhyChooseUsDetail::find($feature['id']);

                if ($sectionFeature) {
                    $sectionFeature->title = $feature['title'];
                    $sectionFeature->description = $feature['description'];

                    // If new icon uploaded → delete old + upload new
                    if (isset($feature['icon']) && $feature['icon'] instanceof \Illuminate\Http\UploadedFile) {
                        $this->deleteFileIfExists($sectionFeature->icon);
                        $sectionFeature->icon = $this->uploadFile($feature['icon'], 'why_choose_us_details');
                    }

                    $sectionFeature->save();
                    $updatedIds[] = $sectionFeature->id;
                }

            // --- Create New ---
            } else {
                $newFeature = new CourseWhyChooseUsDetail();
                $newFeature->course_why_choose_us_id = $section->id;
                $newFeature->title = $feature['title'];
                $newFeature->description = $feature['description'];

                if (isset($feature['icon']) && $feature['icon'] instanceof \Illuminate\Http\UploadedFile) {
                    $newFeature->icon = $this->uploadFile($feature['icon'], 'why_choose_us_details');
                }

                $newFeature->save();
                $updatedIds[] = $newFeature->id;
            }
        }
    }

    // 🗑️ Delete only removed features
    $deletedIds = array_diff($existingIds, $updatedIds);

    if (!empty($deletedIds)) {
        $toDelete = CourseWhyChooseUsDetail::whereIn('id', $deletedIds)->get();

        foreach ($toDelete as $del) {
            $this->deleteFileIfExists($del->icon);
            $del->delete();
        }
    }

        DB::commit();

        return redirect()->route('admin.course.why-choose-us.index', $section->course->slug)->with('notification', [
            'message' => 'Section Updated Successfully!',
            'alert'   => 'success',
        ]);
    }

    public function delete($id)
    {
        $section = CourseWhyChooseUs::findOrFail($id);

        foreach ($section->details as $detail) {
            $this->deleteFileIfExists($detail->icon);
            $detail->delete();
        }

        $this->deleteFileIfExists($section->image);

        CourseSetting::where('reference_id', $section->id)
            ->where('reference_type', CourseWhyChooseUs::class)
            ->delete();

        $settings = CourseSetting::where('course_id', $section->course_id)
            ->orderBy('order_no')
            ->get();

        $order = 1;
        foreach ($settings as $setting) {
            $setting->update(['order_no' => $order++]);
        }

        $section->delete();

        return redirect()->back()->with('notification', [
            'message' => 'Section Deleted Successfully!',
            'alert'   => 'success',
        ]);
    }

    private function uploadFile($file, $folder)
    {
        $fileName = time() . rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path("assets/admin/uploads/{$folder}/"), $fileName);
        return "assets/admin/uploads/{$folder}/" . $fileName;
    }

    private function deleteFileIfExists($filePath)
    {
        if ($filePath && file_exists(public_path($filePath))) {
            unlink(public_path($filePath));
        }
    }
}
