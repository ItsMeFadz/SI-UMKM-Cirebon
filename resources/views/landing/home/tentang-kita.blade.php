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
        <section class="about-area pt-100 pb-60">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="tpabout__inner-thumb-2 p-relative mb-30">
                            <img src="{{ asset('assetsLand/img/banner/about-inner-bg.png') }}" alt="">
                            <div class="tpabout__inner-thumb-shape d-none d-md-block">
                                <div class="tpabout__inner-thumb-shape-one">
                                    <img src="{{ asset('assetsLand/img/shape/tree-leaf-6.png') }}" alt="">
                                </div>
                                <div class="tpabout__inner-thumb-shape-two">
                                    <img src="{{ asset('assetsLand/img/shape/tree-leaf-7.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tpabout__inner-2 mb-30">
                            <div class="tpabout__inner-tag mb-10">
                                <span class="active">Tentang Kita</span>
                            </div>
                            <h3 class="tpabout__inner-title-2 mb-25">Kita Membantu Bisnis <br> Digital Mu Tumbuh dengan
                                Baik</h3>
                            <p>Kami berkomitmen untuk memberikan layanan terbaik dan pengalaman inovatif bagi para
                                pengguna dalam membangun, mengembangkan, dan mengoptimalkan bisnis digital mereka.
                                Dengan dukungan teknologi terkini dan solusi yang disesuaikan, kami membantu pengguna
                                mencapai kesuksesan dalam dunia digital dengan lebih mudah, efektif, dan berkelanjutan.
                            </p>
                            <div class="tpabout__inner-list">
                                <ul>
                                    <li><i class="icon-check"></i>Pembelian lebih mudah</li>
                                    <li><i class="icon-check"></i>Registrasi penjual sangat cepat</li>
                                    <li><i class="icon-check"></i>Keamanan penjual terjamin</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-area pb-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tpabout__item text-center mb-40">
                            <div class="tpabout__icon mb-15">
                                <img src="{{ asset('assetsLand/img/icon/about-svg2.svg') }}" alt="">
                            </div>
                            <div class="tpabout__content">
                                <h4 class="tpabout__title">Kategori</h4>
                                <p>Terdapat lebih dari<br><span style="color:rgb(132, 199, 32)">{{$jumlahKategori}}</span> Kategori.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tpabout__item text-center mb-40">
                            <div class="tpabout__icon mb-15">
                                <img src="{{ asset('assetsLand/img/icon/choose-icon2.svg') }}" alt="">
                            </div>
                            <div class="tpabout__content">
                                <h4 class="tpabout__title">Mitra UMKM</h4>
                                <p>Kita telah bekerjasama dengan lebih dari <br> <span style="color:rgb(132, 199, 32)">{{$jumlahUMKM}}</span> Mitra.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tpabout__item text-center mb-40">
                            <div class="tpabout__icon mb-15">
                                <img src="{{ asset('assetsLand/img/icon/about-svg1.svg') }}" alt="">
                            </div>
                            <div class="tpabout__content">
                                <h4 class="tpabout__title">Produk</h4>
                                <p>Kita telah memiliki lebih dari <br> <span style="color:rgb(132, 199, 32)">{{$jumlahProduk}}</span> Live Produk. </p>
                            </div>
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
</body>

</html>
