<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    // Tentukan atribut yang bisa diisi
    protected $fillable = ['user_id', 'total_price', 'status', 'created_at', 'updated_at'];

    // Hubungan dengan model User
    public function user()
    {
        // Relasi 'belongsTo' menghubungkan Order dengan User berdasarkan foreign key 'user_id'
        return $this->belongsTo(User::class);
    }

    // Hubungan dengan model Product
    public function products()
    {
        // Relasi 'belongsToMany' menunjukkan bahwa Order memiliki banyak Product melalui tabel pivot 'order_product'
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    }
}
