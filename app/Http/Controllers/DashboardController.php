<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProdukModel;
use App\Models\UmkmModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $produk = ProdukModel::where('id_pengguna', Auth::id())->get();
        return view('pages.dashboard.index', [
            'title' => 'dashboard',
            'active' => 'dashboard',
            'produk' => $produk
        ]);
    }
}
