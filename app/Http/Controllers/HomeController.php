<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua kategori dari database
        $categories = Category::all();
        
        // Ambil produk terbaru dari database
        $products = Product::latest()->get();
        
        // menampilan data kategori dan produk di tampilan home
        return view('home', compact('categories', 'products'));
    }
}
