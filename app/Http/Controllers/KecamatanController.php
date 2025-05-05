<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KecamatanModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class KecamatanController extends Controller
{
    public function index()
    {

        $kecamatan = KecamatanModel::orderBy('nama_kecamatan', 'asc')->get();

        return view('pages.kecamatan.index', [
            'title' => 'kecamatan',
            'active' => 'kecamatan',
            'kecamatan' => $kecamatan,
        ]);
    }
    public function create()
    {
        return view('pages.kecamatan.create', [
            'title' => 'create',
            'active' => 'create'
        ]);
    }
    public function edit($id)
    {
        return view('pages.kecamatan.edit', [
            'title' => 'edit',
            'active' => 'edit',
            'kecamatan' => KecamatanModel::findOrFail($id),
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kecamatan' => 'required|unique:kecamatan,nama_kecamatan',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama kecamatan Sudah Digunakan.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            KecamatanModel::create($validatedData);

            return redirect('/kecamatan')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Nama kecamatan Sudah Digunakan.');
        }

    }
    public function update(Request $request, $id)
    {
        $kecamatan = KecamatanModel::find($id);

        if (!$kecamatan) {
            return redirect('/kecamatan')->with('error', 'Data kecamatan tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'nama_kecamatan' => 'required|unique:kecamatan,nama_kecamatan',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama kecamatan Sudah Digunakan.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }


            $validatedData = $validator->validated();

            $kecamatan->update($validatedData);

            return redirect('/kecamatan')->with('success', 'Data Berhasil Diperbarui!');
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
        $kecamatan = KecamatanModel::find($id);

        if (!$kecamatan) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        $kecamatan->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }
}
