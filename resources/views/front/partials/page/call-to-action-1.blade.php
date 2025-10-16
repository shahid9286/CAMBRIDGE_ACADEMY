@php
    $cta = $page->callToActions()->where('status', 'active')->first();
@endphp
@if ($cta)
    <section class="tahzeel-cta-section text-center text-md-start py-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="tahzeel-cta-heading mb-4">
                        {!! $cta->title !!}
                    </h2>

                    <p class="text-white mb-4">{!! $cta->subtitle !!}</p>

                    <div class="d-flex justify-content-center flex-column flex-md-row gap-3">
                        <a href="{{ $cta->button_url }}" class="btn tahzeel-btn-dark">
                            {{ $cta->button_text }} <i class="bi bi-arrow-right ps-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif


