<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureSection;
use App\Models\FeatureSectionDetail;
use Illuminate\Http\Request;

class FeatureSectionController extends Controller
{
    public function index()
    {
        $sections = FeatureSection::with(relations: 'details')->get();

        return view('admin.feature-section.index', compact('sections'));
    }

    public function add()
    {
        return view('admin.feature-section.add');
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features' => 'nullable|array',
            'features.*.icon' => 'required|mimes:jpeg,png,jpg,webp|max:2048',
            'features.*.title' => 'required|string|max:255',
            'features.*.description' => 'nullable|string',
        ]);

        $section = new FeatureSection;
        $section->title = $request->input('title');
        $section->subtitle = $request->input('subtitle');
        $section->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move('assets/admin/uploads/feature-section/', $image);
            $section->image = $image;
        }

        $section->save();

        if ($request->has('features')) {
            foreach ($request->features as $index => $feature) {
                $sectionFeature = new FeatureSectionDetail;
                $sectionFeature->feature_section_id = $section->id;
                $sectionFeature->title = $feature['title'] ?? '';
                $sectionFeature->description = $feature['description'] ?? '';

                if ($request->hasFile("features.$index.icon")) {
                    $iconFile = $request->file("features.$index.icon");
                    $iconName = time().rand().'.'.$iconFile->getClientOriginalExtension();
                    $iconFile->move(public_path('assets/admin/uploads/feature-details/'), $iconName);
                    $sectionFeature->icon = $iconName;
                }

                $sectionFeature->save();
            }
        }

        return redirect()->route('admin.feature.section.index')->with('notification', [
            'message' => 'Section Added Successfully!',
            'alert' => 'success',
        ]);
    }

    public function edit($id)
    {
        $section = FeatureSection::with('details')->findOrFail($id);

        return view('admin.feature-section.edit', compact('section'));
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'subtitle' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    //         'details.*.icon' => 'nullable|string|max:255',
    //         'details.*.title' => 'required|string|max:255',
    //         'details.*.description' => 'required|string',
    //     ]);

    //     $section = FeatureSection::findOrFail($id);
    //     $section->title = $request->input('title');
    //     $section->subtitle = $request->input('subtitle');
    //     $section->description = $request->input('description');

    //     if ($request->hasFile('image')) {
    //         if ($section->image && file_exists('assets/admin/uploads/feature-section/' . $section->image)) {
    //             @unlink('assets/admin/uploads/feature-section/' . $section->image);
    //         }
    //         $file = $request->file('image');
    //         $image = time() . rand() . '.' . $file->getClientOriginalExtension();
    //         $file->move('assets/admin/uploads/feature-section/', $image);
    //         $section->image = $image;
    //     }

    //     $section->save();

    //     if ($request->has('features')) {
    //         foreach ($request->features as $index => $feature) {

    //             if (isset($feature['id']) && !empty($feature['id'])) {
    //                 $sectionFeature = FeatureSectionDetail::find($feature['id']);
    //                 if ($sectionFeature) {
    //                     $sectionFeature->title = $feature['title'] ?? $sectionFeature->title;
    //                     $sectionFeature->description = $feature['description'] ?? $sectionFeature->description;

    //                     if ($request->hasFile("features.$index.icon")) {
    //                         if ($sectionFeature->icon && file_exists(public_path('assets/admin/uploads/feature-details/' . $sectionFeature->icon))) {
    //                             @unlink(public_path('assets/admin/uploads/feature-details/' . $sectionFeature->icon));
    //                         }
    //                         $iconFile = $request->file("features.$index.icon");
    //                         $iconName = time() . rand() . '.' . $iconFile->getClientOriginalExtension();
    //                         $iconFile->move(public_path('assets/admin/uploads/feature-details/'), $iconName);
    //                         $sectionFeature->icon = $iconName;
    //                     }

    //                     $sectionFeature->save();
    //                 }
    //             } else {
    //                 $sectionFeature = new FeatureSectionDetail();
    //                 $sectionFeature->feature_section_id = $section->id;
    //                 $sectionFeature->title = $feature['title'] ?? '';
    //                 $sectionFeature->description = $feature['description'] ?? '';

    //                 if ($request->hasFile("features.$index.icon")) {
    //                     $iconFile = $request->file("features.$index.icon");
    //                     $iconName = time() . rand() . '.' . $iconFile->getClientOriginalExtension();
    //                     $iconFile->move(public_path('assets/admin/uploads/feature-details/'), $iconName);
    //                     $sectionFeature->icon = $iconName;
    //                 }

    //                 $sectionFeature->save();
    //             }
    //         }
    //     }

    //     return redirect()->route('admin.feature.section.index')->with('notification', [
    //         'message' => 'Section Updated Successfully!',
    //         'alert' => 'success',
    //     ]);
    // }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features' => 'nullable|array',
            'features.*.icon' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features.*.title' => 'required|string|max:255',
            'features.*.description' => 'required|string',
        ]);

        $section = FeatureSection::findOrFail($id);
        $section->title = $request->input('title');
        $section->subtitle = $request->input('subtitle');
        $section->description = $request->input('description');

        // ✅ Section main image update
        if ($request->hasFile('image')) {
            if ($section->image && file_exists(public_path('assets/admin/uploads/feature-section/'.$section->image))) {
                @unlink(public_path('assets/admin/uploads/feature-section/'.$section->image));
            }
            $file = $request->file('image');
            $image = time().rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/uploads/feature-section/'), $image);
            $section->image = $image;
        }

        $section->save();
        foreach ($section->details as $detail) {
            $detail->delete();
        }

        if ($request->has('features')) {
            foreach ($request->features as $index => $feature) {
                $sectionFeature = new FeatureSectionDetail;
                $sectionFeature->feature_section_id = $section->id;
                $sectionFeature->title = $feature['title'] ?? '';
                $sectionFeature->description = $feature['description'] ?? '';

                if ($request->hasFile("features.$index.icon")) {
                    // new icon uploaded → replace
                    $iconFile = $request->file("features.$index.icon");
                    $iconName = time().rand().'.'.$iconFile->getClientOriginalExtension();
                    $iconFile->move(public_path('assets/admin/uploads/feature-details/'), $iconName);
                    $sectionFeature->icon = $iconName;
                } else {
                    // no new upload → keep old icon (from request hidden field)
                    if (! empty($feature['old_icon'])) {
                        $sectionFeature->icon = $feature['old_icon'];
                    }
                }

                $sectionFeature->save();
            }
        }

        return redirect()->route('admin.feature.section.index')->with('notification', [
            'message' => 'Section Updated Successfully!',
            'alert' => 'success',
        ]);
    }

    public function delete($id)
    {
        $section = FeatureSection::with('details')->findOrFail($id);

        foreach ($section->details as $detail) {
            if (! empty($detail->icon) && file_exists(public_path('assets/admin/uploads/why_choose_us_details/'.$detail->icon))) {
                @unlink(public_path('assets/admin/uploads/why_choose_us_details/'.$detail->icon));
            }
            $detail->delete();
        }

        if (! empty($section->image) && file_exists(public_path('assets/admin/uploads/why_choose_us_section/'.$section->image))) {
            @unlink(public_path('assets/admin/uploads/why_choose_us_section/'.$section->image));
        }

        $section->delete();

        return redirect()->back()->with('notification', [
            'message' => 'Section Deleted Successfully!',
            'alert' => 'success',
        ]);
    }
}
