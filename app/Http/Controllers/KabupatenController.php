<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KabupatenModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class KabupatenController extends Controller
{
    public function index()
    {

        $kabupaten = KabupatenModel::orderBy('nama_kabupaten', 'asc')->get();

        return view('pages.kabupaten.index', [
            'title' => 'kabupaten',
            'active' => 'kabupaten',
            'kabupaten' => $kabupaten,
        ]);
    }
    public function create()
    {
        return view('pages.kabupaten.create', [
            'title' => 'create',
            'active' => 'create'
        ]);
    }
    public function edit($id)
    {
        return view('pages.kabupaten.edit', [
            'title' => 'edit',
            'active' => 'edit',
            'kabupaten' => KabupatenModel::findOrFail($id),
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kabupaten' => 'required',
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

            KabupatenModel::create($validatedData);

            return redirect('/kabupaten')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Kode kabupaten Sudah Digunakan.');
        }

    }
    public function update(Request $request, $id)
    {
        $kabupaten = KabupatenModel::find($id);

        if (!$kabupaten) {
            return redirect('/kabupaten')->with('error', 'Data kabupaten tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'nama_kabupaten' => 'required',
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

            $kabupaten->update($validatedData);

            return redirect('/kabupaten')->with('success', 'Data Berhasil Diperbarui!');
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
        $kabupaten = KabupatenModel::find($id);

        if (!$kabupaten) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        $kabupaten->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }
}
