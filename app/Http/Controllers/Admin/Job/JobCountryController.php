<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCountry;

class JobCountryController extends Controller
{
     public function index()
    {
        $jobcountries = JobCountry::latest()->get();
        return view('admin.job.job_country.index', compact('jobcountries'));
    }

    public function create()
    {
        return view('admin.job.job_country.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/job/country'), $imageName);
            $validated['logo'] = 'uploads/admin/job/country/' . $imageName;
        }

        JobCountry::create($validated);

        $notification = array(
            'message' => ' Job Country Created successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.country.index')
            ->with('notification', $notification);
    }

    public function edit($id)
    {
        $jobcountry = JobCountry::findOrFail($id);
        return view('admin.job.job_country.edit', compact('jobcountry'));
    }

    public function update(Request $request, $id)
    {
        $jobcountry = JobCountry::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($jobcountry->logo && file_exists(public_path($jobcountry->logo))) {
                unlink(public_path($jobcountry->logo));
            }

            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/job/country'), $imageName);
            $validated['logo'] = 'uploads/admin/job/country/' . $imageName;
        }

        $jobcountry->update($validated);

        $notification = array(
            'message' => ' Job Country Updated Successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.country.index')
            ->with('notification', $notification);
    }

    public function delete($id)
    {
        $jobcountry = JobCountry::findOrFail($id);
        $jobcountry->delete();
        $notification = array(
            'message' => ' Job Country Deleted Successfully!',
            'alert' => 'success'
        );
        return back()
            ->with('notification', $notification);

    }

    public function trash()
    {
        $jobcountries = JobCountry::onlyTrashed()->get();
        return view('admin.job.job_country.trash', compact('jobcountries'));
    }

    public function restore($id)
    {
        $jobcountry = JobCountry::onlyTrashed()->findOrFail($id);
        $jobcountry->restore();

        $notification = array(
            'message' => 'Job  Country Restored Successfully!',
            'alert' => 'success'
        );
        return back()
            ->with('notification', $notification);

    }

    public function forceDelete($id)
    {
        $jobcountry = JobCountry::onlyTrashed()->findOrFail($id);

        if ($jobcountry->logo && file_exists(public_path($jobcountry->logo))) {
            unlink(public_path($jobcountry->logo));
        }

        $jobcountry->forceDelete();
        $notification = array(
            'message' => 'Job  Country Permanently Deleted Successfully!',
            'alert' => 'success'
        );
        return back()
            ->with('notification', $notification);

    }
}
    