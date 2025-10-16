@php
    $section_title = $page->sectionTitles()->where('type', 'document')->where('status', 'active')->first();
    $document_requireds = $page->documentRequireds()->where('status', 'active')->orderBy('order_no', 'ASC')->get();
@endphp

@if ($document_requireds->isNotEmpty())
    <div class="process-styl-two-area default-padding text-center bg-gray bg-cover"
        style="background-image: url({{ asset('front/assets/img/shape/16.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">{{ $section_title->title ?? '' }}</h4>
                        <h2 class="title wow fadeInUp">{{ $section_title->description ?? '' }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="process-style-two-items wow fadeInUp" data-wow-delay="100ms">


                        @foreach ($document_requireds as $documentRequired)
                            <div class="process-style-two-item">
                                <div class="icon">
                                    <img src="{{ asset($documentRequired->icon) }}" alt="Image Not Found">
                                </div>
                                <div class="info">
                                    <h4>{{ $documentRequired->title ?? '' }}</h4>
                                    <p>
                                        {{ $documentRequired->description ?? '' }}.
                                    </p>
                                </div>
                            </div>
                        @endforeach



                        <div class="shape">
                            <img src="{{ asset('front/assets/img/shape/43.png') }}" alt="Image Not Found">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
