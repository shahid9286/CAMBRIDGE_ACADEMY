<div id="services" class="visa-category-three-area default-padding half-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="site-heading text-center">
                    <h4 class="sub-title">Our Featured Courses</h4>
                    <h2 class="title split-text">Dicover our Featured Courses</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="visa-category-three-items wow fadeInUp" data-wow-delay="100ms">
            <div class="row">
                @foreach ($courses->where('status', 1) as $course)
                    <div class="col-md-4">
                        <div class="visa-cat-style-three">
                            <div class="thumb">
                                <img src="{{ asset('assets/admin/uploads/courses/' . $course->image) }}" alt="Image Not Found">
                            </div>
                            <div class="info">
                                <div class="top">
                                    <div class="icon">
                                        <img src="{{ asset($course->icon ? 'assets/admin/uploads/courses/' . $course->icon : 'website/assets/img/static/1.jpg') }}" alt="Image Not Found">
                                    </div>
                                    <h4><a href="{{ route('website.course.detail', ['slug' => $course->slug]) }}">{{ $course->title }}</a></h4>
                                </div>
                                <p>
                                    {!! $course->content !!}
                                </p>
                                <a class="circle-icon-btn" href="{{ route('website.course.detail', ['slug' => $course->slug]) }}">
                                    <div class="button-icon">
                                        <img src="{{ asset('website/assets/img/icon/arrow-up.png') }}"
                                            alt="Image Not Found">
                                    </div>
                                    <span>Know More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>