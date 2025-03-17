<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\UmkmModel;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::with(['kategori', 'satuan'])->get();
        $kategori = KategoriModel::orderBy('nama_kategori', 'asc')->get();

        return view('landing.home.produk', [
            'title' => 'landing',
            'active' => 'landing',
            'produk' => $produk,
            'kategori' => $kategori,
        ]);
    }
    public function list_umkm()
    {
        $umkm = UmkmModel::orderBy('nama_umkm', 'asc')->get();

        return view('landing.home.list-umkm', [
            'title' => 'list-umkm',
            'active' => 'list-umkm',
            'umkm' => $umkm,
            // 'kategori' => $kategori,
        ]);
    }

    public function details_umkm($id)
    {
        $umkm = UmkmModel::with('produk')->findOrFail($id);
        return view('landing.home.detail-umkm', [
            'title' => 'details-umkm',
            'active' => 'details-umkm',
            'umkm' => UmkmModel::findOrFail($id),
            'produk' => $umkm->produk,
        ]);
    }

    public function details_product($id)
    {
        $produk = ProdukModel::findOrFail($id);

        // Ambil semua produk dari UMKM yang sama, kecuali produk yang sedang dilihat
        $produk_umkm = ProdukModel::where('id_pengguna', $produk->id_pengguna)
            ->where('id_produk', '!=', $id) // Tidak termasuk produk yang sedang dilihat
            ->latest() // Urutkan berdasarkan waktu terbaru
            ->take(7)
            ->get();

        return view('landing.home.detail-produk', [
            'title' => 'detail',
            'active' => 'details',
            // 'produk' => ProdukModel::findOrFail($id),
            'produk' => $produk,
            'produk_umkm' => $produk_umkm, 
        ]);
    }
}
