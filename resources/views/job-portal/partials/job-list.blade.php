<div class="row display-list">
    @forelse($jobs as $job)
    <div class="col-xl-12 col-12">
        <div class="card-grid-2 hover-up"><span class="flash"></span>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card-grid-2-image-left">
                        <div class="image-box"><img style="width: 40px;height:40px;" src="{{ asset($job->industry->logo) }}" alt="jobBox"></div>
                        <div class="right-info"><a class="name-job" href="">{{ $job->industry->name }}</a><span class="location-small">{{ $job->location }}</span></div>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                    {{-- <div class="pl-15 mb-15 mt-30">
                        @foreach($job->skills as $skill)
                        <a class="btn btn-grey-small mr-5" href="#">{{ $skill }}</a>
                        @endforeach
                    </div> --}}
                </div>
            </div>
            <div class="card-block-info">
                <h4><a href="{{ route('front.job.detail', $job->id) }}">{{ $job->title }}</a></h4>
                <div class="mt-5">
                    <span class="card-briefcase">{{ $job->jobtype->title }}</span>
                    <span class="card-time"><span>{{ $job->created_at->diffForHumans() }}</span>
                </div>
                <p class="font-sm color-text-paragraph mt-10">{{ Str::limit($job->description, 150) }}</p>
                <div class="card-2-bottom mt-20">
                    <div class="row">
                        <div class="col-lg-7 col-7">
                            <span class="card-text-price">${{ number_format($job->salary_max) }}</span>
                            <span class="text-muted">/Year</span>
                        </div>
                        {{-- <div class="col-lg-5 col-5 text-end">
                            <div class="btn btn-apply-now" data-bs-target="#ModalApplyJobForm" data-job-id="{{ $job->id }}">Apply now</div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info">No jobs found matching your criteria.</div>
    </div>
    @endforelse
</div>