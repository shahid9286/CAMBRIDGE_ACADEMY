@extends('front.layouts.master')
@section('title', 'Home Page')

@section('content')

    @include('front.partials.breadcrumb', [
        'title' => 'About Us',
        'subtitle' => 'About',
        'image' => 'front/assets/img/banner/7.jpg',
    ])

    @include('front.partials.about2')

    @include('front.partials.visa-steps')
    
    @include('front.partials.why_choose_us')

    @include('front.partials.our-members')

@endsection