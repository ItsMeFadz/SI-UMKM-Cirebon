<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UmkmModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        // $settingItem = SettingModel::first();
        // dd(Auth::check());
        return view('auth.index', [
            'title' => 'Login',
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }
    public function registrasi()
    {
        // $roles = \DB::table('users')->select('role')->distinct()->get();
        $kat = \DB::table('kategori')->select('id_kategori', 'nama_kategori')->distinct()->get();
        $kab = \DB::table('kabupaten')->select('id_kabupaten', 'nama_kabupaten')->distinct()->get();
        $kec = \DB::table('kecamatan')->select('id_kecamatan', 'nama_kecamatan')->distinct()->get();
        return view('auth.regist', [
            'title' => 'Regist',
            // 'roles' => $roles,
            'kat' => $kat,
            'kab' => $kab,
            'kec' => $kec,
        ]);
    }

    public function login_proses(Request $request)
    {
        Log::info('Data yang diterima:', $request->all());

        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], [
            'email.exists' => 'Email tidak terdaftar.',
            'password.required' => 'Password harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Ambil data user yang login

            // Cek apakah akun sudah disetujui atau belum
            if ($user->disetujui == 0) {
                Auth::logout(); // Logout pengguna jika belum diverifikasi
                Log::warning('Gagal login: Akun belum diverifikasi untuk email ' . $user->email);
                return redirect()->back()->with('loginError', 'Akun Anda belum diverifikasi. Silakan tunggu persetujuan.')->withInput();
            }

            $request->session()->regenerate();
            Log::info('Login berhasil untuk: ' . $user->email);
            return redirect()->route('Dashboard');
        }

        Log::error('Gagal login: Password salah');
        return redirect()->back()->with('loginError', 'Gagal Masuk, password salah')->withInput();
    }

    public function logout(Request $request)
    {
        Log::info('Logout method called');

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }

    public function registrasiProses(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:0,1',
            
            // UMKM data validation
            'nama_umkm' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_kabupaten' => 'required|exists:kabupaten,id_kabupaten',
            'id_kecamatan' => 'required|exists:kecamatan,id_kecamatan',
            'alamat' => 'required|string',
            'foto_profil_umkm' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link_wa' => 'required|string',
            'link_marketplace' => 'nullable|string',
            'link_gmaps' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Process the data in a transaction to ensure data integrity
        try {
            DB::beginTransaction();

            // Create user first
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password, // Will be hashed by the model's boot method
                'role' => $request->role,
                'disetujui' => 1, // Default to not approved
            ]);

            // Handle file upload
            $fotoPath = null;
            if ($request->hasFile('foto_profil_umkm')) {
                $file = $request->file('foto_profil_umkm');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $fotoPath = $file->storeAs('umkm_profiles', $fileName, 'public');
            }

            // Create or update UMKM record
            if ($user->umkm) {
                // Update the UMKM model that was automatically created in User's booted method
                $user->umkm->update([
                    'nama_umkm' => $request->nama_umkm,
                    'id_kategori' => $request->id_kategori,
                    'id_kabupaten' => $request->id_kabupaten,
                    'id_kecamatan' => $request->id_kecamatan,
                    'alamat' => $request->alamat,
                    'foto_profil_umkm' => $fotoPath,
                    'link_wa' => $request->link_wa,
                    'link_marketplace' => $request->link_marketplace,
                    'link_gmaps' => $request->link_gmaps,
                ]);
            } else {
                // Create a new UMKM record if not automatically created
                $umkm = UmkmModel::create([
                    'id_pengguna' => $user->id,
                    'nama_umkm' => $request->nama_umkm,
                    'id_kategori' => $request->id_kategori,
                    'id_kabupaten' => $request->id_kabupaten,
                    'id_kecamatan' => $request->id_kecamatan,
                    'alamat' => $request->alamat,
                    'nama_pemilik' => $user->name,
                    'foto_profil_umkm' => $fotoPath,
                    'link_wa' => $request->link_wa,
                    'link_marketplace' => $request->link_marketplace,
                    'link_gmaps' => $request->link_gmaps,
                ]);
                
                // Update user with the UMKM ID
                $user->update(['id_umkm' => $umkm->id_umkm]);
            }

            DB::commit();

            // Redirect with success message
            return redirect()->route('login')->with('success', 'Registrasi berhasil. Silahkan tunggu persetujuan admin untuk mengakses akun Anda.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }


}
