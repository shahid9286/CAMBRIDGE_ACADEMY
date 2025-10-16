@extends('website.layouts.master')
@section('title', 'Apply Now')

@section('content')

    @include('website.partials.breadcrumb', [
        'title' => 'Apply Now',
        'subtitle' => 'Apply now',
        'image' => $setting->home_beadcrum_img ?? 'website/assets/img/banner/4.jpg',
    ])

        @include('website.partials.page.applynow')

  @endsection
