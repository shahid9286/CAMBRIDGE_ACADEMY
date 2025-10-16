<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ========== Page Title ========== -->
    <title>Cambridge Academy | @yield('title')</title>
    <meta name="description" content="cambridgeacademy">

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    @include('website.layouts.partials.styles')
    <!-- ========== End Stylesheet ========== -->

    @yield('css')

</head>

<body>

    <!-- Start Header Top
    ============================================= -->
    @include('website.layouts.partials.top-bar')
    <!-- End Header Top -->

    <!-- Header =================== -->
    @include('website.layouts.partials.header')
    <!-- End Header -->


    @yield('content')
    <a href="https://wa.me/{{ $setting->whatsapp_number }}" class="whatsapp-float" target="_blank"
        title="Chat with us on WhatsApp">
        <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp" />
    </a>



    <!-- Start Footer
    ============================================= -->
    @include('website.layouts.partials.footer-top')
    <!-- End Footer -->
    @include('website.layouts.partials.footer')
    <!-- jQuery Frameworks
    ============================================= -->

    @include('website.layouts.partials.scripts')

    {{-- Extra JS for specific pages --}}
    @yield('js')

</body>

</html>