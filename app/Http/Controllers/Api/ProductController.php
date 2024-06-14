<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function findAll()
    {
        $products = Product::all();

        // Loop through each product
        foreach ($products as $product) {
            // Check if the product is in the user's wishlist
            $isInWishlist = Wishlist::where('product_id', $product->id)
                ->where('user_id', auth()->id())
                ->exists();

            $product->wishlist = $isInWishlist;
        }
        return response()->json(['data' => $products]);
    }

    public function productsByCategory($id)
    {
        // Ambil data kategori berdasarkan ID
        $category = Category::findOrFail($id);

        // Ambil produk berdasarkan kategori
        $products = Product::where('category_id', $id)->get();

        return response()->json([
            'data' => [
                'products' => $products,
                'category' => $category
            ]
        ]);
    }
}
