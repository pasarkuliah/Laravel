<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    // Mendefinisikan kolom-kolom yang dapat diisi
    protected $fillable = [
        'name',
        'image_url',
    ];

    // Definisi relasi ke model Product
    public function products()
    {
        // Relasi 'hasMany' menunjukkan bahwa Category memiliki banyak Product
        return $this->hasMany(Product::class);
    }

        // Nama tabel
    protected $table = 'categories';
    
}