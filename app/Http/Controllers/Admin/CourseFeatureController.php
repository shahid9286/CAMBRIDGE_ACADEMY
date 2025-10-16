<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\CourseSetting;
use App\Models\CourseFeature;
use App\Models\CourseFeatureDetail;

class CourseFeatureController extends Controller
{
    public function index($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $features = CourseFeature::where('course_id', $course->id)->get();

        return view('admin.course.partials.feature_list', compact('features',  'slug'));
    }

    public function add($slug)
    {
        return view('admin.course.partials.feature_add', compact('slug'));
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

        $section = new CourseFeature();
        $section->course_id   = $course->id;
        $section->title       = $request->input('title');
        $section->subtitle    = $request->input('subtitle');
        $section->description = $request->input('description');

        if ($request->hasFile('image')) {
            $section->image = $this->uploadFile($request->file('image'), 'course_feature');
        }

        $section->save();

        if ($request->has('features')) {
            foreach ($request->features as $feature) {
                $sectionFeature = new CourseFeatureDetail();
                $sectionFeature->course_feature_id = $section->id;
                $sectionFeature->title = $feature['title'] ?? '';
                $sectionFeature->description = $feature['description'] ?? '';

                if (isset($feature['icon']) && $feature['icon'] instanceof \Illuminate\Http\UploadedFile) {
                    $sectionFeature->icon = $this->uploadFile($feature['icon'], 'feature_details');
                }

                $sectionFeature->save();
            }
        }

        $lastOrder = CourseSetting::where('course_id', $course->id)->max('order_no');
        $orderNo   = $lastOrder ? $lastOrder + 1 : 1;

        CourseSetting::create([
            'course_id'      => $course->id,
            'reference_id'   => $section->id,
            'reference_type' => CourseFeature::class,
            'order_no'       => $orderNo,
        ]);

        DB::commit();

        return redirect()->route('admin.course.feature.index', $slug)->with('notification', [
            'message' => 'Course Feature Added Successfully!',
            'alert'   => 'success',
        ]);
    }

    public function edit($id)
    {
        $feature = CourseFeature::with('details')->findOrFail($id);
        $slug  = $feature->course->slug;
        return view('admin.course.partials.feature_edit', compact('feature', 'slug'));
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

        $section = CourseFeature::findOrFail($id);
        $section->title       = $request->input('title');
        $section->subtitle    = $request->input('subtitle');
        $section->description = $request->input('description');

        if ($request->hasFile('image')) {
            $this->deleteFileIfExists($section->image);
            $section->image = $this->uploadFile($request->file('image'), 'course_feature');
        }

        $section->save();
        

        if ($request->filled('deleted_features')) {
            $ids = explode(',', $request->input('deleted_features'));

            $deletedFeatures = CourseFeatureDetail::whereIn('id', $ids)->get();

            foreach ($deletedFeatures as $sectionFeature) {
                if ($sectionFeature->icon) {
                    $this->deleteFileIfExists($sectionFeature->icon);
                }

                $sectionFeature->delete();
            }
        }
        if ($request->has('features')) {
            foreach ($request->features as $feature) {
                if (isset($feature['id'])) {
                    $sectionFeature = CourseFeatureDetail::find(id: $feature['id']);
                    if ($sectionFeature) {
                        $sectionFeature->title = $feature['title'] ?? $sectionFeature->title;
                        $sectionFeature->description = $feature['description'] ?? $sectionFeature->description;

                        if (isset($feature['icon']) && $feature['icon'] instanceof \Illuminate\Http\UploadedFile) {
                            $this->deleteFileIfExists($sectionFeature->icon);
                            $sectionFeature->icon = $this->uploadFile($feature['icon'], 'feature_details');
                        }

                        $sectionFeature->save();
                    }
                } else {
                    $sectionFeature = new CourseFeatureDetail();
                    $sectionFeature->course_feature_id = $section->id;
                    $sectionFeature->title = $feature['title'] ?? '';
                    $sectionFeature->description = $feature['description'] ?? '';

                    if (isset($feature['icon']) && $feature['icon'] instanceof \Illuminate\Http\UploadedFile) {
                        $sectionFeature->icon = $this->uploadFile($feature['icon'], 'feature_details');
                    }

                    $sectionFeature->save();
                }
            }
        }


        return redirect()->route('admin.course.feature.index', $section->course->slug)->with('notification', [
            'message' => 'Course Feature Updated Successfully!',
            'alert'   => 'success',
        ]);
    }

    public function delete($id)
    {
        $section = CourseFeature::findOrFail($id);

        foreach ($section->details as $detail) {
            $this->deleteFileIfExists($detail->icon);
            $detail->delete();
        }

        $this->deleteFileIfExists($section->image);

        CourseSetting::where('reference_id', $section->id)
            ->where('reference_type', CourseFeature::class)
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
            'message' => 'Course Feature Deleted Successfully!',
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
