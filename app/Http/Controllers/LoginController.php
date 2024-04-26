<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan formulir login.
     */
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    /**
     * Menangani permintaan POST untuk proses login pengguna.
     */
    public function login(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba otentikasi pengguna
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika berhasil, arahkan pengguna ke halaman home
            return redirect()->intended('/homesuccess');
        }

        // Jika gagal, kembali ke halaman login
        return redirect()->back()->withErrors([
            'email' => __('Email tidak ditemukan atau Password salah.'),
        ])->withInput($request->only('email'));
    }
}
