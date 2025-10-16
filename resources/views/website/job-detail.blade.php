@extends('website.layouts.master')
@section('title', $job->title)

@section('content')

    @include('front.partials.breadcrumb', [
        'title' => 'Jobs',
        'subtitle' => $job->title,
        'image' => asset($setting->home_beadcrum_img) ?? 'front/assets/img/banner/7.jpg',
    ])


    <div class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Jobs</h4>
                        <h2 class="title split-text">{{ $job->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                        <img src="{{ asset($job->banner_img) }}" alt="" class="img-fluid"/> 
                </div>
            </div>
        </div>
    </div>


     <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
               
                    <!-- Image Left -->
                    <div class="col-lg-7">
                        <div>
                            <h4 class="sub-title">{{ $job->title ?? '' }}</h4>
                            <h2 class="title split-text">{{ $job->position ?? '' }}</h2>
                            <p class="mb-0">{!! $job->responsibility ?? '' !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <img src="{{ asset($job->thumbnail_img) }}" class="img-fluid rounded shadow" alt="Section Image">
                    </div>
          
            </div>
        </div>
    </section>

    <!-- Start Appoinement
    ============================================= -->
<div class="appoinment-style-one-area default-padding appoinment-page">
    <div class="container">
        <div class="row align-center">
            <div class="col-xl-6 offset-xl-1 order-lg-last">
                <div class="appoinment-style-one-info">
                    <form action="{{ route('website.contactus.store') }}" method="POST" id="contactForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="id">Full Name</label>
                                    <div class="input-group">
                                        <input class="form-control" id="for" name="name" placeholder="Enter Full Name"
                                            type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label id="phone">Phone</label>
                                    <div class="input-group">
                                        <input class="form-control" id="phone" name="phone_no"
                                            placeholder="Phone Number" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <div class="input-group">
                                        <input class="form-control" id="email" name="email"
                                            placeholder="info@someone.com" type="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email">Job Title</label>
                                    <div class="input-group">
                                        <input class="form-control" id="email" name="subject"
                                            placeholder="Enter Job title Name" value="{{$job->title}}"  type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="enquiry_message">Detail</label>
                                    <div class="input-group">
                                        <textarea name="enquiry_message" class="form-control" id="enquiry_message"
                                            rows="10"></textarea>
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
                        <!-- Alert Message -->
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
    </div>
</div>
<!-- End Appoinement -->


@endsection
