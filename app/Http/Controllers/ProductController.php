<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil semua data produk dari database
        $products = Product::all();
        

        // Ambil semua kategori dari database
        $categories = Category::all();

        // Kembalikan view dengan data produk dan kategori
        return view('homesuccess', ['products' => $products, 'categories' => $categories]);
        
    }

    

     /**
     * Menampilkan produk berdasarkan kategori.
     * 
     * @param int $id ID kategori
     * @return \Illuminate\View\View
     */
    // Tambahkan metode untuk menangani permintaan produk berdasarkan kategori
    public function productsByCategory($id)
    {
        // Ambil data kategori berdasarkan ID
        $category = Category::findOrFail($id);

        // Ambil produk berdasarkan kategori
        $products = Product::where('category_id', $id)->get();

        // Kembalikan tampilan dengan data kategori dan produk
        return view('category-products', [
            'category' => $category,
            'products' => $products,
        ]);
    }

    public function search(Request $request)
    {
        // Ambil input pencarian dari permintaan
        $query = $request->input('query');
    
        // Cari produk berdasarkan nama yang cocok dengan query
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->get();
    
        // Kembalikan hasil pencarian ke view
        return view('search_results', ['products' => $products]);
    }

}
