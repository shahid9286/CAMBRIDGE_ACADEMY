@if ($outline)
    <div class="faq-style-one-area default-padding bg-gray">
        <div class="container">
            <div class="row">
            <div class="col-12 text-center">
                <h4 class="sub-title">{{ $outline->title }}</h4>
                <h2 class="title split-text">{{ $outline->subtitle }}</h2>
                <p class="mb-0">{!! $outline->description !!}</p>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="accordion" id="faqAccordion">
                        @foreach ($outline->units as $unit)
                            <!-- Single Item -->
                            <div class="accordion-item accordion-style-one">
                                <h2 class="accordion-header" id="heading_{{ $loop->iteration }}">
                                    <button class="accordion-button {{ $loop->iteration == 1 ? '' : 'collapsed' }}"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse_{{ $loop->iteration }}"
                                        aria-expanded="{{ $loop->iteration == 1 ? 'true' : 'false' }}"
                                        aria-controls="collapse_{{ $loop->iteration }}">
                                        {{ $unit->title }}
                                    </button>
                                </h2>
                                <div id="collapse_{{ $loop->iteration }}"
                                    class="accordion-collapse collapse {{ $loop->iteration == 1 ? 'show' : '' }}"
                                    aria-labelledby="heading_{{ $loop->iteration }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        @foreach ($unit->topics as $topic)
                                            <p class="mb-2"><i class="bi bi-check2-circle me-2"></i>
                                                {{ $topic->title }}</p>

                                        @endforeach
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