<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Checkout;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil data keranjang
        $cartItems = session('cart', []);
        $totalPrice = 0;

        // Hitung total harga
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Kirim data produk dan total harga ke tampilan checkout
        return view('cart.checkout', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function processCheckout(Request $request)
    {
        // Validasi data checkout
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // Simpan data checkout ke dalam database
        Checkout::create([
            'user_id' => auth()->id(), // ID pengguna yang sudah login
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
        ]);

        // Redirect pengguna ke halaman sukses
        return redirect()->route('checkout.success')->with('success', 'Checkout successful!');
    }

    public function checkoutProcess(Request $request)
    {
        // Ambil data keranjang
        $cartItems = session('cart', []);
        $totalPrice = 0;
        
        // Hitung total harga dari keranjang
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        
        // Simpan data checkout ke dalam database
        Checkout::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
            'total_price' => $totalPrice,
        ]);
        
        // Kosongkan data cart setelah checkout
        Cart::truncate(); 
        
        // Kosongkan session keranjang belanja setelah checkout
        session()->forget('cart');
        
        // Arahkan pengguna langsung ke halaman paymentSuccess
        return redirect()->route('paymentSuccess');
    }
    public function showCheckout()
    {
        // ambil data dari keranjang session
        $cartItems = Session::get('cart');
        
        // menghitung total harga
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        
        // mengarah ke tampilan checkout
        return view('checkout', compact('cartItems', 'totalPrice'));
    }
    
    
}