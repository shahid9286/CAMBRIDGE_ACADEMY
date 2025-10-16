@extends('website.layouts.master')
@section('title', $course->title)

@section('content')

    @include('website.blog.partials.breadcrumb')

    @include('website.blog.partials.other-sections')

    @include('website.partials.page.applynow')
        
@endsection