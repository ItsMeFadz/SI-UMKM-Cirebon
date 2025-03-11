<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UmkmModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilumkmController extends Controller
{
    public function index()
    {
        // Ambil ID pengguna yang sedang login
        $userId = auth()->id();
        $user = User::with('umkm')->find($userId);
        // Ambil data UMKM berdasarkan user yang login
        $umkm = \DB::table('kelola_umkm')->where('id_pengguna', $userId)->first();

        $userKat = $umkm->id_kategori ?? null;
        $userKab = $umkm->id_kabupaten ?? null;
        $userKec = $umkm->id_kecamatan ?? null;

        // Ambil daftar kategori, kabupaten, dan kecamatan
        $kat = \DB::table('kategori')->select('id_kategori', 'nama_kategori')->distinct()->get();
        $kab = \DB::table('kabupaten')->select('id_kabupaten', 'nama_kabupaten')->distinct()->get();
        $kec = \DB::table('kecamatan')->select('id_kecamatan', 'nama_kecamatan')->distinct()->get();

        return view('pages.profil-umkm.index', [
            'title' => 'profil-umkm',
            'active' => 'profil-umkm',
            'user' => $user,
            'userKat' => $userKat,
            'userKab' => $userKab,
            'userKec' => $userKec,
            'kat' => $kat,
            'kab' => $kab,
            'kec' => $kec,
        ]);
    }

    public function update_account(Request $request, $id)
    {
        $pengguna = User::find($id);

        if (!$pengguna) {
            return redirect('/profil-umkm')->with('error', 'Data pengguna tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'nullable',
            'password' => 'nullable|confirmed|min:8', // Password tidak wajib diisi
            'disetujui' => 'nullable',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'email' => 'Kolom :attribute harus berupa email yang valid.',
            'min' => [
                'string' => 'Kolom :attribute minimal :min karakter.',
            ],
            'confirmed' => 'Konfirmasi password tidak cocok.',
            'required_with' => 'Kolom password lama harus diisi jika ingin mengubah password.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            // Hanya update password jika diisi
            if (!empty($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']); // Hapus jika kosong agar tidak merubah yang lama
            }

            $pengguna->update($validatedData);

            return redirect('/profil-umkm')->with('success', 'Data Berhasil Diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }

    public function update_umkm(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_umkm' => 'required|string|max:255',
            'foto_profil_umkm' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_wa' => 'nullable|string',
            'link_marketplace' => 'nullable|string',
            'link_gmaps' => 'nullable|string',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_kabupaten' => 'required|exists:kabupaten,id_kabupaten',
            'id_kecamatan' => 'required|exists:kecamatan,id_kecamatan',
            'alamat' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $umkm = UmkmModel::findOrFail($id);

        // Update fields
        $umkm->nama_umkm = $request->nama_umkm;
        $umkm->link_wa = $request->link_wa;
        $umkm->link_marketplace = $request->link_marketplace;
        $umkm->link_gmaps = $request->link_gmaps;
        $umkm->id_kategori = $request->id_kategori;
        $umkm->id_kabupaten = $request->id_kabupaten;
        $umkm->id_kecamatan = $request->id_kecamatan;
        $umkm->alamat = $request->alamat;

        // Handle file upload
        if ($request->hasFile('foto_profil_umkm')) {
            $file = $request->file('foto_profil_umkm');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('umkm_profiles', $fileName, 'public');

            // Delete old file if exists
            if ($umkm->foto_profil_umkm) {
                Storage::delete('public/' . $umkm->foto_profil_umkm);
            }

            $umkm->foto_profil_umkm = $filePath;
        }

        $umkm->save();

        return redirect()->back()->with('success', 'Profil UMKM berhasil diperbarui!');
    }
}
