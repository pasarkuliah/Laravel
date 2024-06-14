<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WishlistController extends Controller
{
    //
    /**
     * Add a product to the user's wishlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToWishlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            throw new BadRequestException($validator->errors()->first());
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
        ]);

        return response()->json(['message' => 'Product added to wishlist successfully']);
    }

    /**
     * Remove a product from the user's wishlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeFromWishlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            throw new BadRequestException($validator->errors()->first());
        }

        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->delete();

        return response()->json(['message' => 'Product removed from wishlist successfully']);
    }

    /**
     * Get the user's wishlist.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWishlist()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->with('product')->get();

        return response()->json(['wishlist' => $wishlist]);
    }
}
