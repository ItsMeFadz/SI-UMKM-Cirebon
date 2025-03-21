@extends('layouts.main')

@section('content')
    {{-- Header Container --}}
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Ecommerce</h3>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/dasboard">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Ecommerce</li>
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Body Container --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <div class="col-xl-2 col-md-6 col-sm-12">
                            <div class="btn-showcase mt-1">
                                <a href="produk/create"><button class="btn btn-primary-gradien" type="button">Tambah
                                        Data</button></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="table-responsive custom-scrollbar">
                            <table class="table table-hover" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $item)
                                        <tr>
                                            <td>
                                                @if ($item->gambar)
                                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Produk" class="img-thumbnail">
                                                @else
                                                    <span>Tidak ada gambar</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->kategori ? $item->kategori->nama_kategori : 'Tidak Ada Kategori' }}</td>
                                            <td>{{ $item->id_satuan ? $item->satuan->nama_satuan : 'Tidak Ada Kategori' }}</td>
                                            <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li>
                                                        <a href="produk/edit/{{ $item->id_produk }}"><i
                                                                class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <form id="deleteForm{{ $item->id_produk }}"
                                                        action="/produk/delete/{{ $item->id_produk }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <li class="delete"><a href="#"
                                                                onclick="confirmDelete({{ $item->id_produk }})"><i
                                                                    class="icon-trash"></i></a></li>
                                                    </form>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
