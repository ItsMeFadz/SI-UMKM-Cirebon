@extends('layouts.main')

@section('content')
    {{-- Header Container --}}
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Pengguna</h3>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Master Data</li>
                        <li class="breadcrumb-item">pengguna</li>
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
                    <form class="form theme-form dark-inputs mt-3" action="/pengguna/update/{{ $pengguna->id }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput15">Nama Lengkap</label>
                                        <input class="form-control input-air-primary" name="name" type="text"
                                            value="{{ $pengguna->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput15">Email address</label>
                                        <input class="form-control input-air-primary" name="email" type="email"
                                            value="{{ $pengguna->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect17">Role</label>
                                        <select class="form-select input-air-primary digits" name="role" type="text">
                                            <option value="0" @selected($pengguna->role == 0)>Admin</option>
                                            <option value="1" @selected($pengguna->role == 1)>Penjual</option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect17">Aktifitas
                                            Pengguna</label>
                                        <select class="form-select input-air-primary digits" name="disetujui" type="text">
                                            <option value="0" @selected($pengguna->disetujui == 0)>Tidak Aktif</option>
                                            <option value="1" @selected($pengguna->disetujui == 1)>Aktif</option>
                                        </select>
                                        @error('disetujui')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword16">Password Baru</label>
                                        <input class="form-control input-air-primary" type="password" name="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword16">Konfirmasi Password</label>
                                        <input class="form-control input-air-primary" type="password" name="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary me-3" type="submit">Submit</button>
                            <a href="/pengguna">
                                <input class="btn btn-light" type="reset" value="Cancel">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
