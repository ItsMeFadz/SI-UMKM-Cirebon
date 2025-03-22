@extends('layouts.main')

@section('content')
    {{-- Header Container --}}
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Dashboard</h3>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/dasboard">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Default</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Body Container --}}
    <div class="container-fluid general-widget">
        <div class="row">
            {{-- <div class="col-md-12 box-col-12">
                <div class="card o-hidden">
                    <div class="card-header">
                        <h4>Contributions</h4>
                    </div>
                    <div class="bar-chart-widget">
                        <div class="bottom-content card-body">
                            <img src="https://ghchart.rshah.org/HEXCOLORCODE/ItsMeFadz" alt="Name Your Github chart">
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header mb-3">
                        <h4>Produk Anda</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-sm-4 g-3">
                            @if ($produk->count() > 0)
                                @foreach ($produk as $item)
                                    <div class="col-xl-4 col-md-6">
                                        <div class="prooduct-details-box">
                                            <div class="d-flex">
                                                <a href="/produk/details-product/{{ $item->id_produk }}">
                                                    <img class="align-self-center img-fluid img-60"
                                                    src="{{ asset('storage/' . $item->gambar) }}" alt="#">
                                                </a>
                                                <div class="flex-grow-1 ms-3">
                                                    <div class="product-name mb-1">
                                                        <h6><a href="/produk/details-product/{{ $item->id_produk }}">{{ $item->name }}</a></h6>
                                                    </div>
                                                    <div class="avaiabilty">
                                                        <div class="text-success">{{ $item->stok }} {{$item->satuan->nama_satuan}}</div>
                                                    </div>
                                                    <div class="price d-flex">
                                                        {{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}
                                                    </div>
                                                    <a class="btn btn-primary btn-xs" href="/produk/details-product/{{ $item->id_produk }}">Live</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center">
                                    <div class="alert alert-info">
                                        <p class="mb-0">Anda belum memiliki produk. Silakan tambahkan produk baru.</p>
                                    </div>
                                    <a href="/produk/create" class="btn btn-primary mt-3">Tambah Produk
                                        Baru</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
