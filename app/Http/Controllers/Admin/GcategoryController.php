<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Gcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class GcategoryController extends Controller
{
    public function gcategory()
    {
        $gcategories = Gcategory::select('id', 'name', 'serial_number', 'status')
            ->orderBy('serial_number', 'asc')
            ->get();

        return view('admin.gallery.gallery-category.index', compact('gcategories'));
    }


    // Add Blog Category
    public function add()
    {
        return view('admin.gallery.gallery-category.add');
    }

    // Store Blog Category
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:150',
                'unique:gcategories,name',
            ],
            'status' => 'required|in:0,1',
            'serial_number' => 'required|numeric|min:0',
        ]);

        $gcategory = new Gcategory();
        $gcategory->name = trim($request->name);
        $gcategory->status = $request->status;
        $gcategory->serial_number = $request->serial_number;
        $gcategory->save();

        $notification = [
            'message' => 'Gallery Category added successfully!',
            'alert' => 'success'
        ];

        return redirect()->route('admin.gcategory.index')->with('notification', $notification);
    }


    // Blog Category Delete
    public function delete($id)
    {

        $bcategory = Gcategory::find($id);
        $blogs = Gallery::where('category_id', $id)->get();

        if ($blogs->count() >= 1) {
            $notification = array(
                'message' => 'First Delete Galleries Under This Category !',
                'alert' => 'warning'
            );
            return redirect()->back()->with('notification', $notification);
        }

        $bcategory->delete();


        $notification = array(
            'message' => 'Gallery Category Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);

    }

    // Blog Category Edit
    public function edit($id)
    {

        $gcategory = Gcategory::find($id);
        return view('admin.gallery.gallery-category.edit', compact('gcategory'));
    }

    // Blog Skill Category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'max:150',
                Rule::unique('gcategories', 'name')->ignore($id)
            ],
            'status' => 'required|in:0,1',
            'serial_number' => 'required|numeric',
        ]);

        $gcategory = Gcategory::findOrFail($id);
        $gcategory->name = $request->name;
        $gcategory->status = $request->status;
        $gcategory->serial_number = $request->serial_number;

        $gcategory->save();

        return redirect()->route('admin.gcategory.index')->with('notification', [
            'alert' => 'success',
            'message' => 'Gallery Category Updated successfully!',
        ]);
    }

}
