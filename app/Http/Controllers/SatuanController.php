<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index(){
        return view('pages.satuan.index', [
            'title' => 'satuan',
            'active' => 'satuan'
        ]);
    }
    public function create(){
        return view('pages.satuan.create', [
            'title' => 'create',
            'active' => 'create'
        ]);
    }
}
