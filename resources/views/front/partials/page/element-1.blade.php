@php
    $element = $page->elements()->first();
@endphp
@if ($element)
    <section class="tahzeel-element-section">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <h2 class="sub-title">{{ $element->title }}</h2>
                    <h3 class="title split-text">{{ $element->subtitle }}</h3>
                    <p class="tahzeel-element-description">
                        {!! $element->description !!}
                    </p>

                    @if ($element->features)
                        <div class="tahzeel-element-features">
                            @foreach ($element->features()->orderBy('order_no', 'ASC')->get() as $feature)
                                <div class="tahzeel-element-feature">
                                    <div class="tahzeel-element-feature-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <h4 class="tahzeel-element-feature-title">{{ $feature->title }}</h4>
                                    <p class="tahzeel-element-feature-desc">{{ $feature->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-lg-6">
                    <div class="tahzeel-element-img-container">
                        <img src="{{ asset($element->image) }}" alt="Coding workspace" class="tahzeel-element-img-main">
                        @if ($element->icon)
                            <img src="{{ asset($element->icon) }}" alt="Code closeup"
                                class="tahzeel-element-img-secondary">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
