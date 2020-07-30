<footer class="footer-area section-padding-2">
    <div class="container-fluid">
        <div class="footer-bottom bg-bluegray pt-40">
            <div class="copyright-3 text-center pt-20 pb-20 border-top-1">
                <p>Copyright © <a href="#">King Pro P4W</a>. Luis </p>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="{{ asset('pelangganTools/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<!-- Modernizer JS -->
<script src="{{ asset('pelangganTools/js/vendor/jquery-3.3.1.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('pelangganTools/js/vendor/popper.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('pelangganTools/js/vendor/bootstrap.min.js') }}"></script>

<!-- Slick Slider JS -->
<script src="{{ asset('pelangganTools/js/plugins/countdown.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/instafeed.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/jquery-ui.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/jquery-ui-touch-punch.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/owl-carousel.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/slick.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/wow.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/textillate.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/elevatezoom.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/sticky-sidebar.js') }}"></script>
<script src="{{ asset('pelangganTools/js/plugins/smoothscroll.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('pelangganTools/js/main.js') }}"></script>
<script src="{{ asset('pelangganTools/js/jquery.number.js') }}"></script>

<script>
    var width = $(window).width();
    if (width >=970) {
        window.location.href="{{ route('admin') }}"
    }
</script>

@yield('scripts')

<script>
    $('#tampilKeranjang').load('{{ route("keranjang.index") }}');
</script>

</body>

</html>
