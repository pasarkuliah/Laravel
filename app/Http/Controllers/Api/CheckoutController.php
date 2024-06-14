<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    //
    public function checkoutProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'payment_method' => 'required|string',
            'cart_items' => 'required|array',
        ]);

        if ($validator->fails()) {
            throw new BadRequestException($validator->errors()->first());
        }

        $cartItems = $request->cart_items;
        $totalPrice = 0;

        $cartIds = [];
        // Hitung total harga dari keranjang
        foreach ($cartItems as $item) {
            $totalPrice += $item['product']['price'] * $item['quantity'];
            $itemIds = $item['id'];
            $cart =  Cart::where('id', $item['id'])->first();
            if ($cart && isset($cart->checkout_id)) {
                throw new BadRequestException("ops kamu sudah melakukan checkout pada cart ini");
            }
            array_push($cartIds, $itemIds);
        }

        // Simpan data checkout ke dalam database
        $checkout = checkout::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
            'total_price' => $totalPrice,
        ]);

        // Simpan detail item keranjang ke dalam database
        Cart::whereIn('id', $cartIds)->update(['checkout_id' => $checkout->id]);


        // Response berhasil checkout
        return response()->json(['message' => 'Checkout successful', 'checkout_id' => $checkout->id]);
    }
}
