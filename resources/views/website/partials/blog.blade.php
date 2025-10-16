<div class="home-blog-area default-padding bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="site-heading text-center">
                    <h4 class="sub-title">News & Updates</h4>
                    <h2 class="title split-text">Recent story & articles <br> in our community</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Swiper Container -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($blogs as $blog)
                    <div class="swiper-slide">
                        <div class="home-blog-style-one wow fadeInUp">
                            <div class="thumb">
                                <img src="{{ asset('assets/front/img/blog/' . $blog->image) }}" alt="Image Not Found">
                            </div>
                            <div class="info">
                                <div class="inner">
                                    <div class="meta">
                                        <div class="date">
                                            <strong>{{ $blog->created_at->format('d') }}</strong>
                                            {{ $blog->created_at->format('M') }}
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h3><a
                                                href="{{ route('website.blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                                        </h3>
                                        <a href="{{ route('website.blog.detail', $blog->slug) }}" class="btn-regular">
                                            Read More
                                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 17L17 1H7.8" stroke="#232323" stroke-width="2"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
</div>
@section('js')
    <script>
        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                }
            }
        });
    </script>
@endsection
