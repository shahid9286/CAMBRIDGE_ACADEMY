@extends('front.layouts.master')
@section('title', 'Home Page')

@section('content')

    @include('front.partials.breadcrumb', [
        'title' => 'Contact Us',
        'subtitle' => 'Contact',
        'image' => 'front/assets/img/banner/7.jpg',
    ])

    @include('front.partials.group-companies')
    @include('front.partials.contact-form')

@endsection