<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Gcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $galleries = Gallery::orderBy('serial_number', 'asc')->get();
        return view('admin.gallery.index', compact('galleries'));
    }
    // Add Gallery 
    public function add()
    {
        $gcategories = Gcategory::where('status', 1)->get();
        return view('admin.gallery.add', compact('gcategories'));
    }
    // Store Gallery 
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|max:255',
            'status' => 'required',
            'category_id' => 'required',
            'video_link' => 'nullable|max:250|url',
            'serial_number' => 'required',
        ]);
        $gallery = new Gallery();
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $imageName = time() . rand() . '.' . $extension;
        $file->move('assets/admin/img/gallery/', $imageName);
        $gallery->image = $imageName;
    }
        $gallery->title = $request->title;
        $gallery->status = $request->status;
        $gallery->category_id = $request->category_id;
        $gallery->video_link = $request->video_link;
        $gallery->serial_number = $request->serial_number;
        $gallery->save();
        $notification = array(
            'message' => 'Gallery Added successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.gallery.index')->with('notification', $notification);
    }

    // Gallery  Delete
    public function delete($id)
    {
        $gallery = Gallery::find($id);
        unlink(public_path('assets/admin/img/gallery/' . $gallery->image));
        $gallery->delete();
        $notification = array(
            'message' => 'Gallery Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Gallery  Edit
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gcategories = Gcategory::where('status', 1)->get();
        return view('admin.gallery.edit', compact('gallery', 'gcategories'));
    }

    // Gallery Update
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'title' => 'required|max:255',
            'status' => 'required',
            'category_id' => 'required',
            'video_link' => 'nullable|max:250|url',
            'serial_number' => 'required',
        ]);
        if ($request->hasFile('image')) {
        // Remove old image if exists
        if ($gallery->image && file_exists(public_path('assets/admin/img/gallery/' . $gallery->image))) {
            unlink(public_path('assets/admin/img/gallery/' . $gallery->image));
                }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time() . rand() . '.' . $extension;
            $file->move('assets/admin/img/gallery/', $image);
            $gallery->image =  $image;
        }
        $gallery->title = $request->title;
        $gallery->status = $request->status;
        $gallery->category_id = $request->category_id;
        $gallery->video_link = $request->video_link;
        $gallery->serial_number = $request->serial_number;
        $gallery->save();
        $notification = array(
            'message' => 'Gallery Updated successfully!',
            'alert' => 'success'
        );
        return redirect(route('admin.gallery.index'))->with('notification', $notification);
    }
}