<!-- latest jquery -->
<!-- jQuery versi terbaru (periksa versi terbaru di https://code.jquery.com/) -->
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap js -->
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- Config -->
<script src="{{ asset('assets/js/config.js') }}"></script>

<!-- Feather Icon -->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Scrollbar -->
<script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>

<!-- Sidebar -->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-pin.js') }}"></script>

<!-- Chart (Dipindah ke bagian bawah) -->
{{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
{{-- <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script> --}}

<!-- Plugin lainnya -->
<script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/slick/slick.js') }}"></script>
<script src="{{ asset('assets/js/header-slick.js') }}"></script>
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/notify/index.js') }}"></script>

<!-- DataTable -->
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/js/owlcarousel/owl-custom.js') }}"></script>

<!-- Typeahead -->
{{-- <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script> --}}

<!-- Theme JS -->
<script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Inisialisasi Sidebar & Chart setelah halaman selesai dimuat -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (document.querySelector('.sidebar-menu')) {
            initSidebarMenu();
        }

        if (document.getElementById("chart-container")) {
            loadApexChart();
        }
    });
</script>
