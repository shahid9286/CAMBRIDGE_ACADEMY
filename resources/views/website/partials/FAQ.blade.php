@php
    $faq = App\Models\FaqSection::first() ?? '';
@endphp
@if ($faq)
    <div class="faq-style-one-area default-padding bg-cover bg-gray"
        style="background-image: url({{asset('front/assets/img/shape/22.png')}});">
        <div class="container">
            <div class="row justify-content-end">

                <div class="col-xl-6 offset-xl-1 order-lg-last">
                    <div class="faq-style-one-items">
                        <h4 class="sub-title">{{ $faq->title ?? '' }}</h4>
                        <h2 class="title wow fadeInUp">{{ $faq->subtitle ?? '' }}</h2>
                        <div class="accordion wow fadeInUp" data-wow-delay="100ms" id="faqAccordion">

                            @foreach ($faq->details as $faq)
                                <div class="accordion-item accordion-style-one">
                                    <h2 class="accordion-header" id="heading_{{ $loop->iteration }}">
                                        <button class="accordion-button {{ $loop->iteration == 1 ? '' : 'collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_{{ $loop->iteration }}"
                                            aria-expanded="{{ $loop->iteration == 1 ? 'true' : 'false' }}"
                                            aria-controls="collapse_{{ $loop->iteration }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse_{{ $loop->iteration }}"
                                        class="accordion-collapse collapse {{ $loop->iteration == 1 ? 'show' : '' }}"
                                        aria-labelledby="heading_{{ $loop->iteration }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="faq-style-one-thumb">
                        <img src="{{asset('front/assets/img/illustration/5.png')}}" alt="Cambridge Academy FAQs">
                    </div>
                </div>

            </div>
        </div>
    </div>

@endif