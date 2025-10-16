@extends('website.layouts.master')
@section('title', 'Blog | '. $blog->title)

@section('content')

    @include('front.blog.partials.breadcrumb')

    @include('front.blog.partials.body')

    @include('front.blog.partials.other-sections')

@endsection
