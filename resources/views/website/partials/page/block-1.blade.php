@php
    $block = $page->blocks()->first();
@endphp
@if ($block)
    <section class="tahzeel-about-section">
        <div class="container py-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-5">
                    <h2 class="sub-title">{{ $block->title }}</h2>
                    <h3 class="title split-text">{{ $block->subtitle }}</h3>
                    <p class="tahzeel-description">
                        {!! $block->description !!}
                    </p>
                    @if ($block->features)
                        <ul class="tahzeel-feature-list">
                            @foreach ($block->features()->orderBy('order_no', 'ASC')->get() as $feature)
                                <li>
                                    <i class="fas fa-check"></i>
                                    <b>{{ $feature->title }}</b>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="tahzeel-img-container">
                        <img src="{{ asset($block->image) }}" alt="Happy Family" class="tahzeel-main-img">
                        {{-- <div class="tahzeel-stat-card tahzeel-stat-card-1 d-none d-md-flex">
                             <div class="tahzeel-stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h3 class="tahzeel-stat-number">2500+</h3>
                                <p class="tahzeel-stat-text">Happy Clients</p>
                            </div>
                        </div>

                        <div class="tahzeel-progress-card tahzeel-progress-card-2 d-none d-md-block">
                            <div class="tahzeel-progress-circle">
                                <svg viewBox="0 0 100 50">
                                    <path class="tahzeel-progress-bg" d="M 50,50 m -47,0 a 47,47 0 1 1 94,0"></path>
                                    <path class="tahzeel-progress-value" d="M 50,50 m -47,0 a 47,47 0 1 1 94,0"></path>
                                </svg>
                                <div class="tahzeel-progress-text">80%</div>
                            </div>
                            <h4 class="tahzeel-progress-label">Time Saved</h4>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
