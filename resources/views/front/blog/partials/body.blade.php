<div class="blog-area single full-blog full-blog default-padding pb-5">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content wow fadeInUp col-12">

                        <div class="item">
                            <div class="blog-item-box">

                                <div class="thumb d-flex justify-content-center">
                                    <img src="{{ asset('assets/front/img/blog/' . $blog->image) }}" alt="Thumb">
                                </div>
                                <div class="info">
                                    <div class="meta">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fas fa-calendar-alt"></i>
                                                    {{ $blog->created_at->format('M d, Y') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>
                                        {!! $blog->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>