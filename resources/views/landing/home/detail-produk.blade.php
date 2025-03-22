{{-- @extends('landing.home') --}}

@include('landing.head')

<body>
    <!-- Scroll-top -->
    @include('landing.layouts.partials.scroll')
    <!-- Scroll-top-end-->

    <!-- header-area-start -->
    @include('landing.layouts.partials.navbar')
    <!-- header-area-end -->

    <main>

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="/">Home</a></span>
                                <span class="dvdr">/</span>
                                <span class="tp-breadcrumb__active"><a
                                        href="/">{{ $produk->kategori->nama_kategori }}</a></span>
                                <span class="dvdr">/</span>
                                <span>{{ $produk->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area-start -->
        <section class="shopdetails-area grey-bg pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="tpdetails__area mr-60 pb-30">
                            <div class="tpdetails__product mb-30">
                                <div class="tpdetails__title-box">
                                    <h3 class="tpdetails__title">{{ $produk->name }}</h3>
                                    <ul class="tpdetails__brand">
                                        <li> Kategori : <a href="#">{{ $produk->kategori->nama_kategori }}</a>
                                        </li>
                                        <li>
                                            Satuan: <span>{{ $produk->satuan->nama_satuan }}</span>
                                        </li>
                                        <li>
                                            Availability: <span>{{ $produk->stok }} Instock</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tpdetails__box">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="tpproduct-details__nab">
                                                <div class="tab-content" id="nav-tabContents">
                                                    <div class="tab-pane fade show active w-img" id="nav-home"
                                                        role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                        <img src="{{ asset('storage/' . $produk->gambar) }}"
                                                            alt=""
                                                            style="width:400px; height: 400px; border-radius: 7px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="product__details">
                                                <div class="product__details-price-box">
                                                    <h5 class="tpcontact-inner-sub-title-2">1
                                                        {{ $produk->satuan->nama_satuan }}</h5>
                                                    <h5 class="product__details-price">
                                                        {{ 'Rp ' . number_format($produk->harga, 0, ',', '.') }}</h5>
                                                    <div class="product__details-stock">
                                                        <ul>
                                                            <li><i>Deskripsi : </i></li>
                                                        </ul>
                                                    </div>
                                                    <ul class="product__details-info-list">
                                                        {{ $produk->deskripsi }}
                                                    </ul>
                                                </div>
                                                <div class="product__details-cart">
                                                    <div
                                                        class="product__details-quantity d-flex align-items-center mb-15">
                                                        <div class="product__details-btn">
                                                            <a href="https://wa.me/{{ $produk->umkm->link_wa }}"
                                                                target="_blank">WhatsApp</a>
                                                            <a href="{{ $produk->link }}" target="_blank">Link
                                                                Eccomerce</a>
                                                        </div>
                                                    </div>
                                                    {{-- <ul class="product__details-check">
                                                        <li>
                                                            <a href="#"><i class="icon-heart icons"></i> add to
                                                                wishlist</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="icon-layers"></i> Add to
                                                                Compare</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="icon-share-2"></i> Share</a>
                                                        </li>
                                                    </ul> --}}
                                                </div>
                                                <div class="product__details-stock mb-25">
                                                    <ul>
                                                        <li>Availability: <i>{{ $produk->stok }} Instock</i></li>
                                                        <li>Kategori: <span>{{ $produk->kategori->nama_kategori }}
                                                            </span>
                                                        </li>
                                                        <li>Satuan: <span>{{ $produk->satuan->nama_satuan }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-area whight-product pt-75 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="tpdescription__product-title mb-20">Produk Toko Ini</h5>
                    </div>
                </div>
                <div class="tpproduct__arrow double-product p-relative">
                    <div
                        class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">
                        @foreach ($produk_umkm as $item)
                            <div class="col">
                                <div class="tpproduct p-relative mb-20">
                                    <div class="tpproduct__thumb p-relative text-center">
                                        <a href="/produk/details-product/{{ $item->id_produk }}"><img
                                                src="{{ asset('storage/' . $item->gambar) }}"
                                                alt="{{ $item->name }}"
                                                style="width:180px; height: 180px; border-radius: 7px;"></a>
                                        <div class="tpproduct__info bage" style="top: 13px">
                                            @if ($item->discount)
                                                <span
                                                    class="tpproduct__info-discount bage__discount">-{{ $item->discount }}%</span>
                                            @endif
                                            <span class="tpproduct__info-hot bage__hot">New</span>
                                        </div>
                                        <div class="tpproduct__shopping">
                                            <a class="tpproduct__shopping-wishlist" href="#"><i
                                                    class="icon-heart icons"></i></a>
                                            <a class="tpproduct__shopping-wishlist" href="#"><i
                                                    class="icon-layers"></i></a>
                                            <a class="tpproduct__shopping-cart"
                                                href="/produk/details-product/{{ $item->id_produk }}"><i
                                                    class="icon-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="tpproduct__content">
                                        <span class="tpproduct__content-weight">
                                            <a href="">{{ $item->kategori->nama_kategori }}</a>
                                        </span>
                                        <h4 class="tpproduct__title">
                                            <a
                                                href="/produk/details-product/{{ $item->id_produk }}">{{ $item->name }}</a>
                                        </h4>
                                        <h5 class="tpcontact-inner-sub-title">1
                                            {{ $item->satuan->nama_satuan }}</h5>
                                        <div class="tpproduct__price">
                                            <span>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                    <div class="tpproduct__hover-text">
                                        <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                            <a class="tp-btn-2"
                                                href="/produk/details-product/{{ $item->id_produk }}">Details</a>
                                        </div>
                                        <div class="tpproduct__descrip">
                                            <ul>
                                                <li>Kategori : {{ $item->kategori->nama_kategori }}
                                                </li>
                                                <li>Satuan : {{ $item->satuan->nama_satuan }}</li>
                                                <li>Stok : {{ $item->stok }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- footer-area-start -->
    @include('landing.layouts.partials.footer')
    <!-- footer-area-end -->

    <!-- JS here -->
    @include('landing.layouts.partials.script')
</body>

</html>
