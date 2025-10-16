@extends('website.layouts.master')
@section('title', 'About Us')

@section('content')

    @include('website.partials.breadcrumb', [
        'title' => 'About Us',
        'subtitle' => 'About',
        'image' => $setting->home_beadcrum_img ?? 'website/assets/img/banner/4.jpg',
    ])

    @include('website.partials.about3')
    
    @include('website.partials.why_choose_us_about')

    @include('website.partials.our-members')
    
    @include('website.partials.contact-form')

@endsection