<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ========== Page Title ========== -->
    <title>Tahzeel Group of Companies | @yield('title')</title>
    <meta name="description" content="Tahzeel Group of Companies">

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    @include('front.layouts.partials.styles')
    <!-- ========== End Stylesheet ========== -->
    <style>
.highlight-form {
    box-shadow: 0 0 25px rgba(255, 0, 0, 0.4);
    border: 2px solid #dc3545; /* VisaCo red accent */
    transition: all 0.5s ease;
}
</style>


    @yield('css')

</head>

<body>

    <!-- Start Header Top
    ============================================= -->
    @include('front.layouts.partials.top-bar')
    <!-- End Header Top -->

    <!-- Header =================== -->
    @include('front.layouts.partials.header')
    <!-- End Header -->


        @yield('content')


    <!-- Start Footer
    ============================================= -->
@include('front.layouts.partials.footer-top')
    <!-- End Footer -->
@include('front.layouts.partials.footer')
    <!-- jQuery Frameworks
    ============================================= -->

    @include('front.layouts.partials.scripts')

    {{-- Extra JS for specific pages --}}
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('notification'))
    <script>
        Swal.fire({
            icon: '{{ session('notification')['alert'] ?? 'success' }}',
            title: '{{ session('notification')['message'] ?? 'Action completed successfully!' }}',
            showConfirmButton: false,
            timer: 2500,
            background: '#fff',
            color: '#333',
            iconColor: '#28a745',
            toast: true,
            position: 'top-end'
        });
    </script>
    
@endif


</body>

</html>
