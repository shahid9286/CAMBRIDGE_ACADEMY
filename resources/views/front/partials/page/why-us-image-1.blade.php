@php
    $why_us_images = $page->whyUsImages()->where('status', 'active')->orderBy('order_no', 'ASC')->get();
    $section_title = $page->sectionTitles()->where('type', 'why_us_image')->where('status', 'active')->first();
@endphp
@if ($why_us_images->isNotEmpty())
    <div class="feature-style-one-area relative py-5">
        <div class="container mb-3">
            @if ($section_title)
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="sub-title">{{ $section_title->title }}</h4>
                        <h2 class="title split-text">{{ $section_title->subtitle }}</h2>
                    </div>
                </div>
            @endif
            <div class="features-style-one-items wow fadeInUp" data-wow-delay="200ms">
                <div class="row">
                    @foreach ($why_us_images as $why_us_image)
                        <!-- Single Item -->
                    <div class="col-lg-4 col-md-6 feature-style-one-item hover-active-item">
                        <div class="item" style="background-image: url({{ asset('front/assets/img/shape/36.png') }});">
                            <div class="icon">
                                <img src="{{ asset($why_us_image->image) }}" alt="Image Not Found">
                            </div>
                            <h4>{{ $why_us_image->title }}</h4>
                            <p>
                                {!! $why_us_image->description !!}
                            </p>
                            <div class="number">
                                <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Item -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endif
