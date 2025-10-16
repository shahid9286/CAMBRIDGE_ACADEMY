@if ($block)
    <section class="tahzeel-about-section">
        <div class="container py-5">
            <div class="row gx-5 align-items-center">
                @if ($block->type == 'R-2-L')
                    <div class="col-lg-5">
                        <div class="tahzeel-img-container">
                            <img src="{{ asset($block->image) }}" alt="Happy Family" class="tahzeel-main-img">
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
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
                @else
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
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endif
