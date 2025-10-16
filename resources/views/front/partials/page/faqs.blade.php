@php
    $faqs = $page->faqs;
    $section_title = $page->sectionTitles()->where('type', 'faq')->where('status', 'active')->first();
@endphp
@if ($faqs->isNotEmpty())
    <div class="faq-style-one-area default-padding bg-gray">
        @if ($section_title)
            <div class="row">
            <div class="col-12 text-center">
                <h4 class="sub-title">{{ $section_title->title }}</h4>
                <h2 class="title split-text">{{ $section_title->subtitle }}</h2>
            </div>
        </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="accordion" id="faqAccordion">
                        @foreach ($faqs as $faq)
                            <!-- Single Item -->
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
                            <!-- End Single Item -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
