<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndustryJob;

class IndustryJobController extends Controller
{
    public function index()
    {
        $industryjobs = IndustryJob::latest()->paginate(10);
        return view('admin.job.industry_job.index', compact('industryjobs'));
    }

    public function create()
    {
        return view('admin.job.industry_job.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'introduction' => 'required',
            'order_no' => 'nullable|integer',
        ]);

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/job/features'), $imageName);
            $validated['icon'] = 'uploads/admin/job/features/' . $imageName;
        }

        IndustryJob::create($validated);

        $notification = array(
            'message' => 'Industry Job created successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.industry.index')
            ->with('notification', $notification);
    }

    public function edit($id)
    {
        $industryjob = IndustryJob::findOrFail($id);
        return view('admin.job.industry_job.edit', compact('industryjob'));
    }

    public function update(Request $request, $id)
    {
        $industryjob = IndustryJob::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'introduction' => 'required',
            'order_no' => 'nullable|integer',
        ]);

        if ($request->hasFile('icon')) {
            if ($industryjob->icon && file_exists(public_path($industryjob->icon))) {
                unlink(public_path($industryjob->icon));
            }

            $image = $request->file('icon');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/job/features'), $imageName);
            $validated['icon'] = 'uploads/admin/job/features/' . $imageName;
        }

        $industryjob->update($validated);

        $notification = array(
            'message' => 'Industry Job Updated successfully',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.industry.index')
            ->with('notification', $notification);
    }

    public function delete($id)
    {
        $industryjob = IndustryJob::findOrFail($id);
        $industryjob->delete();

        $notification = array(
            'message' => 'Industry Job  Deleted successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.industry.index')
            ->with('notification', $notification);
    }

    public function trash()
    {
        $industryjobs = IndustryJob::onlyTrashed()->paginate(10);
        return view('admin.job.industry_job.trash', compact('industryjobs'));
    }

    public function restore($id)
    {
        $industryjob = IndustryJob::onlyTrashed()->findOrFail($id);
        $industryjob->restore();

        $notification = array(
            'message' => 'Industry Job Restored  successfully!',
            'alert' => 'success'
        );
        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $industryjob = IndustryJob::onlyTrashed()->findOrFail($id);

        if ($industryjob->icon && file_exists(public_path($industryjob->icon))) {
            unlink(public_path($industryjob->icon));
        }

        $industryjob->forceDelete();

        $notification = array(
            'message' => 'Industry Job Permanently Deleted successfully!',
            'alert' => 'success'
        );
        return back()->with('notification', $notification);
    }
}
