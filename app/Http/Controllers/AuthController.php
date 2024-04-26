<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Fungsi untuk menangani logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Mengarahkan pengguna ke halaman login setelah logout
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
