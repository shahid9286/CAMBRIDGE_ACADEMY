<?php

namespace App\Http\Controllers\Admin\Job;


use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use App\Models\CompanyJob;
use App\Models\JobType;
use App\Models\IndustryJob;
use App\Models\JobCity;
use App\Models\JobCountry;
use App\Models\JobExperience;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
      public function index()
    {
        $vacancies = JobVacancy::with(['company','jobType','industry','city','country','experience'])
            ->latest()->get();

        return view('admin.job.job_vacancy.index', compact('vacancies'));
    }

    public function create()

    {
           $companyjobs    = CompanyJob::latest()->get();
           $jobtypes       = JobType::latest()->get();
           $industryjobs   = IndustryJob::latest()->get();
           $jobcities      = JobCity::latest()->get();
           $jobcountries   = JobCountry::latest()->get();
           $jobexperiences = JobExperience::latest()->get();


        return view('admin.job.job_vacancy.create', compact('companyjobs',
        'jobtypes',
        'industryjobs',
        'jobcities',
        'jobcountries',
        'jobexperiences'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // FKs must exist
            'company_jobs_id'     => 'required|exists:company_jobs,id',
            'job_types_id'        => 'required|exists:job_types,id',
            'industry_jobs_id'    => 'required|exists:industry_jobs,id',
            'job_cities_id'       => 'required|exists:job_cities,id',
            'job_countries_id'    => 'required|exists:job_countries,id',
            'job_experiences_id'  => 'required|exists:job_experiences,id',

            // Job info
            'title'        => 'required|string|max:255',
            'thumbnail'    => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:4096',
            'gender'       => 'required|in:male,female,both',
            'min_age'      => 'nullable|integer|min:0|max:120',
            'max_age'      => 'nullable|integer|min:0|max:120|gte:min_age',
            'description'  => 'required|string',
            'job_vacancy'  => 'required|integer|min:1',
            // 'is_active'    => '|boolean',

            // Salary`
            'salary_min'   => 'nullable|numeric|min:0',
            'salary_max'   => 'nullable|numeric|min:0|gte:salary_min',

            // Contact
            'email'        => 'nullable|email|max:255',
            'contact_no'   => 'nullable|string|max:50',
            'whatsapp_no'  => 'nullable|string|max:50',
            'website'      => 'nullable|url|max:255',
            'location'     => 'nullable|string|max:255',

            // Dates
            'post_date'    => 'required|date',
            'deadline'     => 'required|date|after_or_equal:post_date',

            // Details
            'job_details'  => 'required|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/job/vacancy'), $imageName);
            $validated['thumbnail'] = 'uploads/admin/job/vacancy/' . $imageName;
        }

        // If is_active checkbox missing, default true/false from DB will apply.
         $validated['is_active'] = $request->boolean('is_active', false);


        JobVacancy::create($validated);

        $notification = array(
            'message' => ' Job  Vacancy Created  Successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.jobvacancy.index')
            ->with('notification', $notification);
    }

    public function edit($id)
    {
        $companyjobs    = CompanyJob::latest()->get();
        $jobtypes       = JobType::latest()->get();
        $industryjobs   = IndustryJob::latest()->get();
        $jobcities      = JobCity::latest()->get();
        $jobcountries   = JobCountry::latest()->get();
        $jobexperiences = JobExperience::latest()->get();


        $vacancy = JobVacancy::findOrFail($id);
        return view('admin.job.job_vacancy.edit', compact('vacancy' ,'companyjobs',
        'jobtypes',
        'industryjobs',
        'jobcities',
        'jobcountries',
        'jobexperiences'));
    }

    public function update(Request $request, $id)
    {
        $vacancy = JobVacancy::findOrFail($id);

        $validated = $request->validate([
            // FKs
            'company_jobs_id'     => 'required|exists:company_jobs,id',
            'job_types_id'        => 'required|exists:job_types,id',
            'industry_jobs_id'    => 'required|exists:industry_jobs,id',
           'job_cities_id'       => 'required|exists:job_cities,id',
            'job_countries_id'    => 'required|exists:job_countries,id',
            'job_experiences_id'  => 'required|exists:job_experiences,id',

            // Job info
            'title'        => 'required|string|max:255',
            'thumbnail'    => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:4096',
            'gender'       => 'required|in:male,female,both',
            'min_age'      => 'nullable|integer|min:0|max:120',
            'max_age'      => 'nullable|integer|min:0|max:120|gte:min_age',
            'description'  => 'required|string',
            'job_vacancy'  => 'required|integer|min:1',
            'is_active'    => 'sometimes|boolean',

            // Salary
            'salary_min'   => 'nullable|numeric|min:0',
            'salary_max'   => 'nullable|numeric|min:0|gte:salary_min',

            // Contact
            'email'        => 'nullable|email|max:255',
            'contact_no'   => 'nullable|string|max:50',
            'whatsapp_no'  => 'nullable|string|max:50',
            'website'      => 'nullable|url|max:255',
            'location'     => 'nullable|string|max:255',

            // Dates
            'post_date'    => 'required|date',
            'deadline'     => 'required|date|after_or_equal:post_date',

            // Details
            'job_details'  => 'required|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($vacancy->thumbnail && file_exists(public_path($vacancy->thumbnail))) {
                @unlink(public_path($vacancy->thumbnail));
            }

            $image = $request->file('thumbnail');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/job/vacancy'), $imageName);
            $validated['thumbnail'] = 'uploads/admin/job/vacancy/' . $imageName;
        }

        $validated['is_active'] = $request->has('is_active')
            ? $request->boolean('is_active')
            : $vacancy->is_active;

        $vacancy->update($validated);

        $notification = array(
            'message' => ' Job  Vacancy Updated  Successfully!',
            'alert' => 'success'
        );
        return redirect()->route('admin.job.jobvacancy.index')
            ->with('notification', $notification);
    }

    public function delete($id)
    {
        $vacancy = JobVacancy::findOrFail($id);
        $vacancy->delete();

        $notification = array(
            'message' => ' Job  Vacancy Deleted  Successfully!',
            'alert' => 'success'
        );
        return back() 
            ->with('notification', $notification);
    }

    public function trash()
    {
        $vacancies = JobVacancy::onlyTrashed()->get();
        return view('admin.job.job_vacancy.trash', compact('vacancies'));
    }

    public function restore($id)
    {
        $vacancy = JobVacancy::onlyTrashed()->findOrFail($id);
        $vacancy->restore();

        $notification = array(
            'message' => ' Job  Vacancy Restored  Successfully!',
            'alert' => 'success'
        );
        return back() 
            ->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $vacancy = JobVacancy::onlyTrashed()->findOrFail($id);

        if ($vacancy->thumbnail && file_exists(public_path($vacancy->thumbnail))) {
            @unlink(public_path($vacancy->thumbnail));
        }

        $vacancy->forceDelete();

        $notification = array(
            'message' => ' Job  Vacancy Permanently Deleted  Successfully!',
            'alert' => 'success'
        );
        return back()
            ->with('notification', $notification);
    }
}
