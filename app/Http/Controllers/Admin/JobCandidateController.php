<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;   
use App\Models\JobCandidate;
use App\Models\Job;

class JobCandidateController extends Controller
{
    public function index(){
        $candidates = JobCandidate::with('job')->latest()->get();
        return view('admin.job.candidates.index', compact('candidates'));
    } 

    public function create(){
        $jobs = Job::active()->get();
        return view('admin.job.candidates.create', compact('jobs'));
    }

    public function store(Request $request){
            
        $request->validate([
            'job_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'resume' => 'nullable|file|max:2048',
            'cover_letter' => 'nullable|string',
        ]);

        
        $data = $request->all();

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('assets/admin/img/resumes/', $filename);
            $data['resume'] = 'assets/admin/img/resumes/'.$filename;
        }

        JobCandidate::create($data);
        if (str_contains(url()->previous(), '/job/')) {
            return redirect()->back()->with('notification', [
                'message' => 'Candidate added successfully!',
                'alert' => 'success'
            ]);
        } else {
            return redirect()->route('admin.job-candidate.index')->with('notification', [
                'message' => 'Application Submitted Successfully!',
                'alert' => 'success'
            ]);
        }
    }
    public function edit($id)
    {
        $candidate = JobCandidate::findOrFail($id);
        $jobs = Job::all();
        return view('admin.job.candidates.edit', compact('candidate', 'jobs'));
    }

    public function update(Request $request, $id)
    {
        $candidate = JobCandidate::findOrFail($id);

        $request->validate([
            'job_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'resume' => 'nullable|file|max:2048',
            'cover_letter' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('resume')) {
            @unlink($candidate->resume);
            $file = $request->file('resume');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/admin/img/resumes/', $filename);
            $data['resume'] = 'assets/admin/img/resumes/' . $filename;
        }

        $candidate->update($data);

        return redirect()->route('admin.job-candidate.index')
            ->with('notification', ['message' => 'Application updated successfully!', 'alert' => 'success']);
    }

    
    public function delete($id){
        $candidate = JobCandidate::findOrFail($id);
        $candidate->delete();
        return redirect()->route('admin.job-candidate.index')->with('notification', ['message' => 'Candidate deleted successfully!', 'alert' => 'success']);
    }

    public function trashed(){
        $trashed = JobCandidate::onlyTrashed()->get();
        return view('admin.job.candidates.trash', compact('trashed'));
    }

    public function restore($id){
        $candidates = JobCandidate::onlyTrashed()->findOrFail($id);
        $candidates->restore();
        return redirect()->back()->with('notification',['message'=>'Candidate Restored Successfully!','alert'=>'success']);

    }

    public function forceDelete($id){
        $candidate = JobCandidate::onlyTrashed()->findOrFail($id);
        $candidate->forceDelete();
        return redirect()->route('admin.job-candidate.index')->with('notification',['message'=>'Candidate Deleted Successfully!','alert'=>'success']);
    }
}
