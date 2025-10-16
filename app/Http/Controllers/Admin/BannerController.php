<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    // Show all banners
    public function index()
    {
        $banners = Banner::orderBy('order_no', 'DESC')->get();
        return view('admin.banner.index', compact('banners'));
    }

    // Show add banner form
    public function add()
    {
        return view('admin.banner.add');
    }

    // Store new banner
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'nullable|max:255',
            'link' => 'nullable|max:255|url',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'type' => 'required',
            'order_no' => 'required|min:0',
        ]);

        $banner = new Banner();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extension;
            $file->move('assets/admin/img/banners', $filename);
            $banner->image = 'assets/admin/img/banners/' . $filename;
        }

        $banner->title = $request->title;
        $banner->link = $request->link;
        $banner->status = $request->status;
        $banner->type = $request->type;
        $banner->order_no = $request->order_no;
        $banner->save();

        $notification = [
            'message' => 'Banner Added Successfully!',
            'alert' => 'success'
        ];
        return redirect()->route('admin.banner.index')->with('notification', $notification);
    }

    // Show edit banner form
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    // Update banner
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|max:255',
            'link' => 'nullable|max:255|url',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'type' => 'required|string',
            'order_no' => 'required|numeric|min:0',
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->hasFile('image')) {
            if (!empty($banner->image) && file_exists(public_path($banner->image))) {
                @unlink(public_path($banner->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand() . '.' . $extension;
            $file->move('assets/admin/img/banners', $filename);
            $banner->image = 'assets/admin/img/banners/' . $filename;
        }

        $banner->title = $request->title;
        $banner->link = $request->link;
        $banner->status = $request->status;
        $banner->type = $request->type;
        $banner->order_no = $request->order_no;
        $banner->save();

        $notification = [
            'message' => 'Banner Updated Successfully!',
            'alert' => 'success'
        ];
        return redirect()->route('admin.banner.index')->with('notification', $notification);
    }

    // Delete banner
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if (!empty($banner->image) && file_exists(public_path($banner->image))) {
            @unlink(public_path($banner->image));
        }
        $banner->delete();

        $notification = [
            'message' => 'Banner Deleted Successfully!',
            'alert' => 'success'
        ];
        return redirect()->back()->with('notification', $notification);
    }
}
