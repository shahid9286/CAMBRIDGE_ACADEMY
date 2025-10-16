@if ($cta)
    <section class="tahzeel-cta-section text-center text-md-start py-5">
        <div class="container">
            <div class="row {{ $cta->image ? '' : 'justify-content-center' }}">
                @if ($cta->image)
                    <div class="col-lg-4">
                        <img src="{{ asset($cta->image) }}" alt="">
                    </div>
                @endif
                <div class="col-lg-8 {{ $cta->image ? 'align-self-center' : 'text-center' }}">
                    <h2 class="sub-title text-white border-white">{{ $cta->subtitle }}</h2>
                    <h2 class="tahzeel-cta-heading fs-3 mb-4">
                        {{ $cta->title }}
                    </h2>

                    <p class="text-white mb-4">{!! $cta->description ?? '' !!}</p>

                    <div class="d-flex {{ $cta->image ? '' : 'justify-content-center' }} flex-column flex-md-row gap-3">
                        <a href="{{ $cta->button_link_1 }}" class="btn tahzeel-btn-dark">
                            {{ $cta->button_text_1 }} <i class="bi bi-arrow-right ps-2"></i>
                        </a>
                        @if ($cta->button_link_2 && $cta->button_text_2)
                            <a href="{{ $cta->button_link_2 }}" class="btn tahzeel-btn-light">
                                {{ $cta->button_text_2 }} <i class="bi bi-arrow-right ps-2"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
