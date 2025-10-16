<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\IndustryJob;
use App\Models\JobApplicant;
use App\Models\JobType;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class FrontJobController extends Controller
{
    // In your controller
    public function jobList()
    {
        $industries = IndustryJob::get();
        $jobTypes = JobType::get();
        $jobs = JobVacancy::with(['company', 'jobType'])
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('job-portal.job-list', compact('jobs', 'industries', 'jobTypes'));
    }

    public function jobSearch(Request $request)
    {
        try {
            $query = JobVacancy::with(['company', 'jobType']);
            if ($request->industry) {
                $query->where('industry_jobs_id', $request->industry);
            }
            if ($request->job_type) {
                $query->where('job_types_id', $request->job_type);
            }
            if ($request->keyword) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->keyword . '%')
                        ->orWhere('description', 'like', '%' . $request->keyword . '%')
                        ->orWhereHas('jobType', function ($subQuery) use ($request) {
                            $subQuery->where('title', 'like', '%' . $request->keyword . '%');
                        });
                });
            }
            switch ($request->sort_by) {
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'salary_high':
                    $query->orderBy('salary', 'desc');
                    break;
                case 'salary_low':
                    $query->orderBy('salary', 'asc');
                    break;
                default: // newest
                    $query->orderBy('created_at', 'desc');
                    break;
            }
            $perPage = $request->per_page ?? 2;
            $jobs = $query->paginate($perPage);
            $start = ($jobs->currentPage() - 1) * $jobs->perPage() + 1;
            $end = min($jobs->currentPage() * $jobs->perPage(), $jobs->total());
            $html = view('job-portal.partials.job-list', compact('jobs'))->render();
            $pagination = view('job-portal.partials.pagination', compact('jobs'))->render();
            return response()->json([
                'success' => true,
                'html' => $html,
                'pagination' => $pagination,
                'total' => $jobs->total(),
                'start' => $start,
                'end' => $end
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error loading jobs'
            ]);
        }
    }





    public function jobDetail($id)
    {
        $job = JobVacancy::with(['company', 'jobType', 'experience', 'country', 'city'])->where('id', $id)->first();
        return view('job-portal.job-detail', compact('job'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'description' => 'nullable|string',
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
            'job_id' => 'required|exists:job_vacancies,id',
        ]);
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }
        JobApplicant::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'resume' => $resumePath,
            'job_id' => $request->job_id,
        ]);

        return response()->json(['success' => true, 'message' => 'Application submitted successfully!']);
    }

    public function jobApplicant()
    {
        $applicants = JobApplicant::get();
        return view("job-portal.job-applicant", compact("applicants"));
    }
}
