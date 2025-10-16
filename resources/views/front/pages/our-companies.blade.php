@extends('front.layouts.master')
@section('title','Our Companies')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    @include('front.partials.breadcrumb', [
        'title' => 'Our Companies',
        'subtitle' => 'Companies',
        'image' => 'front/assets/img/banner/7.jpg',
    ])

    @include('front.partials.about1')
    @include('front.partials.group-companies')
    {{-- @include('front.partials.companies') --}}
    @include('front.partials.industries-we-serve')
    @include('front.partials.testimonial')
    @include('front.partials.cta')

@endsection