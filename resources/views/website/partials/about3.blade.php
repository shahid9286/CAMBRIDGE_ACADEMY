@php
    $info_section = \App\Models\InfoBlock::where('show_on', 'about_us')->latest()->first();
@endphp
@if ($info_section)
    <div class="about-style-five-area default-padding">
        <div class="shape">
            <img src="{{ asset($info_section->image2) }}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 pl-60 pl-md-15 pl-xs-15 order-lg-last">
                    <div class="about-style-five-thumb">
                        <img class="wow fadeInUp" data-wow-delay="100ms" src="{{ asset($info_section->image1) }}"
                            alt="Cambridge Academy">
                        @if ($info_section->text1)
                            @php
                                $text1 = explode('|', $info_section->text1);
                            @endphp
                            <div class="fun-fact wow fadeInDown" data-wow-delay="200ms">
                                <div class="counter">
                                    <div class="timer" data-to="{{ $text1[0] }}" data-speed="2000">{{ $text1[0] }}</div>
                                    <div class="operator">+</div>
                                </div>
                                <span class="medium">{{ $text1[1] }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-style-five-info">
                        <h4 class="sub-title">{{ $info_section->title }}</h4>
                        <h2 class="title split-text">{{ $info_section->subtitle }}</h2>
                        <p class="wow fadeInUp" data-wow-delay="100ms">
                            {!! $info_section->description !!}
                        </p>

                        <div class="d-flex">
                            @if ($info_section->text2)
                                 <!-- $text2-->
                                @php
                                    $text2 = explode('|', $info_section->text2);
                                @endphp
                                <div class="circle-progress-three">
                                    <div class="progressbar-three">
                                        <div class="circle-three" data-percent="{{ $text2[0] }}">
                                            <strong>{{ $text2[0] }}%</strong>
                                        </div>
                                        <h4>{{ $text2[1] }}</h4>
                                    </div>
                                </div>
                            @endif

                            <!-- Key Highlights -->
                            <div class="right">
                                <ul>
                                    @foreach ($info_section->features as $feature)
                                        <li>{{ $feature->title }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endif