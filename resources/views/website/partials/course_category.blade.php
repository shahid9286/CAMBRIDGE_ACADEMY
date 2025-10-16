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
                    <h4 class="sub-title">Our Courses</h4>
                    <h2 class="title split-text">Find the Right Course for You</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="visa-category-items wow fadeInUp" data-wow-delay="200ms">
                    <!-- Slider main container -->
                    <div class="visa-category-carousel swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            @foreach ($categories as $category)
                                <div class="swiper-slide">
                                    <div class="visa-cat-style-one">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/admin/uploads/course_category/' . $category->thumbnail) }}" alt="Image Not Found">
                                            <div class="shape">
                                                <img src="{{ asset('front/assets/img/shape/39.png') }}"
                                                    alt="Image Not Found">
                                            </div>
                                            <div class="icon">
                                                <img src="{{ asset($category->icon ? 'assets/admin/uploads/course_category/' . $category->icon : 'assets/admin/uploads/courses/' . $course->icon) }}" alt="Image Not Found">
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h4><a
                                                    href="{{ route('website.category.wise.courses', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                                            </h4>
                                            <p>
                                                {!! $category->description ?? '' !!}
                                            </p>
                                        </div>
                                        <div class="button">
                                            <a href="{{ route('website.category.wise.courses', ['slug' => $category->slug]) }}">
                                                <i class="fas fa-angle-right"></i>
                                                <span>Detail</span>
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
</div>
<!-- End Visa Category -->