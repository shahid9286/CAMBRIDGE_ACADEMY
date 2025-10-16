<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyJob;

class CompanyJobController extends Controller
{
    public function index()
    {
        $companyjobs = CompanyJob::latest()->paginate(10);
        return view('admin.job.company_job.index', compact('companyjobs'));
    }

    public function create()
    {
        return view('admin.job.company_job.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'introduction' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'phone' => 'required',
            'location' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/job/companyjob'), $imageName);

            $validated['logo'] = 'uploads/admin/job/companyjob/' . $imageName;
        }

        CompanyJob::create($validated);

        $notification = array(
            'message' => 'Company Job created successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.company.index')
            ->with('notification', $notification);
    }
    public function edit($id)
    {
        $companyjob = CompanyJob::findOrFail($id);
        return view('admin.job.company_job.edit', compact('companyjob'));
    }


    public function update(Request $request, $id)
    {
        $companyjob = CompanyJob::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'introduction' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'phone' => 'required',
            'location' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            // delete old image if exists
            if ($companyjob->logo && file_exists(public_path($companyjob->logo))) {
                unlink(public_path($companyjob->logo));
            }

            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/job/companyjob'), $imageName);

            $validated['logo'] = 'uploads/admin/job/companyjob/' . $imageName;
        }

        $companyjob->update($validated);

        $notification = array(
            'message' => 'Company Job Updated successfully',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.company.index')
            ->with('notification', $notification);
    }

    public function delete($id)
    {
        $companyjob = CompanyJob::findOrFail($id);
        $companyjob->delete();

        $notification = array(
            'message' => 'Company Job Deleted Successfully!',
            'alert' => 'success'
        );
        return redirect()->back()
            ->with('notification', $notification);
    }
    


    // Show soft-deleted records
    public function trash()
    {
        $companyjobs = CompanyJob::onlyTrashed()->paginate(10);
        return view('admin.job.company_job.trash', compact('companyjobs'));
    }

    public function restore($id)
    {
        $companyjob = CompanyJob::onlyTrashed()->findOrFail($id);
        $companyjob->restore();

        $notification = array(
            'message' => 'Company Job Restored successfully!',
            'alert' => 'success'
        );
        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $companyjob = CompanyJob::onlyTrashed()->findOrFail($id);

        if ($companyjob->logo && file_exists(public_path($companyjob->logo))) {
            unlink(public_path($companyjob->logo));
        }

        $companyjob->forceDelete();

        $notification = array(
            'message' => 'Company Job Permanently Deleted successfully!',
            'alert' => 'success'
        );
        return back()->with('notification', $notification);
    }
}
