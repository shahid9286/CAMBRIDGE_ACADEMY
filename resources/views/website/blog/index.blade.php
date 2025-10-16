@extends('website.layouts.master')
@section('title', 'Blog')

@section('content')

    @include('website.partials.breadcrumb', [
        'title' => 'Blogs',
        'subtitle' => 'Blogs',
        'image' => $setting->home_beadcrum_img ?? 'website/assets/img/banner/4.jpg',
    ])

    <div class="blog-area home-blog blog-grid bg-gray default-padding">
        <div class="container">
            <div class="blog-item-box">
                <div class="row gutter-lg">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-6 col-md-6 mb-50">
                            <div class="home-blog-style-one wow fadeInUp">
                                <div class="thumb">
                                    <img src="{{ asset('assets/front/img/blog/' . $blog->image) }}" alt="Image Not Found">
                                </div>
                                <div class="info">
                                    <div class="inner">
                                        <div class="meta">
                                            <div class="date">
                                                <strong>{{ $blog->created_at->format('d') }}</strong> {{ $blog->created_at->format('M') }}
                                            </div>
                                        </div>
                                        <div class="content p-4">
                                            <h4><a href="{{ route('front.blog.detail', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h4>
                                            <a href="{{ route('front.blog.detail', ['slug' => $blog->slug]) }}" class="btn-regular">
                                                Read More
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 17L17 1H7.8" stroke="#232323" stroke-width="2"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
