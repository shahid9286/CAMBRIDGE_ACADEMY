<!-- Start Visa Category
    ============================================= -->
<div class="visa-category-area default-padding text-center bg-gray bg-cover"
    style="background-image: url({{ asset('front/assets/img/shape/20.png') }});">
    <div class="shape-top-right">
        <img src="{{ asset('front/assets/img/illustration/4.png') }}" alt="Image Not Found">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="site-heading text-center">
                    <h4 class="sub-title">{{ $page_category->title }}</h4>
                    <h2 class="title split-text">{{ $page_category->description ?? 'Description will appear here...' }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="visa-category-items wow fadeInUp" data-wow-delay="200ms">
                    <!-- Slider main container -->
                    <div class="row">
                        @foreach ($pages as $page)
                            <div class="col-lg-4 col-md-6 mt-4">
                                <div class="visa-cat-style-one">
                                    <div class="thumb">
                                        <img src="{{ asset($page->image) }}" alt="Image Not Found">
                                        <div class="shape">
                                            <img src="{{ asset('front/assets/img/shape/39.png') }}"
                                                alt="Image Not Found">
                                        </div>
                                        <div class="icon">
                                            <img src="{{ asset($page->icon) }}"
                                                alt="Image Not Found">
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h4><a href="{{ route($page->route_name) }}">{{ $page->title }}</a></h4>
                                        <p>
                                            {!! $page->description ?? '' !!}
                                        </p>
                                    </div>
                                    <div class="button">
                                        <a href="{{ route($page->route_name) }}">
                                            <i class="fas fa-angle-right"></i>
                                            <span>See More</span>
                                            <div class="shape"><img src="{{ asset('front/assets/img/shape/40.png') }}"
                                                    alt="Image Not Found"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Visa Category -->
