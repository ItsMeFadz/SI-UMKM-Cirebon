@extends('layouts.main')

@section('content')
    {{-- Header Container --}}
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Kabupaten</h3>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/dasboard">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Master Data</li>
                        <li class="breadcrumb-item active">Kabupaten</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Body Container --}}
    <div class="container-fluid general-widget">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <div class="col-xl-2 col-md-6 col-sm-12">
                            <div class="btn-showcase mt-1">
                                <a href="kabupaten/create"><button class="btn btn-primary-gradien" type="button">Tambah
                                        Data</button></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="table-responsive custom-scrollbar">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Kabupaten</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kabupaten as $item)
                                        <tr>
                                            <td>{{ $item->nama_kabupaten }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li>
                                                        <a href="kabupaten/edit/{{ $item->id_kabupaten }}"><i class="icon-pencil-alt"></i></a>
                                                    </li>
                                                    <form id="deleteForm{{ $item->id_kabupaten }}"
                                                        action="/kabupaten/delete/{{ $item->id_kabupaten }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                            <li class="delete"><a href="#"
                                                                onclick="confirmDelete({{ $item->id_kabupaten }})"><i class="icon-trash"></i></a></li>
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
