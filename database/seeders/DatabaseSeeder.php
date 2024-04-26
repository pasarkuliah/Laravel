<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Membuat data produk untuk di masukan kedalam database
        Product::create([
            'name' => 'Seragam Telkom University (Merah - XL)',
            'description' => 'Seragam resmi universitas',
            'price' => 125000.00,
            'image_url' => '/images/5a7650cb-e9af-42d2-885f-4328dafa2f7b.png.jpeg',
            'category_id' => 4,
        ]);

       
        Product::create([
            'name' => 'Seragam Telkom University (Putih - M)',
            'description' => 'Seragam resmi universitas',
            'price' => 125000.00,
            'image_url' => '/images/25c4fbfa3cea240863f924a83cb17c0b.jpeg',
            'category_id' => 4,
        ]);

        Product::create([
            'name' => 'Landyard (Hitam)',
            'description' => 'Seragam resmi universitas',
            'price' => 25000.00,
            'image_url' => '/images/taliidcard10.jpg',
            'category_id' => 4,
        ]);
        
        Product::create([
            'name' => 'Rak Sepatu (Putih - 3 tingkat)',
            'description' => 'Seragam resmi universitas',
            'price' => 70000.00,
            'image_url' => '/images/brd-60517_rak-sepatu-4-susun-aesthetic-minimalis-serbaguna-black-color_full02-f900107b.jpg',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Buku Tulis (A5 - 36 sheets)',
            'description' => 'Seragam resmi universitas',
            'price' => 10000.00,
            'image_url' => '/images/products-tatakan-gelas.jpg',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Sapu Lantai',
            'description' => 'Seragam resmi universitas',
            'price' => 17000.00,
            'image_url' => '/images/aspuu.jpg',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Sepatu Nike AirMax (Hitam - ukr 40)',
            'description' => 'Seragam resmi universitas',
            'price' => 300000.00,
            'image_url' => '/images/products-black-edition-nike.jpg',
            'category_id' => 4,
        ]);

        Product::create([
            'name' => 'USB Mouse (Cream)',
            'description' => 'Seragam resmi universitas',
            'price' => 130000.00,
            'image_url' => '/images/Ataru-Mouse-Wireless.jpg',
            'category_id' => 3,
        ]);

        // Membuat 4 kategori
        $categories = [
            ['name' => 'Stationery', 'image_url' => '/images/categories-Stationery.svg'],
            ['name' => 'Furniture', 'image_url' => '/images/categories-furniture.svg'],
            ['name' => 'Tools', 'image_url' => '/images/categories-tools.svg'],
            ['name' => 'Attribute', 'image_url' => '/images/categories-Attribute.svg'],
        ];

        // Menyimpan data kategori
        foreach ($categories as $category) {
            Category::create($category);
        }
        
    }
}
