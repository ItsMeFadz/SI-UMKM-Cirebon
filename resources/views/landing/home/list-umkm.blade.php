@include('landing.head')

<body>

    <!-- Scroll-top -->
    @include('landing.layouts.partials.scroll')
    <!-- Scroll-top-end-->

    <!-- header-area-start -->
    @include('landing.layouts.partials.navbar')
    <!-- header-area-end -->

    <main>

        <!-- choose-area-start -->
        <section class="choose-area grey-bg pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="tpsection mb-35 pt-75">
                            <h4 class="tpsection__sub-title">~ UMKM Cirebon ~</h4>
                            <h4 class="tpsection__title">Daftar UMKM Cirebon</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($umkm as $item)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="tpchoose__item text-center mb-30">
                                <div class="tpchoose__icon mb-20">
                                    <img src="{{ asset('storage/' . $item->foto_profil_umkm) }}" alt=""
                                        style="width: 90px; height: 90px; border-radius: 50%; object-fit: cover; border: 3px solid #ddd;">
                                </div>
                                <div class="tpchoose__content">
                                    <h4 class="tpchoose__title">{{ $item->nama_umkm }}</h4>
                                    {{-- <p>Adjust global theme options and see design changes in real-time.</p> --}}
                                    <a href="/umkm/details-umkm/{{ $item->id_umkm }}"
                                        class="tpchoose__details d-flex align-items-center justify-content-center">Visit<i
                                            class="icon-chevrons-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="basic-pagination text-center mt-15">
                        <nav>
                            <ul>
                                <li>
                                    <span class="current">1</span>
                                </li>
                                <li>
                                    <a href="">2</a>
                                </li>
                                <li>
                                    <a href="">3</a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="icon-chevrons-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 pt-25">
                        <div class="tpproduct__all-item text-center pt-15">
                            <span> Ayo tunggu apa lagi! Segera <a href="#">Daftarkan<i
                                        class="icon-chevrons-right"></i></a> diri anda.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('landing.layouts.partials.footer')
    <!-- footer-area-end -->

    <!-- JS here -->
    @include('landing.layouts.partials.script')
    {{-- <script>
        $(document).ready(function() {
            let itemsPerPage = 8; // Jumlah item per halaman
            let $items = $('.tpchoose__item'); // Semua item UMKM
            let totalPages = Math.ceil($items.length / itemsPerPage);
            let $pagination = $('.basic-pagination ul');

            function showPage(page) {
                $items.parent().hide(); // Sembunyikan semua card
                let start = (page - 1) * itemsPerPage;
                let end = start + itemsPerPage;
                $items.slice(start, end).parent().fadeIn(300); // Munculkan card dengan efek fade
            }

            function renderPagination() {
                $pagination.empty();
                for (let i = 1; i <= totalPages; i++) {
                    let activeClass = i === 1 ? 'current' : '';
                    $pagination.append(`<li><a href="#" class="${activeClass}" data-page="${i}">${i}</a></li>`);
                }
            }

            $pagination.on('click', 'a', function(e) {
                e.preventDefault();
                let page = parseInt($(this).attr('data-page'));
                $('.basic-pagination ul li a').removeClass('current');
                $(this).addClass('current');
                showPage(page);
            });

            renderPagination();
            showPage(1); // Tampilkan halaman pertama saat halaman dimuat
        });
    </script> --}}
</body>

</html>
