@extends('front.layouts.master')
@section('title', 'Home Page')

@section('content')

    <!-- Start Banner Area
                ============================================= -->
    @include('front.partials.slider')
    <!-- End Banner -->

    <!-- Start About
                ============================================= -->
    @include('front.partials.about1')

    <!-- End About -->
 @include('front.partials.feature-section', [
        'image' => asset('front/assets/img/feature-service-1.jpg'),
        'classes' => 'my-5',
        'url' => route('front.contactus'),
    ])
    <!-- Start Visa Category
                ============================================= -->

    @include('front.partials.visa_services')

    @include('front.partials.business_services')

    @include('front.partials.manpower_services')

    {{-- @include('front.partials.featured-service') --}}

   
        <!-- End Visa Category -->
        @include('front.partials.why_choose_us')
        @include('front.partials.contact-1')
    <!-- Start Why Choose Us
                ============================================= -->
    @include('front.partials.feature-section', [
        'image' => asset('front/assets/img/feature-service-2.jpg'),
        'classes' => 'my-5',
        'url' => route('front.contactus'),
    ])
    
      @include('front.partials.group-companies')
        <!-- End Why Choose Us  -->
    <!-- Start Faq
                ============================================= -->
    @include('front.partials.FAQ')

    <!-- End Faq  -->

        <!-- Start Call to action
                ============================================= -->
        @include('front.partials.cta')

        <!-- End Call to action  -->

        @include('front.partials.our-members')


@endsection