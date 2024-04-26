<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    // Mendefinisikan kolom-kolom yang dapat diisi
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // Definisi relasi ke model Product
    public function product()
    {
        // Relasi 'belongsTo' menghubungkan Cart dengan Product berdasarkan foreign key 'product_id'
        return $this->belongsTo(Product::class);
    }
}
