@if ($feature)
    <div id="country" class="visa-country-two-area default-padding bg-gray bg-cover"
        style="background-image: url(assets/img/shape/banner-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">{{ $feature->title ?? '' }}</h4>
                        <h2 class="title split-text">{{ $feature->subtitle ?? '' }}</h2>
                        <p>{!! $feature->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="country-coverage-two-items wow fadeInUp" data-wow-delay="100ms">
                        <!-- Slider main container -->
                        <div class="country-coverage-carousel swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Single Item -->
                                @foreach ($feature->details as $feature)
                                    <div class="swiper-slide">
                                        <div class="country-coverage-two-item text-center">
                                            <div class="fs-1 mb-2"><img src="{{ asset($feature->icon) }}" width="80px"></div>
                                            <h5><a class="color-primary">{{ $feature->title ?? '' }}</a></h5>
                                            <span>{{ $feature->subtitle ?? '' }}</span>
                                            <p>{{ $feature->description ?? '' }}</p>
                                        </div>
                                    </div>

                                    <!-- End Single Item -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif