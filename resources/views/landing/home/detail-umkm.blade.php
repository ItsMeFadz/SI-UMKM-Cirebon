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
        <section class="choose-area grey-bg pb-80 pt-50">
            <div class="container">
                <div class="feature-bg-round white-bg pt-50 pb-10">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <div class="tpsection">
                                <div class="tpchoose__icon mb-10">
                                    <img src="{{ asset('storage/' . $umkm->foto_profil_umkm) }}" alt=""
                                        style="width: 90px; height: 90px; border-radius: 50%; object-fit: cover; border: 3px solid #ddd;">
                                </div>
                                <h4 class="tpsection__title text-center brand-product-title">{{ $umkm->nama_umkm }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tpdetails__title-box">
                        <ul class="tpdetails__brand text-center">
                            <li> Kategori Toko : <span>{{ $umkm->kategori->nama_kategori }}</span> </li>
                            <li>
                                Alamat : <span>{{ $umkm->kabupaten->nama_kabupaten }},
                                    {{ $umkm->kecamatan->nama_kecamatan }}</span>
                            </li>
                            <li>
                                Kontak Via : <a target="_blank"
                                    href="https://wa.me/{{ $umkm->link_wa }}"><span>WhatsApp</span></a>
                            </li>
                            <li>
                                <a target="_blank" href="{{ $umkm->link_gmaps }}"><span>Lokasi Toko</span></a>
                            </li>
                            <li>
                                <a target="_blank" href="{{ $umkm->link_marketplace }}"><span>Toko Eccomerce</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tpsection">
                        <h6 class="tpsection__title text-start brand-product-title">Produk : </h6>
                    </div>
                    <div class="row pt-20">
                        <div class="col-lg-12">
                            <div class="row">
                                @foreach ($produk as $item)
                                    <div class="col-xl-3 col-lg-6">
                                        <div class="tpbrandproduct__item d-flex mb-20">
                                            <div class="tpbrandproduct__img p-relative">
                                                <img src="{{ asset('storage/' . $item->gambar) }}" alt=""
                                                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 7px;">
                                                <div class="tpproduct__info bage tpbrandproduct__bage">
                                                    <span class="tpproduct__info-discount bage__discount">New</span>
                                                </div>
                                            </div>
                                            <div class="tpbrandproduct__contact">
                                                <span class="tpbrandproduct__product-title"><a
                                                        href="/produk/details-product/{{ $item->id_produk }}">
                                                        {{ $item->name }}</a></span>
                                                {{-- <div class="tpproduct__rating mb-5">
                                                    <a href="#"><i class="icon-star_outline1"></i></a>
                                                    <a href="#"><i class="icon-star_outline1"></i></a>
                                                    <a href="#"><i class="icon-star_outline1"></i></a>
                                                    <a href="#"><i class="icon-star_outline1"></i></a>
                                                    <a href="#"><i class="icon-star_outline1"></i></a>
                                                </div> --}}
                                                <h5 class="tpcontact-inner-sub-title">{{$item->satuan->nama_satuan}}</h5>
                                                <div class="tpproduct__price">
                                                    <span>Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sections__wrapper white-bg pl-50 pr-50 pb-20 brand-product">
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
