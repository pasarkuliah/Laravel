<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Mendefinisikan kolom-kolom yang dapat diisi
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'category_id' // Tambahkan category_id
    ];

     // Definisi relasi many-to-many ke model Cart
     public function carts()
     {
        // Relasi 'belongsToMany' menunjukkan bahwa Product dapat berada dalam banyak Cart
         return $this->belongsToMany(Cart::class);
     }

    // Mendefinisikan nama tabel
    protected $table = 'products';

    // Definisi relasi one-to-many ke model Product itu sendiri
    public function products()
    {
        // Relasi 'hasMany' menunjukkan bahwa Product dapat memiliki banyak Product lainnya (mungkin ini tidak diinginkan)
        return $this->hasMany(Product::class);
    }

     // Definisi relasi many-to-one ke model Category
    public function category()
    {
        // Relasi 'belongsTo' menunjukkan bahwa Product terhubung dengan satu Category
        return $this->belongsTo(Category::class);
    }
}