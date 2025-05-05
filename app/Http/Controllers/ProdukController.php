<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProdukModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {

        $produk = ProdukModel::where('id_pengguna', Auth::id())
        ->orderBy('name', 'asc')
        ->get();

        return view('pages.produk.index', [
            'title' => 'produk',
            'active' => 'produk',
            'produk' => $produk,
        ]);
    }
    public function create()
    {

        $kat = \DB::table('kategori')->select('id_kategori', 'nama_kategori')->distinct()->get();
        $sat = \DB::table('satuan')->select('id_satuan', 'nama_satuan')->distinct()->get();

        return view('pages.produk.create', [
            'title' => 'create',
            'active' => 'create',
            'kat' => $kat,
            'sat' => $sat,
        ]);
    }
    public function edit($id)
    {

        $userId = auth()->id();
        $user = User::with('produk')->find($userId);

        // Ambil data UMKM berdasarkan user yang login
        $produk = \DB::table('produk')->where('id_pengguna', $userId)->first();

        $userKat = $produk->id_kategori ?? null;
        $userSat = $produk->id_satuan ?? null;

        // Ambil daftar kategori, kabupaten, dan kecamatan
        $kat = \DB::table('kategori')->select('id_kategori', 'nama_kategori')->distinct()->get();
        $sat = \DB::table('satuan')->select('id_satuan', 'nama_satuan')->distinct()->get();
        return view('pages.produk.edit', [
            'title' => 'edit',
            'active' => 'edit',
            'user' => $user,
            'produk' => ProdukModel::findOrFail($id),
            'userKat' => $userKat,
            'userSat' => $userSat,
            'kat' => $kat,
            'sat' => $sat,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_satuan' => 'required|exists:satuan,id_satuan',
            'name' => 'required|unique:produk,name',
            'stok' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'link' => 'nullable|url', // ini harus diatur dalam database supaya null
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'unique' => 'Nama Produk Sudah Digunakan.',
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Format gambar harus: jpeg, png, jpg, atau gif.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
                'file' => 'Ukuran :attribute maksimal :max KB.',
            ],
            'url' => 'Kolom :attribute harus berupa URL yang valid.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();
            $validatedData['id_pengguna'] = Auth::id();

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $fotoPath = $file->storeAs('image_product', $fileName, 'public');
                $validatedData['gambar'] = $fotoPath;
            }

            $validatedData['harga'] = str_replace(',', '', $request->harga); // Hapus pemisah ribuan sebelum menyimpan

            ProdukModel::create($validatedData);

            return redirect('/produk')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $produk = ProdukModel::find($id);

        if (!$produk) {
            return redirect('/produk')->with('error', 'Data produk tidak ditemukan.');
        }

        // Validasi input form
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:produk,name',
            'id_kategori' => 'required|integer',
            'id_satuan' => 'required|integer',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'link' => 'nullable|url',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'unique' => 'Nama Produk Sudah Digunakan.',
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'url' => 'Kolom :attribute harus berupa URL yang valid.',
            'image' => 'Kolom :attribute harus berupa gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: jpeg, png, jpg, gif.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
                'file' => 'Ukuran :attribute maksimal :max KB.',
            ],
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            // Jika ada gambar baru, upload dan hapus gambar lama
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($produk->gambar) {
                    Storage::delete('public/' . $produk->gambar);
                }

                // Simpan gambar baru
                $gambarPath = $request->file('gambar')->store('produk', 'public');
                $validatedData['gambar'] = $gambarPath;
            }

            $validatedData['harga'] = str_replace(',', '', $request->harga); 

            // Update data produk
            $produk->update($validatedData);

            return redirect('/produk')->with('success', 'Data Berhasil Diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
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
