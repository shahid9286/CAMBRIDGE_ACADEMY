@php
    $info_section = $page->infoSections()->first();
@endphp
@if ($info_section)
    <div id="about" class="about-style-three-area default-padding">
        <div class="shape">
            <img src="{{ asset('front/assets/img/shape/33.png') }}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="about-style-three-items">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-style-three-info">
                            @php
                                $text = $info_section->text1 ? explode('|', $info_section->text1) : [];
                            @endphp

                            @if (count($text) >= 2)
                                <div class="experience-style-one mb-50">
                                    <h2 style="background-image: url({{ asset($info_section->image2) }});">
                                        {{ $text[1] }}
                                    </h2>
                                    <h4>{!! $text[0] !!}</h4>
                                </div>
                            @endif
                            <h4 class="sub-title">{{ $info_section->title }}</h4>
                            <h2 class="title split-text">{{ $info_section->subtitle }}</h2>
                            <p class="wow fadeInUp">
                                {!! $info_section->description !!}
                            </p>
                            <ul class="list-card wow fadeInUp" data-wow-delay="100ms">
                                @foreach ($info_section->features as $feature)
                                    <li>
                                        <div class="top">
                                            <img src="{{ asset($feature->icon) }}" alt="Image Not Found">
                                            <h4>{{ $feature->title }}</h4>
                                        </div>
                                        <p>
                                            {{ $feature->description }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6">
                        <div class="about-three-thumb">
                            <img class="wow fadeInUp" src="{{ asset($info_section->image1) }}" alt="Image Not Found">
                            @php
                                $text = $info_section->text2 ? explode('|', $info_section->text2) : [];
                            @endphp

                            @if (count($text) >= 2)
                                <div class="success-rate wow fadeInDown" data-wow-delay="100ms">
                                    <div class="circle-progress">
                                        <div class="progressbar">
                                            <h4>{{ $text[0] }}</h4>
                                            <div class="circle" data-percent="{{ $text[1] }}">
                                                <strong></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
