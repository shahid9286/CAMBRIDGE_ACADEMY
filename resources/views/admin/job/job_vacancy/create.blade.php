@extends('admin.layouts.master')
@section('title', 'Create Job Vacancy')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title text-primary">
                            <i class="fas fa-plus-circle"></i> Add Job Vacancy
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.job.jobvacancy.index') }}" class="btn btn-sm btn-primary" title="Back to List">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('admin.job.jobvacancy.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body py-3">
                            <div class="row">

                                <!-- Company -->
                                <div class="col-md-4 mb-3">
                                    <label>Company <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        <select name="company_jobs_id" class="form-control form-control-sm" required>
                                            <option value="">-- Select Company --</option>
                                            @foreach ($companyjobs as $company)
                                                <option value="{{ $company->id }}" {{ old('company_jobs_id') == $company->id ? 'selected' : '' }}>
                                                    {{ $company->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('company_jobs_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Job Type -->
                                <div class="col-md-4 mb-3">
                                    <label>Job Type <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        <select name="job_types_id" class="form-control form-control-sm" required>
                                            <option value="">-- Select Job Type --</option>
                                            @foreach ($jobtypes as $jobtype)
                                                <option value="{{ $jobtype->id }}" {{ old('job_types_id') == $jobtype->id ? 'selected' : '' }}>
                                                    {{ $jobtype->title ?? $jobtype->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('job_types_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Industry -->
                                <div class="col-md-4 mb-3">
                                    <label>Industry <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                        <select name="industry_jobs_id" class="form-control form-control-sm" required>
                                            <option value="">-- Select Industry --</option>
                                            @foreach ($industryjobs as $industry)
                                                <option value="{{ $industry->id }}" {{ old('industry_jobs_id') == $industry->id ? 'selected' : '' }}>
                                                    {{ $industry->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('industry_jobs_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- City -->
                                <div class="col-md-4 mb-3">
                                    <label>City <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        <select name="job_cities_id" class="form-control form-control-sm" required>
                                            <option value="">-- Select City --</option>
                                            @foreach ($jobcities as $city)
                                                <option value="{{ $city->id }}" {{ old('job_cities_id') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('job_cities_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Country -->
                                <div class="col-md-4 mb-3">
                                    <label>Country <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        <select name="job_countries_id" class="form-control form-control-sm" required>
                                            <option value="">-- Select Country --</option>
                                            @foreach ($jobcountries as $country)
                                                <option value="{{ $country->id }}" {{ old('job_countries_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('job_countries_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Experience -->
                                <div class="col-md-4 mb-3">
                                    <label>Experience <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                        <select name="job_experiences_id" class="form-control form-control-sm" required>
                                            <option value="">-- Select Experience --</option>
                                            @foreach ($jobexperiences as $experience)
                                                <option value="{{ $experience->id }}" {{ old('job_experiences_id') == $experience->id ? 'selected' : '' }}>
                                                    {{ $experience->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('job_experiences_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Job Title -->
                                <div class="col-md-4 mb-3">
                                    <label>Job Title <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-sm" required>
                                    </div>
                                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Thumbnail -->
                                <div class="col-md-4 mb-3">
                                    <label>Thumbnail</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        <input type="file" name="thumbnail" class="form-control form-control-sm">
                                    </div>
                                    @error('thumbnail') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Gender -->
                                <div class="col-md-4 mb-3">
                                    <label>Gender <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        <select name="gender" class="form-control form-control-sm" required>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="both" {{ old('gender') == 'both' ? 'selected' : '' }}>Both</option>
                                        </select>
                                    </div>
                                    @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Age -->
                                <div class="col-md-4 mb-3">
                                    <label>Min Age</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="number" name="min_age" value="{{ old('min_age') }}" class="form-control form-control-sm">
                                    </div>
                                    @error('min_age') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Max Age</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="number" name="max_age" value="{{ old('max_age') }}" class="form-control form-control-sm">
                                    </div>
                                    @error('max_age') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Vacancies -->
                                <div class="col-md-4 mb-3">
                                    <label>Vacancies <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        <input type="number" name="job_vacancy" value="{{ old('job_vacancy') }}" class="form-control form-control-sm" required>
                                    </div>
                                    @error('job_vacancy') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Salary -->
                                <div class="col-md-4 mb-3">
                                    <label>Salary Min</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        <input type="number" step="0.01" name="salary_min" value="{{ old('salary_min') }}" class="form-control form-control-sm">
                                    </div>
                                    @error('salary_min') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Salary Max</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        <input type="number" step="0.01" name="salary_max" value="{{ old('salary_max') }}" class="form-control form-control-sm">
                                    </div>
                                    @error('salary_max') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Contact -->
                                <div class="col-md-4 mb-3">
                                    <label>Email</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-sm">
                                    </div>
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Contact No</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="text" name="contact_no" value="{{ old('contact_no') }}" class="form-control form-control-sm">
                                    </div>
                                    @error('contact_no') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>WhatsApp No</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fab fa-whatsapp text-success"></i></span>
                                        <input type="text" name="whatsapp_no" value="{{ old('whatsapp_no') }}" class="form-control form-control-sm">
                                    </div>
                                    @error('whatsapp_no') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Website</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                        <input type="url" name="website" value="{{ old('website') }}" class="form-control form-control-sm">
                                    </div>
                                    @error('website') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Location</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" name="location" value="{{ old('location') }}" class="form-control form-control-sm">
                                    </div>
                                    @error('location') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Dates -->
                                <div class="col-md-4 mb-3">
                                    <label>Post Date <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date" name="post_date" value="{{ old('post_date') }}" class="form-control form-control-sm" required>
                                    </div>
                                    @error('post_date') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Deadline <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-calendar-times"></i></span>
                                        <input type="date" name="deadline" value="{{ old('deadline') }}" class="form-control form-control-sm" required>
                                    </div>
                                    @error('deadline') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label>Description <span class="text-danger">*</span></label>
                                        <textarea name="description" rows="3" class="form-control form-control-sm summernote" required>{{ old('description') }}</textarea>
                                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Job Details -->
                                <div class="col-md-12 mb-3">
                                    <label>Job Details <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                        <textarea name="job_details" rows="5" class="form-control form-control-sm" required>{{ old('job_details') }}</textarea>
                                    </div>
                                    @error('job_details') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <!-- Active -->
                                <div class="col-md-12 mb-3">
                                    <label>Status</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        <select name="is_active" class="form-control form-control-sm">
                                            <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Save
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
