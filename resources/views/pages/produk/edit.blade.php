@extends('layouts.main')

@section('content')
    {{-- Header Container --}}
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Produk</h3>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Master Data</li>
                        <li class="breadcrumb-item">Produk</li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Body Container --}}
    <div class="container-fluid general-widget">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Form Edit Data</h4>
                    </div>
                    <hr>
                    <form class="form mt-3" action="/produk/update/{{ $produk->id_produk }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="row">
                                <div id="image-preview-container" class=" d-none">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Preview Produk</h5>
                                        </div>
                                        <div class="card-body text-center">
                                            <img id="preview-image" class="img-fluid" style="max-height: 200px; max-width: 200px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nama Produk<span
                                                class="txt-danger">*</span></label>
                                        <input class="form-control input-air-primary" id="name" name="name"
                                            value="{{ $produk->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="kategori">Kategori<span
                                                class="txt-danger">*</span></label>
                                        <select class="form-select input-air-primary" name="id_kategori" required>
                                            <option selected disabled>--- Pilih Kategori ---</option>
                                            @foreach ($kat as $item)
                                                <option value="{{ $item->id_kategori }}"
                                                    {{ $item->id_kategori == $userKat ? 'selected' : '' }}>
                                                    {{ ucfirst($item->nama_kategori) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_kategori')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="satuan">Satuan<span
                                                class="txt-danger">*</span></label>
                                        <select class="form-select input-air-primary" name="id_satuan" required>
                                            <option selected disabled>--- Pilih Satuan ---</option>
                                            @foreach ($sat as $item)
                                                <option value="{{ $item->id_satuan }}"
                                                    {{ $item->id_satuan == $userKat ? 'selected' : '' }}>
                                                    {{ ucfirst($item->nama_satuan) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_satuan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="stok">Stok<span
                                                class="txt-danger">*</span></label>
                                        <input class="form-control input-air-primary" name="stok" type="number"
                                            value="{{ $produk->stok }}">
                                        @error('stok')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="harga">Harga<span
                                                class="txt-danger">*</span></label>
                                        <input class="form-control input-air-primary" name="harga" id="harga"
                                            value="{{ $produk->harga }}">
                                        @error('harga')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="link">Link Produk Eccomerce (Opsional)</label>
                                        <input class="form-control input-air-primary" id="link" name="link"
                                            placeholder="https://Shoope/" value="{{ $produk->link }}">
                                        @error('link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="gambar">Gambar<span
                                                class="txt-danger">*</span></label>
                                        <input class="form-control input-air-primary" id="formFileDocument" type="file"
                                            aria-label="file example" name="gambar">
                                        @error('gambar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="givefeedback">Deskripsi<span
                                            class="txt-danger">*</span></label>
                                    <textarea class="form-control input-air-primary" id="givefeedback" required="" name="deskripsi">{{ $produk->deskripsi }}</textarea>
                                    <div class="invalid-feedback">Please enter a message in the textarea.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary me-3" type="submit">Submit</button>
                            <a href="/produk" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="cropped_image" id="cropped-image-input">

    <!-- Modal for Cropper -->
    <div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropperModalLabel">Crop Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="img-container">
                        <img id="cropper-image" src="" class="img-fluid" alt="Preview Image">
                    </div>
                    <div class="mt-1">
                        <button type="button" class="btn btn-sm btn-outline-secondary" id="zoom-in">
                            <i class="fa fa-search-plus"></i> Zoom In
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" id="zoom-out">
                            <i class="fa fa-search-minus"></i> Zoom Out
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop-image">Crop &
                        Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
