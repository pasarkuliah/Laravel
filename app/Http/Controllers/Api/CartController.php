<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    //

    public function getCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->whereNull('checkout_id')->get();

        // variabel untuk total harga
        $totalPrice = 0;

        // Hitung total harga
        foreach ($cartItems as $item) {
            $totalPrice += $item->product->price * $item->quantity;
        }

        return response()->json(
            [
                'data' => [
                    'cart' => $cartItems,
                    'total_price' => $totalPrice
                ]
            ]
        );
    }


    public function removeFromCart($productId)
    {
        // Hapus produk dari keranjang pengguna yang sudah login
        Cart::where('user_id', Auth::id())->where('product_id', $productId)->delete();

        return response()->json(
            [
                'data' => true
            ],
            200
        );
    }


    public function addToCart(Request $request)
    {
        // Validasi permintaan
        try {
            //code...
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|exists:products,id',
            ]);


            if ($validator->fails()) {
                throw new BadRequestException($validator->errors()->first());
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

            return response()->json([
                'data' => true
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function updateCart(Request $request, $productId)
    {
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
    }
}
