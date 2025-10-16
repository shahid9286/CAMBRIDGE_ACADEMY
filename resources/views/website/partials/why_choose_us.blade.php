@php
    $why_choose_us_section = App\Models\WhyChooseUsSection::where('show_on', 'home')->first();
@endphp
@if ($why_choose_us_section)
    <div class="choose-us-style-one-area">
        <div class="container">
            <div class="choose-us-style-one-frame default-padding">
                <div class="thumb">
                    <img src="{{ asset($why_choose_us_section->image) }}" alt="Image Not Found">
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="choose-us-style-one-info">
                            <h4 class="sub-title">{{ $why_choose_us_section->title ?? '' }}</h4>
                            <h2 class="title split-text">{{ $why_choose_us_section->subtitle ?? '' }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="100ms">
                                {!! $why_choose_us_section->description ?? '' !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="choose-us-style-one-items wow fadeInUp" data-wow-delay="100ms">
                    <div class="row">
                        @foreach ($why_choose_us_section->details as $detail)
                            <div class="col-xl-3 col-md-6">
                                <div class="choose-us-style-one-item">
                                    <div class="icon">
                                        <img src="{{ asset($detail->icon) }}" alt="Image Not Found">
                                    </div>
                                    <h4>{{ $detail->title ?? '' }}</h4>
                                    <p>
                                    {{ $detail->description ?? '' }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif