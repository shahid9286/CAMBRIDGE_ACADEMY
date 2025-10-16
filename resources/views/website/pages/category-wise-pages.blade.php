@extends('front.layouts.master')
@section('title', 'Home Page')

@section('content')

    @include('front.partials.hero')

    @include('front.partials.category-wise-pages')

@endsection