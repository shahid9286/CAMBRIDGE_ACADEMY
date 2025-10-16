<footer class="bg-dark footer-style-three overflow-hidden text-light" style="background: url({{ asset('front/assets/img/shape/14.png') }});">
    <div class="shape">
        <img src="{{ asset('front/assets/img/shape/15.png') }}" alt="Image Not Found">
        <img src="{{ asset('front/assets/img/shape/18.png') }}" alt="Image Not Found">
    </div>
    <div class="container">
        <div class="footer-grid-items">

            <!-- About Us -->
            <div class="footer-item">
                <div class="f-item about">
                    <h4 class="widget-title"><img src="{{ asset($setting->footer_logo) }}" alt="Footer Logo"></h4>
                    <div class="f-item">
                        <p>
                            Tahzeel Group of Companies, delivering trusted global solutions in Business Setup, Visa & Immigration, Manpower Supply, Real Estate, and Study Abroad.
                        </p>
                    </div>
                </div>
                <ul class="footer-social-regular">
                        @if(!empty($setting->fb_link))
                            <li><a href="{{ $setting->fb_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if(!empty($setting->insta_link))
                            <li><a href="{{ $setting->insta_link }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if(!empty($setting->yt_link))
                            <li><a href="{{ $setting->yt_link }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        @endif
                        @if(!empty($setting->tiktok_link))
                            <li><a href="{{ $setting->tiktok_link }}" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                        @endif
                        @if(!empty($setting->linkedin_link))
                            <li><a href="{{ $setting->linkedin_link }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif
                    </ul>
            </div>

            <!-- Quick Links & Services -->
            <div class="footer-item links">
                <div class="f-item link">
                    <h4 class="widget-title">Quick Links</h4>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/about-us') }}">About Us</a></li>
                        <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                        <li><a href="{{ route('front.blogs') }}">Blogs</a></li>
                    </ul>
                </div>
                <div class="f-item link">
                    <h4 class="widget-title">Our Services</h4>
                    <ul>
                        <li><a href="{{ route('front.category-wise-pages', ['slug' => 'visa-immigration']) }}">Visa & Immigration</a></li>
                        <li><a href="{{ route('front.category-wise-pages', ['slug' => 'business-setup']) }}">Business Setup</a></li>
                        <li><a href="{{ route('front.category-wise-pages', ['slug' => 'manpower-supply']) }}">Manpower Supply</a></li>
                        <li><a href="{{ route('front.category-wise-pages', ['slug' => 'study-abroad']) }}">Study Abroad</a></li>
                        <li><a href="{{ route('front.category-wise-pages', ['slug' => 'real-estate']) }}">Real Estate</a></li>
                        <li><a href="{{ route('front.category-wise-pages', ['slug' => 'investment-advisory']) }}">Investment Advisory</a></li>
                    </ul>
                </div>
            </div>

            <!-- Social & Contact -->
            <div class="footer-item">
                <div class="f-item">
                    <h4 class="widget-title">Connect With Us</h4>

                    <ul class="contact-list-two mt-20">
                        @if(!empty($setting->phone_no))
                            <li>
                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="info"><h5><a href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a></h5></div>
                            </li>
                        @endif
                        @if(!empty($setting->phone_no_2))
                            <li>
                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="info"><h5><a href="tel:{{ $setting->phone_no_2 }}">{{ $setting->phone_no_2 }}</a></h5></div>
                            </li>
                        @endif
                        @if(!empty($setting->whatsapp_no))
                            <li>
                                <div class="icon"><i class="bi bi-whatsapp"></i></div>
                                <div class="info"><h5><a href="tel:{{ $setting->whatsapp_no }}">{{ $setting->whatsapp_no }}</a></h5></div>
                            </li>
                        @endif
                        @if(!empty($setting->email))
                            <li>
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <div class="info"><h5><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></h5></div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>© Copyright {{ date('Y') }}. All Rights Reserved by <a href="{{ url('/') }}">Tahzeel Group of Companies</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
