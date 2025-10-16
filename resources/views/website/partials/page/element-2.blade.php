@php
    $element = $page->elements()->first();
@endphp

@if ($element)
        <div class="choose-us-style-three-area default-padding">
            <div class="choose-us-three-thumb">
                <img class="wow fadeInLeft" src="{{ asset($element->image) }}" alt="Image Not Found">
                @if ($element->video_link)
                    <div class="video-card">
                        <a href="{{ $element->video_link }}" class="popup-youtube">
                            <i class="fas fa-play"></i>
                        </a>
                        <span>{{ $element->video_label ?? 'Watch Us' }}</span>
                    </div>
                @endif
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-4">
                        <div class="choose-us-style-three-info">
                            <h4 class="sub-title">{{ $element->title }}</h4>
                            <h2 class="title split-text">{{ $element->subtitle }}</h2>
                            <p class="wow fadeInUp">
                                {!! $element->description !!}
                            </p>

                            <div class="card-style-three wow fadeInUp" data-wow-delay="100ms">
                                <div class="row">
                                        @foreach ($element->features as $feature)
                                        <div class="col-6 {{ $loop->iteration > 2 ? 'mt-4' : '' }}">
                                            <div class="item">
                                                <div class="number">
                                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                                </div>
                                                <div class="info">
                                                    <h4>{{ $feature->title }}</h4>
                                                    <p>{{ $feature->description }}</p>
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
