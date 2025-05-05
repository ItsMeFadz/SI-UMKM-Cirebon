<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {

        $pengguna = User::orderBy('name', 'asc')->get();

        return view('pages.pengguna.index', [
            'title' => 'pengguna',
            'active' => 'pengguna',
            'pengguna' => $pengguna,
        ]);
    }
    public function create()
    {
        return view('pages.pengguna.create', [
            'title' => 'create',
            'active' => 'create'
        ]);
    }
    public function edit($id)
    {
        return view('pages.pengguna.edit', [
            'title' => 'edit',
            'active' => 'edit',
            'pengguna' => User::findOrFail($id),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:0,1',
            'password' => 'required|min:8',
            'disetujui' => 'required|in:0,1'
        ],[
            'unique' => 'Email Sudah Digunakan Oleh Pengguna Lain.',
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

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        try {
            // Create user
            $user = User::create($validatedData);

            return redirect('/pengguna')
                ->with('success', 'Data Pengguna Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $pengguna = User::find($id);

        if (!$pengguna) {
            return redirect('/pengguna')->with('error', 'Data pengguna tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'nullable|confirmed|min:8', // Password tidak wajib diisi
            'disetujui' => 'required',
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

            return redirect('/pengguna')->with('success', 'Data Berhasil Diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }

    public function destroy(int $id)
    {
        $pengguna = User::find($id);

        if (!$pengguna) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        $pengguna->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }
}
