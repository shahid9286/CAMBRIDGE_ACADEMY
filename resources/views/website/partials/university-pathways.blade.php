@php
    $university_courses = optional(
        App\Models\CourseCategory::where('slug', 'university-pathways')->first()
    )->courses ?? collect();
@endphp
@if ($university_courses->isNotEmpty())
    <div id="coaching" class="course-style-one-area default-padding-top mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">University Pathways</h4>
                        <h2 class="title split-text">Discover University Pathways Courses</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="visa-category-items wow fadeInUp" data-wow-delay="200ms">
                        <!-- Slider main container -->
                        <div class="visa-course-carousel swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach ($university_courses->where('status', 1) as $course)
                                    <div class="swiper-slide">
                                        <div class="visa-cat-style-one">
                                            <div class="thumb">
                                                <img src="{{ asset('assets/admin/uploads/courses/' . $course->image) }}"
                                                    alt="Image Not Found">
                                                <div class="shape">
                                                    <img src="{{ asset('front/assets/img/shape/39.png') }}"
                                                        alt="Image Not Found">
                                                </div>
                                                <div class="icon">
                                                    <img src="{{ asset($course->icon ? 'assets/admin/uploads/courses/' . $course->icon : 'website/assets/img/static/1.jpg') }}"
                                                        alt="Image Not Found">
                                                </div>
                                            </div>
                                            <div class="info">
                                                <h4><a
                                                        href="{{ route('website.course.detail', ['slug' => $course->slug]) }}">{{ $course->title }}</a>
                                                </h4>
                                            </div>
                                            <div class="button text-center">
                                                <a href="{{ route('website.course.detail', ['slug' => $course->slug]) }}">
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
@endif