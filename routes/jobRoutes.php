<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Job\CompanyJobController;
use App\Http\Controllers\Admin\Job\IndustryJobController;
use App\Http\Controllers\Admin\Job\JobTypeController;
use App\Http\Controllers\Admin\Job\JobCountryController;
use App\Http\Controllers\Admin\Job\JobCityController;
use App\Http\Controllers\Admin\Job\JobExperienceController;
use App\Http\Controllers\Admin\Job\JobVacancyController;


use App\Http\Controllers\Front\FrontJobController;



Route::middleware('auth')
     ->prefix('admin/job')
     ->name('admin.job.')
     ->group(function () {

          //Company Route
          Route::get('/company', [CompanyJobController::class, 'index'])->name('company.index');
          Route::get('/company/create', [CompanyJobController::class, 'create'])->name('company.create');
          Route::post('/company/store', [CompanyJobController::class, 'store'])->name('company.store');
          Route::post('/company/delete/{id}', [CompanyJobController::class, 'delete'])->name('company.delete');
          Route::get('/company/edit/{id}', [CompanyJobController::class, 'edit'])->name('company.edit');
          Route::put('/company/update/{id}', [CompanyJobController::class, 'update'])->name('company.update');

          Route::get('company/trash', [CompanyJobController::class, 'trash'])->name('company.trash');
          Route::post('company/restore/{id}', [CompanyJobController::class, 'restore'])->name('company.restore');
          Route::post('company/force-delete/{id}', [CompanyJobController::class, 'forceDelete'])->name('company.forceDelete');

          // Industry Routes
          Route::get('/industry', [IndustryJobController::class, 'index'])->name('industry.index');
          Route::get('/industry/create', [IndustryJobController::class, 'create'])->name('industry.create');
          Route::post('/industry/store', [IndustryJobController::class, 'store'])->name('industry.store');
          Route::post('/industry/delete/{id}', [IndustryJobController::class, 'delete'])->name('industry.delete');
          Route::get('/industry/edit/{id}', [IndustryJobController::class, 'edit'])->name('industry.edit');
          Route::put('/industry/update/{id}', [IndustryJobController::class, 'update'])->name('industry.update');

          Route::get('industry/trash', [IndustryJobController::class, 'trash'])->name('industry.trash');
          Route::post('industry/restore/{id}', [IndustryJobController::class, 'restore'])->name('industry.restore');
          Route::post('industry/force-delete/{id}', [IndustryJobController::class, 'forceDelete'])->name('industry.forceDelete');


          // job Type Routes
          Route::get('/type', [JobTypeController::class, 'index'])->name('type.index');
          Route::get('/type/create', [JobTypeController::class, 'create'])->name('type.create');
          Route::post('/type/store', [JobTypeController::class, 'store'])->name('type.store');
          Route::post('/jobtype/delete/{id}', [JobTypeController::class, 'delete'])->name('type.delete');
          Route::get('/type/edit/{id}', [JobTypeController::class, 'edit'])->name('type.edit');
          Route::put('/type/update/{id}', [JobTypeController::class, 'update'])->name('type.update');

          Route::get('type/trash', [JobTypeController::class, 'trash'])->name('type.trash');
          Route::post('type/restore/{id}', [JobTypeController::class, 'restore'])->name('type.restore');
          Route::post('type/force-delete/{id}', [JobTypeController::class, 'forceDelete'])->name('type.forceDelete');


          // job Country Routes
          Route::get('/country', [JobCountryController::class, 'index'])->name('country.index');
          Route::get('/country/create', [JobCountryController::class, 'create'])->name('country.create');
          Route::post('/country/store', [JobCountryController::class, 'store'])->name('country.store');
          Route::post('/country/delete/{id}', [JobCountryController::class, 'delete'])->name('country.delete');
          Route::get('/country/edit/{id}', [JobCountryController::class, 'edit'])->name('country.edit');
          Route::post('/country/update/{id}', [JobCountryController::class, 'update'])->name('country.update');

          Route::get('country/trash', [JobCountryController::class, 'trash'])->name('country.trash');
          Route::post('country/restore/{id}', [JobCountryController::class, 'restore'])->name('country.restore');
          Route::post('country/force-delete/{id}', [JobCountryController::class, 'forceDelete'])->name('country.forceDelete');



          // job City Routes
          Route::get('/city', [JobCityController::class, 'index'])->name('city.index');
          Route::get('/city/create', [JobCityController::class, 'create'])->name('city.create');
          Route::post('/city/store', [JobCityController::class, 'store'])->name('city.store');
          Route::post('/city/delete/{id}', [JobCityController::class, 'delete'])->name('city.delete');
          Route::get('/city/edit/{id}', [JobCityController::class, 'edit'])->name('city.edit');
          Route::post('/city/update/{id}', [JobCityController::class, 'update'])->name('city.update');

          Route::get('city/trash', [JobCityController::class, 'trash'])->name('city.trash');
          Route::post('city/restore/{id}', [JobCityController::class, 'restore'])->name('city.restore');
          Route::post('city/force-delete/{id}', [JobCityController::class, 'forceDelete'])->name('city.forceDelete');



          // job Experience Routes
          Route::get('/experience', [JobExperienceController::class, 'index'])->name('experience.index');
          Route::get('/experience/create', [JobExperienceController::class, 'create'])->name('experience.create');
          Route::post('/experience/store', [JobExperienceController::class, 'store'])->name('experience.store');
          Route::post('/experience/delete/{id}', [JobExperienceController::class, 'delete'])->name('experience.delete');
          Route::get('/experience/edit/{id}', [JobExperienceController::class, 'edit'])->name('experience.edit');
          Route::put('/experience/update/{id}', [JobExperienceController::class, 'update'])->name('experience.update');

          Route::get('experience/trash', [JobExperienceController::class, 'trash'])->name('experience.trash');
          Route::post('experience/restore/{id}', [JobExperienceController::class, 'restore'])->name('experience.restore');
          Route::post('experience/force-delete/{id}', [JobExperienceController::class, 'forceDelete'])->name('experience.forceDelete');


          // job Experience Routes
          Route::get('/vacancy', [JobVacancyController::class, 'index'])->name('jobvacancy.index');
          Route::get('/vacancy/create', [JobVacancyController::class, 'create'])->name('jobvacancy.create');
          Route::post('/vacancy/store', [JobVacancyController::class, 'store'])->name('jobvacancy.store');
          Route::post('/vacancy/delete/{id}', [JobVacancyController::class, 'delete'])->name('jobvacancy.delete');
          Route::get('/vacancy/edit/{id}', [JobVacancyController::class, 'edit'])->name('jobvacancy.edit');
          Route::put('/vacancy/update/{id}', [JobVacancyController::class, 'update'])->name('jobvacancy.update');

          Route::get('vacancy/trash', [JobVacancyController::class, 'trash'])->name('jobvacancy.trash');
          Route::post('vacancy/restore/{id}', [JobVacancyController::class, 'restore'])->name('jobvacancy.restore');
          Route::post('vacancy/force-delete/{id}', [JobVacancyController::class, 'forceDelete'])->name('jobvacancy.forceDelete');

     });






Route::get('joblist', [FrontJobController::class, 'jobList'])->name('front.job.list');

Route::match(['get', 'post'], '/jobs/search', [FrontJobController::class, 'jobSearch'])
     ->name('front.jobs.search');

Route::post('/apply-job', [FrontJobController::class, 'store'])->name('front.apply.job');



Route::get('job-applicants', [FrontJobController::class, 'jobApplicant'])->name('front.job.applicant');



Route::get('job-detail/{id}', [FrontJobController::class, 'jobDetail'])->name('front.job.detail');