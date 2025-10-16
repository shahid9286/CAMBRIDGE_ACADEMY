@extends('front.layouts.master')
@section('title', $job->title)

@section('content')

    @include('front.partials.breadcrumb', [
        'title' => 'Jobs',
        'subtitle' => $job->title,
        'image' =>'front/assets/img/banner/8.png',
    ])


    <div class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="site-heading text-center">
                        <h4 class="sub-title mt-5">Jobs</h4>
                        <h2 class="title split-text">{{ $job->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container">
            <div class="row">
                <div class="col">
                        <img src="{{ asset($job->banner_img) }}" alt="" class="img-fluid"/> 
                </div>
            </div>
        </div> --}}
    </div>


     <div class="blog-area full-blog mt-0">
    <div class="container">
        <div class="blog-items">
            <div class="row">

                <!-- Job Detail Content -->
                <div class="blog-content col-xl-8 col-lg-7 col-md-12 pr-35 pr-md-15 pl-md-15 pr-xs-15 pl-xs-15">
                    <div class="blog-item-box">

                        <!-- Job Detail Card -->
                        <div class="item shadow-sm rounded bg-white p-4">
                            <div class="thumb mb-3">
                                <img src="{{ asset($job->banner_img ?? $job->thumbnail_img) }}" class="img-fluid rounded" alt="{{ $job->title }}">
                            </div>

                            <div class="info">
                                <div class="meta mb-3">
                                    <ul class="list-inline">
                                        {{-- <li class="list-inline-item">
                                            <i class="far fa-calendar-alt me-1 text-primary"></i>
                                            Posted: {{ $job->created_at->format('M d, Y') }}
                                        </li> --}}
                                        <li class="list-inline-item">
                                            <i class="fas fa-briefcase me-1 text-danger"></i>
                                            {{ $job->employment_status ?? 'Full Time' }}
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="fas fa-map-marker-alt me-1 text-danger"></i>
                                            {{ $job->job_location ?? 'N/A' }}
                                        </li>
                                    </ul>
                                </div>

                                <h2 class="fw-bold text-dark">{{ $job->title ?? 'Untitled Position' }}</h2>
                                <h5 class="text-danger mb-3">{{ $job->company_name ?? 'Company Name' }}</h5>

                                <div class="d-flex flex-wrap mb-4">
                                    <span class="badge bg-primary me-2 mb-2"><i class="fas fa-users me-1"></i> Vacancy: {{ $job->vacancy ?? '1' }}</span>
                                    <span class="badge bg-info me-2 mb-2"><i class="fas fa-money-bill-wave me-1"></i> Salary: {{ $job->salary ?? 'Negotiable' }}</span>
                                    <span class="badge bg-warning text-dark me-2 mb-2"><i class="fas fa-calendar-alt me-1"></i> Deadline: {{ $job->deadline ? \Carbon\Carbon::parse($job->deadline)->format('M d, Y') : 'N/A' }}</span>
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <h4 class="fw-semibold text-dark mb-2">Job Responsibilities</h4>
                                    <p>{!! $job->job_responsibility ?? 'Not provided.' !!}</p>
                                </div>

                                @if($job->education_requirement)
                                    <div class="mb-4">
                                        <h4 class="fw-semibold text-dark mb-2">Education Requirements</h4>
                                        <p>{!! $job->education_requirement !!}</p>
                                    </div>
                                @endif

                                @if($job->experience_requirement)
                                    <div class="mb-4">
                                        <h4 class="fw-semibold text-dark mb-2">Experience Requirements</h4>
                                        <p>{!! $job->experience_requirement !!}</p>
                                    </div>
                                @endif

                                

                                <!-- Apply Button -->
                                <a href="#to-apply" class="btn btn-danger mt-3">
                                    <i class="fas fa-paper-plane me-1"></i> Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="sidebar col-xl-4 col-lg-5 col-md-12 mt-md-50 mt-xs-50">
                    <aside>

                        <!-- Job Summary -->
                        <div  id="to-apply" class="sidebar-item recent-post bg-light rounded p-4 shadow-sm mb-4">
                            <h4 class="title mb-3 text-dark fw-semibold">Job Summary</h4>
                            <ul class="list-unstyled mb-0 text-dark">
                                <li class="text-dark"><i class="far fa-id-badge me-2 text-danger"></i> Job ID: {{ $job->id }}</li>
                                <li class="text-dark"><i class="fas fa-layer-group me-2 text-danger"></i> Category: <span class="fw-bolder"> {{ $job->jcategory->name ?? 'N/A' }}</span></li>
                                {{-- <li><i class="far fa-calendar-check me-2 text-danger"></i> Posted On: {{ $job->created_at->format('M d, Y') }}</li> --}}
                                <li class="text-dark"><i class="fas fa-toggle-on me-2 text-danger"></i> Status:
                                    <span class="badge bg-{{ $job->status ? 'success' : 'secondary' }}">
                                        {{ $job->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <!-- Quick Apply Card -->
                        <div id="apply-form" class="sidebar-item bg-light rounded p-4 shadow-sm">
                            <h4 class="title mb-3 text-dark fw-semibold">Apply for this Job</h4>
                            <form action="{{ route('admin.job-candidate.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="subject" value="{{ $job->title }}">

                                <div class="form-group mb-3">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>

                                {{-- Hidden job ID --}}
                                <input type="hidden" name="job_id" value="{{ $job->id }}">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="job_title">Job Title</label>
                                            <div class="input-group">
                                                <input class="form-control" id="job_title" name="subject" value="{{ $job->title }}" readonly type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="resume">Upload Resume (PDF, DOC, DOCX)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text p-1 px-2">
                                        <i class="fas fa-file-upload"></i>
                                        </span> 
                                        <input type="file" class="form-control form-control-sm" name="resume">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Cover Letter</label>
                                    <textarea name="cover_letter" rows="3" class="form-control"></textarea>
                                </div>

                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fas fa-paper-plane me-1"></i> Submit Application
                                </button>
                                <div class="col-lg-12 alert-notification">
                                    <div id="message" class="alert-msg"></div>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-item recent-post bg-light rounded p-4 shadow-sm mb-4">
                            @if($job->other_benefits)
                                    <div class="mb-4">
                                        <h4 class="fw-semibold text-dark mb-2">Other Benefits</h4>
                                        <p>{!! $job->other_benefits !!}</p>
                                    </div>
                                @endif
                        </div>

                    </aside>
                </div>

            </div>
        </div>
    </div>
</div>


    <!-- Start Appoinement
    ============================================= -->
    {{-- <div class="appoinment-style-one-area default-padding appoinment-page">
        <div class="container">
            <div class="row align-center">
                <div class="col-xl-6 offset-xl-1 order-lg-last">
        <div class="appoinment-style-one-info">
            <form action="{{ route('admin.job-candidate.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <div class="input-group">
                                <input class="form-control" id="name" name="name" placeholder="Enter Full Name" type="text" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <div class="input-group">
                                <input class="form-control" id="phone" name="phone" placeholder="Phone Number" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <div class="input-group">
                                <input class="form-control" id="email" name="email" placeholder="info@someone.com" type="email" required>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="job_id" value="{{ $job->id }}">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="job_title">Job Title</label>
                            <div class="input-group">
                                <input class="form-control" id="job_title" name="subject" value="{{ $job->title }}" readonly type="text">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="resume">Upload Resume (PDF, DOC, DOCX)</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text p-1 px-2">
                                <i class="fas fa-file-upload"></i>
                                </span>
                                <input type="file" class="form-control form-control-sm" name="resume">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="cover_letter">Cover Letter</label>
                            <div class="input-group">
                                <textarea name="cover_letter" id="cover_letter" class="form-control" rows="5" placeholder="Write your cover letter..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="enquiry_message">Additional Details</label>
                            <div class="input-group">
                                <textarea name="enquiry_message" class="form-control" id="enquiry_message" rows="5" placeholder="Optional additional message..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn-style-one" type="submit" name="submit" id="submit">
                            Submit Request
                            <span></span>
                        </button>
                    </div>
                </div>

                <div class="col-lg-12 alert-notification">
                    <div id="message" class="alert-msg"></div>
                </div>
            </form>
        </div>
    </div>

            <div class="col-xl-5">
                <div class="appoinment-style-two-thumb">
                    <div class="thumb-inner">
                        <img src="{{ asset('website/assets/img/illustration/11.png') }}" alt="Image Not Found">
                    </div>
                    <div class="fun-fact">
                        <div class="counter">
                            <div class="timer" data-to="20" data-speed="1000">1</div>
                        </div>
                        <h4>Years of Experience</h4>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<!-- End Appoinement -->



@endsection
