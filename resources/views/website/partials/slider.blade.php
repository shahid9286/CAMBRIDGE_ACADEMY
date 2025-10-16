<!-- Start Banner Area
    ============================================= -->
<div class="banner-area banner-style-three navigation-circle overflow-hidden text-light auto-height">

    <!-- Slider main container -->
    <div class="banner-fade">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">

            @foreach ($sliders as $slider)
                <!-- Single Item -->
                <div class="swiper-slide banner-style-three shadow-left">
                    <div class="item bg-cover" style="background: url({{ asset($slider->image) }});">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-7">
                                    <div class="content">
                                        <h2>{{ $slider->title }}</h2>
                                        <p>
                                            {{ $slider->sub_title }}
                                        </p>
                                        <div class="button">
                                            <a href="{{ $slider->button_url }}" class="btn-style-one circle">{{ $slider->button_title }}
                                                <span></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            @endforeach

        </div>

        <!-- Navigation -->
        <div class="banner-prev-nav">
            <svg width="27" height="10" viewBox="0 0 27 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27 9H3L9.9 1" stroke="#ffffff" stroke-width="2"></path>
            </svg>
        </div>
        <div class="banner-next-nav">
            <svg width="27" height="10" viewBox="0 0 27 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 9H24L17.1 1" stroke="#ffffff" stroke-width="2"></path>
            </svg>
        </div>

    </div>

</div>
<!-- End Banner -->
