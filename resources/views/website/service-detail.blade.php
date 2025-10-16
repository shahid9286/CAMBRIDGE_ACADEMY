@extends('website.layouts.master')
@section('title', $service->service_title)

@section('content')

    @include('front.partials.breadcrumb', [
        'title' => 'Services',
        'subtitle' => $service->service_title,
        'image' => asset($setting->home_beadcrum_img) ?? asset('front/assets/img/banner/7.jpg'),
    ])


    <div class="services-details-area overflow-hidden py-5">
        <div class="container">
            <div class="services-details-items">
                <div class="row">

                    <div class="col-xl-8 col-lg-7  pl-50 pl-md-15 pl-xs-15">
                        <div class="thumb">
                            <img src="{{ asset($service->banner_image) }}" alt="{{ $service->service_title }}">
                        </div>
                        <h2> {{ $service->service_title }}</h2>
                        <p>
                            {!! $service->description !!}
                        </p>

                        <div class="thumb">
                            <img src="{{ asset($service->thumbnail) }}" alt="{{ $service->service_title }}">
                        </div>

                        <div class="row">
                            <div class="col">
                                <p> {!! $service->description !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar col-xl-4 col-lg-5 col-md-12 mt-md-50 mt-xs-50">
                        <aside>

                            <div class="sidebar-item category">
                                <h4 class="title">category list</h4>
                                <div class="sidebar-info">
                                    <ul>
                                        @foreach ($serviceCategories as $category)
                                            <li>
                                                <a href="#">{{ $category->title }} <span>
                                                        {{ count($category->services) }}</span></a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-item social-sidebar">
                                <h4 class="title">follow us</h4>
                                <div class="sidebar-info">
                                    <ul>
                                        <li class="facebook">
                                            <a href="{{ $setting->fb_link }}">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $setting->insta_link }}">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="linkedin">
                                            <a href="#">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-item widget-brochure">
                                <h4 class="title">Downloads</h4>
                                <ul>
                                    <li><a href="#"><i class="fas fa-file-pdf"></i> Download Course </a></li>
                                </ul>
                            </div>


                            <div class="sidebar-item course-info-widget"
                                style="background-image: url(assets/img/shape/wooden.png);">
                                <h4 class="title">Get Statred With Us</h4>
                                <ul class="course-info-list">
                                    <li><i class="fas fa-phone"></i> {{ $setting->phone_no }}</li>
                                    <li><i class="fas fa-book"></i> {{ $setting->phone_no_2 }}</li>
                                    <li><i class="fas fa-graduation-cap"></i> {{ $setting->email }}</li>
                                    <li><i class="fas fa-briefcase"></i> {{ $setting->address }}</li>
                                </ul>
                            </div>

                        </aside>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Start Visa Category 
    ============================================= -->
    <div class=" mt-10">
        <div class="container">
            <div class="visa-category-four-items wow fadeInUp" data-wow-delay="100ms">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Slider main container -->
                        <div class="visa-category-four-carousel swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Single Item -->
                                   @foreach ($serviceCategories as $category)
                                <div class="swiper-slide hover-active-item">
                                    <div class="visa-cat-style-four">
                                        <div class="thumb">
                                            <img src="http://127.0.0.1:8000/assets/admin/uploads/service/thumbnail/1759049624_thumb.png" alt="Image Not Found">
                                        </div>
                                        <div class="info">
                                            <h4><a href="visa-details.html">{{ $category->title }}</a></h4>
                                            <span>10 Types of visa</span>
                                            <p>
                                                Business visa is a conditional permission provided by a region to a foreigner to enter, stay in, or leave that country.
                                            </p>
                                        </div>
                                        <div class="overlay" style="background-image: url(assets/img/shape/42.png);">
                                            <div class="icon">
                                                <img src="assets/img/icon/business-visa-light-3.png" alt="Image Not Found">
                                            </div>
                                            <h4><a href="visa-details.html">Business Visa</a></h4>
                                            <span>24 Types of visa</span>
                                            <p>
                                                Business visa is a conditional permission provided by a region to a foreigner to enter, stay in, or leave that country.
                                            </p>
                                            <a class="circle-icon-btn" href="visa-details.html">
                                                <div class="button-icon">
                                                    <img src="assets/img/icon/arrow-up.png" alt="Image Not Found">
                                                </div>
                                                <span>Know More</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Single Item -->
                                
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="visa-category-four-navs">
                            <div class="visa-category-four-prev">
                                <svg width="27" height="10" viewBox="0 0 27 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27 9H3L9.9 1" stroke="#ffffff" stroke-width="2"/>
                                </svg>
                            </div>
                            <div class="visa-category-four-next">
                                <svg width="27" height="10" viewBox="0 0 27 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 9H24L17.1 1" stroke="#ffffff" stroke-width="2"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Visa Category -->


@endsection
