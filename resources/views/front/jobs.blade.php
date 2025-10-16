@extends('front.layouts.master')
@section('title', 'Jobs')

@section('content')

    @include('front.partials.breadcrumb', [
        'title' => 'Jobs',
        'subtitle' => 'Job list',
        'image' => 'front/assets/img/banner/8.png',
    ])



    <div class="home-blog-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Jobs</h4>
                        <h2 class="title split-text">Explore jobs</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                @foreach ($jobs as $job)
                    <div class="col-lg-4 col-md-6 mb-30 ">
                        <div class="home-blog-style-three wow fadeInUp ">
                            <div class="thumb">
                                <img src="{{ asset($job->thumbnail_img) }}" alt="{{$job->title}}">
                                <div class="meta">
                                    <ul>
                                        <li><i class="fas fa-clock"></i> {{ Carbon\Carbon::parse($job->deadline)->format('d-M-Y') }}</li>
                                        <li>{{$job->salary}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info">
                                <div class="inner">
                                    <div class="content">
                                        <h4><a href="{{route('front.job.detail2',$job->slug)}}">{{$job->title}}</a></h4>
                                        {{-- <a class="circle-icon-btn" href="{{route('front.job.detail',$job->slug)}}">
                                            <div class="button-icon">
                                                <img src="assets/img/icon/arrow-up.png" alt="Image Not Found">
                                            </div>
                                            <span>Read More</span>
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Single Item -->

            </div>
        </div>
    </div>
@endsection
