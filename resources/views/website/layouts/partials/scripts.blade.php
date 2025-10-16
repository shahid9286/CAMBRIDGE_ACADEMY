<script src="{{ asset('website/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('website/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('website/assets/js/jquery.appear.js') }}"></script>
<script src="{{ asset('website/assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('website/assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('website/assets/js/progress-bar.min.js') }}"></script>
<script src="{{ asset('website/assets/js/circle-progress.js') }}"></script>
<script src="{{ asset('website/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('website/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('website/assets/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('website/assets/js/count-to.js') }}"></script>
<script src="{{ asset('website/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('website/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('website/assets/js/YTPlayer.min.js') }}"></script>
<script src="{{ asset('website/assets/js/validnavs.js') }}"></script>
<script src="{{ asset('website/assets/js/gsap.js') }}"></script>
<script src="{{ asset('website/assets/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('website/assets/js/SplitText.min.js') }}"></script>
<script src="{{ asset('website/assets/js/main.js') }}"></script>
<script src="{{ asset('website/assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
    var notyf = new Notyf({
        duration: 3000,
        position: {
            x: 'right',
            y: 'top'
        }
    });

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            notyf.error("{{ $error }}");
        @endforeach
    @endif

    @if (session('success'))
        notyf.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        notyf.error("{{ session('error') }}");
    @endif
</script>
