<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionHeader;
use Illuminate\Http\Request;

class SectionHeaderController extends Controller
{
    public function index()
    {
        $sections = SectionHeader::all();
        return view('admin.section-header.index', compact('sections'));
    }

    public function add()
    {
        return view('admin.section-header.add');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string|max:255',
        'use_for' => 'required|string|max:255|unique:section_headers,use_for',
        'description' => 'nullable|string',
    ]);

    $sectionHeader = new SectionHeader();

    $sectionHeader->title = $request->title;
    $sectionHeader->subtitle = $request->subtitle;
    $sectionHeader->use_for = $request->use_for;
    $sectionHeader->description = $request->description;

    // Handle checkboxes: true if set, false otherwise
    $sectionHeader->is_editable = $request->has('is_editable') ? 1 : 0;
    $sectionHeader->is_deleteable = $request->has('is_deleteable') ? 1 : 0;

    $sectionHeader->save();

    return redirect()->route('admin.section-header.index')->with('notification', [
        'message' => 'Section Header Added Successfully!',
        'alert' => 'success',
    ]);
}
    public function edit($id)
    {
        $section = SectionHeader::findOrFail($id);
        return view('admin.section-header.edit', compact('section'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string|max:255',
        'use_for' => 'required|string|max:255|unique:section_headers,use_for,' . $id,
        'description' => 'nullable|string',
    ]);

    $section = SectionHeader::findOrFail($id);

    $section->title = $request->title;
    $section->subtitle = $request->subtitle;
    $section->use_for = $request->use_for;
    $section->description = $request->description;

    $section->is_editable = $request->has('is_editable') ? 1 : 0;
    $section->is_deleteable = $request->has('is_deleteable') ? 1 : 0;

    $section->save();

    return redirect()->route('admin.section-header.index')->with('notification', [
        'message' => 'Section Header Updated Successfully!',
        'alert' => 'success',
    ]);
}

    public function delete($id)
    {
        $section = SectionHeader::findOrFail($id);

        if (!$section->is_deleteable) {
            return redirect()->back()->with('notification', [
                'message' => 'This section cannot be deleted.',
                'alert' => 'warning',
            ]);
        }

        $section->delete();

        return redirect()->route('admin.section-header.index')->with('notification', [
            'message' => 'Section Header Deleted Successfully!',
            'alert' => 'success',
        ]);
    }
}
