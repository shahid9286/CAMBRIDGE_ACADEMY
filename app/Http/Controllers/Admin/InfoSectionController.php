<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoSection;
use App\Models\InfoSectionFeature;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoSectionController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $sections = InfoSection::where('page_id', $page->id)->get();

        return view('admin.page.partials.info_section_list', compact('sections', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.page.partials.info_section_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {

        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'image1' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'text1' => 'nullable|string|max:255',
            'text2' => 'nullable|string|max:255',
            'text3' => 'nullable|string|max:255',
            'features.*.icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'features.*.title' => 'nullable|string|max:255',
            'features.*.description' => 'nullable|string',
        ]);

        DB::beginTransaction();

        $page = Page::where('slug', $slug)->first();
        $section = new InfoSection();
        $section->title = $request->input('title');
        $section->subtitle = $request->input('subtitle');
        $section->description = $request->input('description');
        $section->description2 = $request->input('description2');
        $section->text1 = $request->input('text1');
        $section->text2 = $request->input('text2');
        $section->text3 = $request->input('text3');
        $section->page_id = $page->id;

        if ($request->hasFile('image1')) {
            $section->image1 = $this->uploadFile($request->file('image1'), 'info_sections');
        }
        if ($request->hasFile('image2')) {
            $section->image2 = $this->uploadFile($request->file('image2'), 'info_sections');
        }
        if ($request->hasFile('image3')) {
            $section->image3 = $this->uploadFile($request->file('image3'), 'info_sections');
        }

        $section->save();

        // Save features
        
        if ($request->has('features')) {
            foreach ($request->features as $feature) {
                $sectionFeature = new InfoSectionFeature();
                $sectionFeature->info_section_id = $section->id;
                $sectionFeature->title = $feature['title'] ?? '';
                $sectionFeature->description = $feature['description'] ?? '';

                if (isset($feature['icon']) && $feature['icon'] instanceof \Illuminate\Http\UploadedFile) {
                    $sectionFeature->icon = $this->uploadFile($feature['icon'], 'info_section_features');
                }

                $sectionFeature->save();
            }
        }

        DB::commit();

        return redirect()->route('admin.info-section.index', $slug)->with('notification', [
            'message' => 'Info Section Added Successfully!',
            'alert' => 'success',
        ]);
    }

    public function edit($id)
    {
        $info_section = InfoSection::with('features')->findOrFail($id);
        $slug = $info_section->page->slug;
        return view('admin.page.partials.info_section_edit', compact('info_section', 'slug'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'text1' => 'nullable|string|max:255',
            'text2' => 'nullable|string|max:255',
            'text3' => 'nullable|string|max:255',
            'features.*.id' => 'nullable|integer|exists:info_section_features,id',
            'features.*.icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'features.*.title' => 'required|string|max:255',
            'features.*.description' => 'required|string',
        ]);

        $section = InfoSection::findOrFail($id);
        $section->title = $request->input('title');
        $section->subtitle = $request->input('subtitle');
        $section->description = $request->input('description');
        $section->description2 = $request->input('description2');
        $section->text1 = $request->input('text1');
        $section->text2 = $request->input('text2');
        $section->text3 = $request->input('text3');

        // Update images
        if ($request->hasFile('image1')) {
            $this->deleteFileIfExists($section->image1);
            $section->image1 = $this->uploadFile($request->file('image1'), 'info_sections');
        }
        if ($request->hasFile('image2')) {
            $this->deleteFileIfExists($section->image2);
            $section->image2 = $this->uploadFile($request->file('image2'), 'info_sections');
        }
        if ($request->hasFile('image3')) {
            $this->deleteFileIfExists($section->image3);
            $section->image3 = $this->uploadFile($request->file('image3'), 'info_sections');
        }

        if ($request->has('features')) {
            foreach ($section->features as $oldFeature) {
                if ($oldFeature->icon && file_exists(public_path($oldFeature->icon))) {
                    @unlink(public_path($oldFeature->icon));
                }
            }
            $section->features()->delete();
            
            foreach ($request->features as $feature) {
                $sectionFeature = new InfoSectionFeature();
                $sectionFeature->info_section_id = $section->id;
                $sectionFeature->title = $feature['title'] ?? '';
                $sectionFeature->description = $feature['description'] ?? '';

                if (isset($feature['icon']) && $feature['icon'] instanceof \Illuminate\Http\UploadedFile) {
                    $sectionFeature->icon = $this->uploadFile($feature['icon'], 'info_section_features');
                }

                $sectionFeature->save();
            }
        }
        $section->save();

        return redirect()->route('admin.info-section.index', $section->page->slug)->with('notification', [
            'message' => 'Info Section Updated Successfully!',
            'alert' => 'success',
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

    public function delete($id)
    {
        $section = InfoSection::findOrFail($id);

        foreach ($section->features as $feature) {
            if ($feature->icon && file_exists(public_path($feature->icon))) {
                unlink(public_path($feature->icon));
            }
            $feature->delete();
        }

        $this->deleteFileIfExists($section->image1);
        $this->deleteFileIfExists($section->image2);
        $this->deleteFileIfExists($section->image3);

        $section->delete();

        return redirect()->back()->with('notification', [
            'message' => 'Info Section Deleted Successfully!',
            'alert' => 'success',
        ]);
    }
}
