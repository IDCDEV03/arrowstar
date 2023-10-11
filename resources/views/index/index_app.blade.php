@include('index.layout_frontend.index_header')
@include('index.layout_frontend.index_menu')

    @yield('content')

<!-- Footer Start -->
@include('index.layout_frontend.index_footer')


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

@yield('script')
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('plugin_index/lib/easing/easing.min.js') }} "></script>
<script src="{{ asset('plugin_index/lib/owlcarousel/owl.carousel.min.js') }} "></script>
<script src="{{ asset('plugin_index/lib/tempusdominus/js/moment.min.js') }} "></script>
<script src="{{ asset('plugin_index/lib/tempusdominus/js/moment-timezone.min.js') }} "></script>
<script src="{{ asset('plugin_index/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }} "></script>

<!-- Contact Javascript File -->
<script src="{{ asset('plugin_index/mail/jqBootstrapValidation.min.js') }} "></script>
<script src="{{ asset('plugin_index/mail/contact.js') }} "></script>

<!-- Template Javascript -->
<script src="{{ asset('plugin_index/js/main.js') }} "></script>


