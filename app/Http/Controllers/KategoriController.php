<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index(){
        
        $kategori = KategoriModel::orderBy('nama_kategori', 'asc')->get();

        return view('pages.kategori.index', [
            'title' => 'kategori',
            'active' => 'kategori',
            'kategori' => $kategori,
        ]);
    }
    public function create(){
        return view('pages.kategori.create', [
            'title' => 'create',
            'active' => 'create'
        ]);
    }
    public function edit($id){
        return view('pages.kategori.edit', [
            'title' => 'edit',
            'active' => 'edit',
            'kategori' => KategoriModel::findOrFail($id),
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
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

            KategoriModel::create($validatedData);

            return redirect('/kategori')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Kode kategori Sudah Digunakan.');
        }

    }
    public function update(Request $request, $id)
    {
        $kategori = KategoriModel::find($id);

        if (!$kategori) {
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
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

            $kategori->update($validatedData);

            return redirect('/kategori')->with('success', 'Data Berhasil Diperbarui!');
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
        $kategori = KategoriModel::find($id);

        if (!$kategori) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        $kategori->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }
}
