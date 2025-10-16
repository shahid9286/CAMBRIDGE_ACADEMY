@extends('front.layouts.master')
@section('title', 'Home Page')

@section('content')

    @include('front.blog.partials.breadcrumb')

    @include('front.blog.partials.body')

    @include('front.blog.partials.other-sections')

@endsection
