<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobType;

class JobTypeController extends Controller
{
      public function index()
    {
        $jobtypes = JobType::latest()->paginate(10);
        return view('admin.job.job_type.index', compact('jobtypes'));
    }

    public function create()
    {
        return view('admin.job.job_type.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        JobType::create($validated);
                $notification = array(
            'message' => ' Job Type Created Successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.type.index')
            ->with('notification', $notification);
    }

    public function edit($id)
    {
        $jobtype = JobType::findOrFail($id);
        return view('admin.job.job_type.edit', compact('jobtype'));
    }

    public function update(Request $request, $id)
    {
        $jobtype = JobType::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $jobtype->update($validated);

        $notification = array(
            'message' => ' Job Type Updated Successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.type.index')
            ->with('notification', $notification);
    }
    

    public function delete($id)
    {
        $jobtype = JobType::findOrFail($id);
        $jobtype->delete();

        $notification = array(
            'message' => ' Job Type Deleted Successfully!',
            'alert' => 'success'
        );
        return back()
            ->with('notification', $notification);
    }
    

    public function trash()
    {
        $jobtypes = JobType::onlyTrashed()->get();
        return view('admin.job.job_type.trash', compact('jobtypes'));
    }

    public function restore($id)
    {
        $jobtype = JobType::onlyTrashed()->findOrFail($id);
        $jobtype->restore();

        $notification = array(
            'message' => ' Job Type Restored Successfully!',
            'alert' => 'success'
        );
        return back()
            ->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $jobtype = JobType::onlyTrashed()->findOrFail($id);
        $jobtype->forceDelete();

        $notification = array(
            'message' => ' Job Type Permanently Deleted Successfully!',
            'alert' => 'success'
        );
        return redirect()->back()
            ->with('notification', $notification);
    
    }
}
