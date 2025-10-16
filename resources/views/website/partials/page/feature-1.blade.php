@php
    $section_title = $page->sectionTitles()->where('type', 'feature')->where('status', 'active')->first();
    $features = $page->features()->where('status', 'active')->orderBy('order_no', 'ASC')->get();
@endphp
@if ($features->isNotEmpty())
    <div id="country" class="visa-country-two-area default-padding bg-gray bg-cover"
        style="background-image: url(assets/img/shape/banner-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">{{ $section_title->title ?? '' }}</h4>
                        <h2 class="title split-text">{{ $section_title->subtitle ?? '' }}</h2>
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
                                @foreach ($features as $feature)
                                    <div class="swiper-slide">
                                        <div class="country-coverage-two-item text-center">
                                            <div class="fs-1 mb-2"><img src="{{ asset($feature->icon) }}" width="80px"></div>
                                            <h5><a href="country-details.html">{{ $feature->title ?? '' }}</a></h5>
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
