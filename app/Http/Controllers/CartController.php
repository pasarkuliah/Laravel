<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class CartController extends Controller
{
    // Menampilkan isi keranjang
   // Menampilkan isi keranjang
   public function showCart()
   {
       // Dapatkan keranjang belanja user
       $cartItems = Cart::where('user_id', Auth::id())->get();

       // variabel untuk total harga
       $totalPrice = 0;

       // Hitung total harga
       foreach ($cartItems as $item) {
           $totalPrice += $item->product->price * $item->quantity;
       }

       // Kirim data ke tampilan
       return view('cart.show', compact('cartItems', 'totalPrice'));
   }

   // Menambah produk ke keranjang
   public function addToCart(Request $request)
   {
       // Validasi permintaan
       $request->validate([
           'product_id' => 'required|exists:products,id',
       ]);

       // Memastikan pengguna telah login
       if (!Auth::check()) {
           return redirect()->route('login')->with('error', 'Please login to add products to your cart.');
       }

       // Dapatkan ID produk dari permintaan
       $productId = $request->input('product_id');

       // Dapatkan produk dari database
       $product = Product::find($productId);

       // Simpan produk ke dalam keranjang pengguna yang sudah login
       $cartItem = new Cart();
       $cartItem->user_id = Auth::id(); // ID pengguna yang sedang login
       $cartItem->product_id = $product->id;
       $cartItem->quantity = 1;
       $cartItem->save();

       // redirect ke halaman keranjang
       return redirect()->route('cart.show')->with('success', 'Product added to cart successfully.');
   }

   // Menghapus produk dari keranjang
   public function removeFromCart($productId)
   {
       // Hapus produk dari keranjang pengguna yang sudah login
       Cart::where('user_id', Auth::id())->where('product_id', $productId)->delete();

       // Redirect ke halaman keranjang
       return redirect()->route('cart.show')->with('success', 'Product removed from cart.');
   }

   public function updateCart(Request $request, $productId)
   {
       // Dapatkan tindakan dari permintaan
       $action = $request->input('action');

       // Dapatkan keranjang dari session pengguna yang sudah login
       $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();

       // Periksa apakah produk ada dalam keranjang
       if ($cartItem) {
           // Dapatkan kuantitas saat ini
           $quantity = $cartItem->quantity;

           // Perbarui kuantitas berdasarkan tindakan
           if ($action === 'increase') {
               $quantity += 1; // Tambah kuantitas
           } elseif ($action === 'decrease' && $quantity > 1) {
               $quantity -= 1; // Kurangi kuantitas, pastikan tidak kurang dari 1
           }

           // Perbarui kuantitas dalam keranjang
           $cartItem->quantity = $quantity;
           $cartItem->save();
       }

       // Redirect ke halaman keranjang
       return redirect()->route('cart.show');
   }
}