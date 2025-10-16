@extends('job-portal.layouts.master')
@section('title', 'Job list')


@section('content')
    <section class="section-box mt-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                    <div class="box-border-single">
                        <div class="row mt-10">
                            <div class="col-lg-8 col-md-12">
                                <h3>{{ $job->title }}</h3>
                                <div class="mt-0 mb-15"><span class="card-briefcase">{{ $job->jobtype->title }}</span><span
                                        class="card-time">{{ $job->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 text-lg-end">
                                @if ($job->deadline->isFuture())
                                    <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal"
                                        data-bs-target="#ModalApplyJobForm" data-job-id="{{ $job->id }}">
                                        Apply now
                                    </div>
                                @else
                                    <div class="alert alert-warning mt-2 text-center">
                                        Application deadline has passed
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="border-bottom pt-10 pb-10"></div>
                        <div class="banner-hero banner-image-single mt-10 mb-20"><img src="{{ asset($job->thumbnail) }}"
                                alt="jobBox"></div>
                        <div class="job-overview">
                            <h5 class="border-bottom pb-15 mb-30">Overview</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('jobportal/assets/imgs/page/job-single/industry.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description industry-icon mb-10">Industry</span><strong
                                            class="small-heading">{{ $job->company->name ?? 'N/A' }} </strong></div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('jobportal/assets/imgs/page/job-single/job-level.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description joblevel-icon mb-10">Job level</span><strong
                                            class="small-heading">Experienced ()</strong></div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('jobportal/assets/imgs/page/job-single/salary.svg') }}"
                                            alt="jobBox">
                                    </div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description salary-icon mb-10">Salary</span><strong
                                            class="small-heading">${{ $job->salary_min }} -
                                            ${{ $job->salary_max }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('jobportal/assets/imgs/page/job-single/experience.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description experience-icon mb-10">Experience</span><strong
                                            class="small-heading">{{ $job->experience->title ?? 'N/A' }}</strong></div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('jobportal/assets/imgs/page/job-single/job-type.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description jobtype-icon mb-10">Job type</span><strong
                                            class="small-heading">{{ $job->jobType->title ?? 'N/A' }}</strong></div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('jobportal/assets/imgs/page/job-single/deadline.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description mb-10">Deadline</span><strong
                                            class="small-heading">{{ $job->deadline->format('d M Y') }}</strong></div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('jobportal/assets/imgs/page/job-single/updated.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description jobtype-icon mb-10">Updated</span><strong
                                            class="small-heading">{{ $job->updated_at->format('d M Y') }}</strong></div>
                                </div>
                                <div class="col-md-6 d-flex mt-sm-15">
                                    <div class="sidebar-icon-item"><img
                                            src="{{ asset('jobportal/assets/imgs/page/job-single/location.svg') }}"
                                            alt="jobBox"></div>
                                    <div class="sidebar-text-info ml-10"><span
                                            class="text-description mb-10">Location</span><strong
                                            class="small-heading">{{ $job->country->name }},{{ $job->city->name }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-single">
                            <h4>Welcome to AliStudio Team</h4>
                            {!! $job->job_details !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
