<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index(){
        
        // $produk = ProdukModel::orderBy('nama_produk', 'asc')->get();

        return view('pages.produk.index', [
            'title' => 'produk',
            'active' => 'produk',
            // 'produk' => $produk,
        ]);
    }
    public function create(){
        return view('pages.produk.create', [
            'title' => 'create',
            'active' => 'create'
        ]);
    }
    public function edit($id){
        return view('pages.produk.edit', [
            'title' => 'edit',
            'active' => 'edit',
            'produk' => ProdukModel::findOrFail($id),
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama budaya sudah ada. Harap pilih nama budaya yang lain.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            ProdukModel::create($validatedData);

            return redirect('/produk')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Kode produk Sudah Digunakan.');
        }

    }
    public function update(Request $request, $id)
    {
        $produk = ProdukModel::find($id);

        if (!$produk) {
            return redirect('/produk')->with('error', 'Data produk tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama budaya sudah ada. Harap pilih nama budaya yang lain.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }


            $validatedData = $validator->validated();

            $produk->update($validatedData);

            return redirect('/produk')->with('success', 'Data Berhasil Diperbarui!');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }

    public function destroy(int $id)
    {
        $produk = ProdukModel::find($id);

        if (!$produk) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }
}
