<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCity;
use App\Models\JobCountry;


class JobCityController extends Controller
{
    public function index()
    {
        $jobcities = JobCity::with('country')->latest()->get();
        return view('admin.job.job_city.index', compact('jobcities'));
    }

    public function create()
    {
        $countries = JobCountry::all();
        return view('admin.job.job_city.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:job_countries,id',
        ]);

        JobCity::create($validated);

        $notification = array(
            'message' => 'Job City   Created successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.city.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $jobcity = JobCity::findOrFail($id);
        $countries = JobCountry::all();
        return view('admin.job.job_city.edit', compact('jobcity', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $jobcity = JobCity::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:job_countries,id',
        ]);

        $jobcity->update($validated);

        $notification = array(
            'message' => 'Job City   Updated successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.city.index')->with('notification', $notification);
    }

    public function delete($id)
    {
        $jobcity = JobCity::findOrFail($id);
        $jobcity->delete();

        $notification = array(
            'message' => 'Job City   Deleted successfully!',
            'alert' => 'success'
        );
        return back()->with('notification', $notification);
    }

    public function trash()
    {
        $jobcities = JobCity::onlyTrashed()->with('country')->get();
        return view('admin.job.job_city.trash', compact('jobcities'));
    }

    public function restore($id)
    {
        $jobcity = JobCity::onlyTrashed()->findOrFail($id);
        $jobcity->restore();

        $notification = array(
            'message' => ' Job City  Restored  successfully!',
            'alert' => 'success'
        );
        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $jobcity = JobCity::onlyTrashed()->findOrFail($id);
        $jobcity->forceDelete();

        $notification = array(
            'message' => 'Job City  Permanently Deleted successfully!',
            'alert' => 'success'
        );
        return back()->with('notification', $notification);
    }
}
