@extends('website.layouts.master')
@section('title', 'Contact Us')

@section('content')

    @include('website.partials.breadcrumb', [
        'title' => 'Contact Us',
        'subtitle' => 'Contact',
        'image' => $setting->home_beadcrum_img ?? 'website/assets/img/banner/4.jpg',
    ])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-5">
                <div class="site-heading text-center">
                    <h4 class="sub-title">Get in touch!</h4>
                    <h2 class="title split-text">Have questions? Get in touch!</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- Email Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="cravix-info-card">
                    <div class="cravix-icon-wrapper">
                        <div class="cravix-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <h3 class="cravix-card-title">Email Us</h3>
                    <p class="cravix-card-content">
                        Send us an email anytime and we'll respond as soon as possible.
                    </p>
                    <a href="mailto:{{ $setting->email }}" class="cravix-contact-link">
                        {{ $setting->email }} <i class="fas fa-paper-plane"></i>
                    </a>
                </div>
            </div>

            <!-- Phone Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="cravix-info-card">
                    <div class="cravix-icon-wrapper">
                        <div class="cravix-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                    </div>
                    <h3 class="cravix-card-title">Call Us</h3>
                    <p class="cravix-card-content">
                        Give us a call during business hours for immediate assistance.
                    </p>
                    <a href="tel:{{ $setting->phone_no }}" class="cravix-contact-link">
                        {{ $setting->phone_no }} <i class="fas fa-phone-alt"></i>
                    </a>
                </div>
            </div>

            <!-- Address Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="cravix-info-card">
                    <div class="cravix-icon-wrapper">
                        <div class="cravix-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </div>
                    <h3 class="cravix-card-title">Visit Us</h3>
                    <p class="cravix-card-content">
                        Come visit our office during business hours for a face-to-face meeting.
                    </p>
                    <a href="https://www.google.com/maps/dir//College+Rd,+Whalley+Range,+Manchester+M16+8BP,+United+Kingdom/@53.4490888,-2.3467374,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x487bad538922392d:0x54dd2da9bcc5af56!2m2!1d-2.2643404!2d53.4491769?entry=ttu&g_ep=EgoyMDI1MTAxMy4wIKXMDSoASAFQAw%3D%3D"
                        target="_blank" class="cravix-contact-link">
                        {{ $setting->address }} <i class="fas fa-map-marked-alt"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>

    @include('website.partials.contact-form')

@endsection
