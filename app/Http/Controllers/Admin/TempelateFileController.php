<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TempelateFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TempelateFileController extends Controller
{
    public function index()
    {
        $files = TempelateFile::latest()->get();
        return view('admin.tempelate_files.index', compact('files'));
    }

    public function add()
    {
        return view('admin.tempelate_files.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'long_description' => 'nullable|string',
            'icon' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'tempelate_file' => 'required|file|max:10240|mimes:zip', // max 10MB
        ]);

        $data = $request->only(['title', 'subtitle', 'long_description']);

        if ($request->hasFile('icon')) {

            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $icon = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/template/', $icon);

            $data['icon'] = $icon;
        }

        if ($request->hasFile('tempelate_file')) {
            $file = $request->file('tempelate_file');
            $extension = $file->getClientOriginalExtension();
            $templateFileName = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/template_zips/', $templateFileName);

            $data['tempelate_file'] = $templateFileName;
        }

        TempelateFile::create($data);

        $notification = [
            'alert' => 'success',
            'message' => 'Template File added Successfully!'
        ];

        return redirect()->route('admin.tempelate-file.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $templateFile = TempelateFile::findOrFail($id);
        return view('admin.tempelate_files.edit', compact('templateFile'));
    }

public function update(Request $request, $id)
{
    $templateFile = TempelateFile::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string|max:255',
        'long_description' => 'nullable|string',
        'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        'tempelate_file' => 'nullable|file|mimes:zip|max:10240',
    ]);

    $data = $request->only(['title', 'subtitle', 'long_description']);

    // Update icon if uploaded
    if ($request->hasFile('icon')) {
        if ($templateFile->icon && file_exists(public_path('assets/admin/uploads/template/' . $templateFile->icon))) {
            unlink(public_path('assets/admin/uploads/template/' . $templateFile->icon));
        }

        $uploadedIcon = $request->file('icon');
        $iconName = time() . rand() . '.' . $uploadedIcon->getClientOriginalExtension();
        $uploadedIcon->move(public_path('assets/admin/uploads/template/'), $iconName);

        $data['icon'] = $iconName;
    }

    // Update template file if uploaded
    if ($request->hasFile('tempelate_file')) {
        if ($templateFile->tempelate_file && file_exists(public_path('assets/admin/uploads/template_zips/' . $templateFile->tempelate_file))) {
            unlink(public_path('assets/admin/uploads/template_zips/' . $templateFile->tempelate_file));
        }

        $uploadedTemplate = $request->file('tempelate_file');
        $templateFileName = time() . rand() . '.' . $uploadedTemplate->getClientOriginalExtension();
        $uploadedTemplate->move(public_path('assets/admin/uploads/template_zips/'), $templateFileName);

        $data['tempelate_file'] = $templateFileName;
    }

    $templateFile->update($data);

    $notification = [
            'alert' => 'success',
            'message' => 'Template File updated Successfully!'
        ];


    return redirect()->route('admin.tempelate-file.index')->with('notification', $notification);
}

    public function delete($id)
    {
    $file = TempelateFile::findOrFail($id);

    // Delete icon from custom public path
    if ($file->icon && file_exists(public_path('assets/admin/uploads/template/' . $file->icon))) {
        unlink(public_path('assets/admin/uploads/template/' . $file->icon));
    }
        if ($file->tempelate_file && file_exists(public_path('assets/admin/uploads/template_zips/' . $file->tempelate_file))) {
        unlink(public_path('assets/admin/uploads/template_zips/' . $file->tempelate_file));
    }


        $file->delete();

        $notification = [
            'alert' => 'success',
            'message' => 'Template File  deleted Successfully!'
        ];
        return redirect()->back()->with('notification', $notification);
    }
}