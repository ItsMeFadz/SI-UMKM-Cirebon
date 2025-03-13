@extends('layouts.main')

@section('content')
    {{-- Header Container --}}
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Profil UMKM</h3>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/dasboard">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Eccomerce</li>
                        <li class="breadcrumb-item active">Profil Eccomerce</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Body Container --}}
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-4"></h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
                                        class="fe fe-chevron-up"></i></a>
                                <a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body mt-1">
                            <form action="/profil-umkm/update_account/{{ $user->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row mb-2">
                                    <div class="profile-title">
                                        <div class="d-flex align-items-center">
                                            @if (!empty($user->umkm->foto_profil_umkm))
                                                <img class="profile-img" alt="Profil UMKM"
                                                    src="{{ asset('storage/' . $user->umkm->foto_profil_umkm) }}">
                                            @else
                                                <!-- Default image jika tidak ada foto -->
                                                <img class="profile-img" alt="Default Profile"
                                                    src="{{ asset('path/to/default-image.jpg') }}">
                                            @endif
                                            <div class="flex-grow-1 ms-3">
                                                <h3 class="mb-1 f-w-600">{{ $user->name }}</h3>
                                                <p>{{ $user->role == 0 ? 'Admin' : 'Penjual' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control input-air-primary" placeholder="Dhanu Herdiansyah"
                                        name="name" value="{{ $user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control input-air-primary" placeholder="your-email@domain.com"
                                        name="email" value="{{ $user->email }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Aktivitas Akun</label>
                                    <select class="form-select input-air-primary" name="disetujui" disabled>
                                        <option value="0" {{ $user->disetujui == 0 ? 'selected' : '' }}>Tidak Aktif
                                        </option>
                                        <option value="1" {{ $user->disetujui == 1 ? 'selected' : '' }}>Aktif
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password Baru</label>
                                    <input class="form-control input-air-primary" type="password"
                                        name="password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Konfirmasi Password</label>
                                    <input class="form-control input-air-primary" type="password"
                                        name="password_confirmation">
                                </div>
                                <div class="form-footer">
                                    <button class="btn btn-primary btn-block">Update Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form class="card" action="/profil-umkm/update_umkm/{{ $user->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-4"></h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
                                        class="fe fe-chevron-up"></i></a>
                                <a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body mt-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Nama UMKM</label>
                                        <input class="form-control input-air-primary" type="text" placeholder="Nama UMKM"
                                            name="nama_umkm" value="{{ $user->umkm->nama_umkm ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Profil UMKM</label>
                                        <input class="form-control input-air-primary" id="formFileDocument" type="file"
                                            aria-label="file example" name="foto_profil_umkm">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Link Wa</label>
                                        <input class="form-control input-air-primary" name="link_wa"
                                            value="{{ $user->umkm->link_wa ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Link Marketplace</label>
                                        <input class="form-control input-air-primary" type="text"
                                            name="link_marketplace" value="{{ $user->umkm->link_marketplace ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Link Gmaps</label>
                                        <input class="form-control input-air-primary" type="text" name="link_gmaps"
                                            value="{{ $user->umkm->link_gmaps ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-select input-air-primary" name="id_kategori">
                                            <option selected disabled>--- Pilih Kategori ---</option>
                                            @foreach ($kat as $item)
                                                <option value="{{ $item->id_kategori }}"
                                                    {{ $item->id_kategori == $userKat ? 'selected' : '' }}>
                                                    {{ ucfirst($item->nama_kategori) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Kabupaten</label>
                                        <select class="form-select input-air-primary" name="id_kabupaten">
                                            <option selected disabled>--- Pilih Kabupaten ---</option>
                                            @foreach ($kab as $item)
                                                <option value="{{ $item->id_kabupaten }}"
                                                    {{ $item->id_kabupaten == $userKab ? 'selected' : '' }}>
                                                    {{ ucfirst($item->nama_kabupaten) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        <select class="form-select input-air-primary" name="id_kecamatan">
                                            <option selected disabled>--- Pilih Kecamatan ---</option>
                                            @foreach ($kec as $item)
                                                <option value="{{ $item->id_kecamatan }}"
                                                    {{ $item->id_kecamatan == $userKat ? 'selected' : '' }}>
                                                    {{ ucfirst($item->nama_kecamatan) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div>
                                        <label class="form-label">Alamat Lengkap</label>
                                        <textarea class="form-control input-air-primary" rows="4" placeholder="Enter About your description"
                                            name="alamat">{{ $user->umkm->alamat ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
