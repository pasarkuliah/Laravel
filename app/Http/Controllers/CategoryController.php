<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar kategori.
     */
    public function index()
    {
        // Ambil data semua kategori dari database
        $categories = Category::all();

        // Ambil produk terbaru dari database
        $products = Product::latest()->get();

        // Kembalikan view dengan data kategori
        return view('categories', compact('categories', 'products'));
    }

}
