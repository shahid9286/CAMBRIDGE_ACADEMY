@php
    $section_title = $page->sectionTitles()->where('type', 'testimonial')->where('status', 'active')->first();
    $testimonials = $page->testimonials()->where('status', 'active')->orderBy('order_no', 'ASC')->get();
@endphp
@if ($testimonials->isNotEmpty())
    <div class="testimonial-style-three-area default-padding bg-gradient-minimal">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="testimonial-three-thumb">
                        <img src="{{ asset('front/assets/img/thumb/4.jpg') }}" alt="Image Not Found">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="testimoial-style-three-items">
                        <div class="site-heading">
                            <h4 class="sub-title">{{ $section_title->title }}</h4>
                            <h2 class="title split-text">{{ $section_title->subtitle }}</h2>
                        </div>
                        <!-- Slider main container -->
                        <div class="testimonial-style-three-carousel swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="testimonial-style-three-item">
                                            <div class="quote">
                                                <img src="{{ asset('front/assets/img/icon/quote.png') }}" alt="Image Not Found">
                                            </div>
                                            <div class="info">
                                                
                                                <div class="provider-details">
                                                    <div class="thumb">
                                                        <img src="{{ asset($testimonial->image) }}" alt="Image Not Found">
                                                    </div>
                                                    <div class="content">
                                                        <h4>{{ $testimonial->name }}</h4>
                                                        <span>{{ $testimonial->designation }}</span>
                                                    </div>
                                                </div>
                                                <p class="m-0 mt-4">
                                                    {{ $testimonial->feedback }}
                                                </p>
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
