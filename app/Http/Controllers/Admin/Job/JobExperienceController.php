<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobExperience;

class JobExperienceController extends Controller
{
     public function index()
    {
        $jobexperiences = JobExperience::latest()->get();
        return view('admin.job.job_experience.index', compact('jobexperiences'));
    }

    public function create()
    {
        return view('admin.job.job_experience.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        JobExperience::create($validated);

        $notification = array(
            'message' => ' Job  Experience Created  Successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.experience.index')
            ->with('notification', $notification);
    }

    public function edit($id)
    {
        $jobexperience = JobExperience::findOrFail($id);
        return view('admin.job.job_experience.edit', compact('jobexperience'));
    }

    public function update(Request $request, $id)
    {
        $jobexperience = JobExperience::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $jobexperience->update($validated);

        $notification = array(
            'message' => ' Job  Experience Updated  Successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.experience.index')
            ->with('notification', $notification);
    }

    public function delete(Request $request , $id)
{
    $jobexperience = JobExperience::findOrFail($id);
    $jobexperience->delete();

        $notification = array(
            'message' => ' Job  Experience  Deleted Successfully!',
            'alert' => 'success'
        );
        return back()
            ->with('notification', $notification);
}


    public function trash()
    {
        $jobexperiences = JobExperience::onlyTrashed()->get();
        return view('admin.job.job_experience.trash', compact('jobexperiences'));
    }

    public function restore($id)
    {
        $jobexperience = JobExperience::onlyTrashed()->findOrFail($id);
        $jobexperience->restore();

        $notification = array(
            'message' => ' Job  Experience Restored  Successfully!',
            'alert' => 'success'
        );
        return back()
            ->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $jobexperience = JobExperience::onlyTrashed()->findOrFail($id);
        $jobexperience->forceDelete();

        $notification = array(
            'message' => ' Job  Experience Permanently Deleted Successfully!',
            'alert' => 'success'
        );
        return back()
            ->with('notification', $notification);
    }
}
