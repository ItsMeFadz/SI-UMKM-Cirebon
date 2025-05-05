<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\SatuanModel;

class SatuanController extends Controller
{
    public function index(){
        
        $satuan = SatuanModel::orderBy('nama_satuan', 'asc')->get();

        return view('pages.satuan.index', [
            'title' => 'satuan',
            'active' => 'satuan',
            'satuan' => $satuan,
        ]);
    }
    public function create(){
        return view('pages.satuan.create', [
            'title' => 'create',
            'active' => 'create'
        ]);
    }
    public function edit($id){
        return view('pages.satuan.edit', [
            'title' => 'edit',
            'active' => 'edit',
            'satuan' => SatuanModel::findOrFail($id),
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_satuan' => 'required|unique:satuan,nama_satuan',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama Satuan Sudah Digunakan.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            SatuanModel::create($validatedData);

            return redirect('/satuan')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Nama satuan Sudah Digunakan.');
        }

    }
    public function update(Request $request, $id)
    {
        $satuan = SatuanModel::find($id);

        if (!$satuan) {
            return redirect('/satuan')->with('error', 'Data satuan tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'nama_satuan' => 'required|unique:satuan,nama_satuan',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama Satuan Sudah Digunakan.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }


            $validatedData = $validator->validated();

            $satuan->update($validatedData);

            return redirect('/satuan')->with('success', 'Data Berhasil Diperbarui!');
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
        $satuan = SatuanModel::find($id);

        if (!$satuan) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        $satuan->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }
}
