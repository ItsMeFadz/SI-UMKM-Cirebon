<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        return view('auth.regist', [
            'title' => 'Regist',
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
    

}
