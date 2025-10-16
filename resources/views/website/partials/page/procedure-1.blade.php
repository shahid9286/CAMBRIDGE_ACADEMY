@php
    $procedures = $page->procedures()->where('status', 'active')->orderBy('order_no', 'ASC')->get();
    $section_title = $page->sectionTitles()->where('type', 'procedure')->where('status', 'active')->first();
@endphp
@if ($procedures->isNotEmpty())
    <div class="process-style-one-area text-center default-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">{{ $section_title->title }}</h4>
                        <h2 class="title split-text">{{ $section_title->subtitle }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="process-style-one-items wow fadeInUp" data-wow-delay="100ms">
                        @foreach ($procedures as $procedure)
                            <div
                                class="process-style-one-item hover-active-item {{ $loop->iteration == 2 ? 'active' : '' }}">
                                <div class="icon">
                                    <img src="{{ asset($procedure->image) }}" alt="Image Not Found">
                                </div>
                                <div class="info">
                                    <div class="shape">
                                        <img src="{{ asset('front/assets/img/shape/41.png') }}" alt="Image Not Found">
                                    </div>
                                    <span>{{ $loop->iteration }}</span>
                                    <h4>{{ $procedure->title ?? 'Procedure Title' }}</h4>
                                    <p>{{ $procedure->description ?? 'Procedure description goes here.' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
