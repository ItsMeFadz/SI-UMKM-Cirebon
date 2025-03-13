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
                        <li class="breadcrumb-item active">create</li>
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
                        <h4>Form Tambah Data</h4>
                    </div>
                    <hr>
                    <form class="form mt-3" action="/produk/store" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nama Produk<span
                                                class="txt-danger">*</span></label>
                                        <input class="form-control input-air-primary" id="name" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="kategori">Kategori<span
                                                class="txt-danger">*</span></label>
                                        <select class="form-select" name="id_kategori" required>
                                            <option selected disabled>--- Pilih Kategori ---</option>
                                            @foreach ($kat as $item)
                                                <option value="{{ $item->id_kategori }}"
                                                    {{ old('id_kategori') == $item->id_kategori ? 'selected' : '' }}>
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
                                        <select class="form-select" name="id_satuan" required>
                                            <option selected disabled>--- Pilih Satuan ---</option>
                                            @foreach ($sat as $item)
                                                <option value="{{ $item->id_satuan }}"
                                                    {{ old('id_satuan') == $item->id_satuan ? 'selected' : '' }}>
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
                                            value="{{ old('stok') }}">
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
                                            value="{{ old('harga') }}">
                                        @error('harga')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="link">Link Produk Eccomerce (Opsional)</label>
                                        <input class="form-control input-air-primary" id="link" name="link"
                                            placeholder="https://Shoope/" value="{{ old('link') }}">
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
                                            aria-label="file example" name="gambar" value="{{ old('gambar') }}">
                                        @error('gambar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="givefeedback">Deskripsi<span
                                            class="txt-danger">*</span></label>
                                    <textarea class="form-control input-air-primary" id="givefeedback" required="" name="deskripsi">{{ old('deskripsi') }}</textarea>
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
@endsection
