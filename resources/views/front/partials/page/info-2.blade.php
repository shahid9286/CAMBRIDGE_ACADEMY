@php
    $info_section = $page->infoSections()->first();
@endphp
@if ($info_section)
    <div id="about" class="about-style-one-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6">
                    <div class="thumb-style-one">
                        <img class="wow fadeInUp" src="{{ asset($info_section->image1) }}" alt="Image Not Found">
                        <img class="wow fadeInUp" data-wow-delay="300ms" src="{{ asset($info_section->image2) }}"
                            alt="Image Not Found">
                        <img src="{{ asset('front/assets/img/shape/19.png') }}" alt="Image Not Found">
                        @php
                            $text = $info_section->text1 ? explode('|', $info_section->text1) : [];
                        @endphp

                        @if (count($text) >= 2)
                            <div class="experience">
                                <div class="fun-fact">
                                    <div class="counter">
                                        <div class="timer" data-to="{{ $text[1] }}" data-speed="1000">
                                            {{ $text[1] }}
                                        </div>
                                    </div>
                                    <h4>{!! $text[0] !!}</h4>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 pl-60 pl-md-15 pl-xs-15">
                    <div class="about-style-one-info">
                        <h4 class="sub-title">{{ $info_section->title }}</h4>
                        <h2 class="title split-text">{{ $info_section->subtitle }}</h2>
                        <p class="wow fadeInUp" data-wow-delay="200ms">
                            {!! $info_section->description !!}
                        </p>
                        <ul class="card-style-one wow fadeInUp" data-wow-delay="300ms">
                            @foreach ($info_section->features as $feature)
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset($feature->icon) }}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <h4>{{ $feature->title }}</h4>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="blockquote-text wow fadeInUp" data-wow-delay="400ms">{!! $info_section->description2 !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
