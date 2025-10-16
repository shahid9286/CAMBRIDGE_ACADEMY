@extends('website.layouts.master')
@section('title', 'Home')

@section('content')
    @include('website.partials.slider')
    @include('website.partials.about2')
    @include('website.partials.university-pathways')
    @include('website.partials.professional-courses')
    @include('website.partials.short-courses')
    @include('website.partials.featured-courses')
    @include('website.partials.course_category')
    @include('website.partials.why_choose_us')
    
    @include('website.partials.testimonial')
    @include('website.partials.FAQ')
    @include('website.partials.blog')
@endsection

