<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Menampilkan formulir pendaftaran.
     */
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    /**
     * Menangani permintaan POST untuk menyimpan data pengguna.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = Validator::make($request->all(), [
            'username' => ['required', 'min:3', 'max:50', 'unique:users,username'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        // Jika validasi gagal, kembali lagi
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        // Hashing password sebelum disimpan
        $data = $validatedData->validated();
        $data['password'] = Hash::make($data['password']);

        // Buat pengguna baru
        User::create($data);

        // Redirect ke halaman login 
        return redirect()->route('login')->with('success', __('Pendaftaran berhasil. Silakan login.'));
    }
}
