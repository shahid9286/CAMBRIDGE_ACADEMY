@extends('website.layouts.master')
@section('title', $category->title . '')

@section('content')

    @include('website.partials.breadcrumb', [
        'title' => $category->title . '',
        'subtitle' => $category->title . '',
        'image' => $setting->home_beadcrum_img ?? 'website/assets/img/banner/4.jpg',
    ])

<div id="services" class="visa-category-three-area default-padding half-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="site-heading text-center">
                    <h4 class="sub-title">{{ $category->title }}</h4>
                    <h2 class="title split-text">Dicover {{ $category->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="visa-category-three-items wow fadeInUp" data-wow-delay="100ms">
            <div class="row">
                @foreach ($category_wise_courses as $course)
                    <div class="col-md-4">
                        <div class="visa-cat-style-three">
                            <div class="thumb">
                                <img src="{{ asset('assets/admin/uploads/courses/' . $course->image) }}" alt="Image Not Found">
                            </div>
                            <div class="info p-4">
                                <div class="top mb-0">
                                    <h5><a href="{{ route('website.course.detail', ['slug' => $course->slug]) }}">{{ $course->title }}</a></h5>
                                </div>
                                <a class="circle-icon-btn" href="{{ route('website.course.detail', ['slug' => $course->slug]) }}">
                                    <div class="button-icon">
                                        <img src="{{ asset('website/assets/img/icon/arrow-up.png') }}"
                                            alt="Image Not Found">
                                    </div>
                                    <span>Know More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
