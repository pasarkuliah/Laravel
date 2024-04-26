<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    // Mendefinisikan kolom-kolom yang dapat diisi
    protected $fillable = [
        'user_id', // ID pengguna yang melakukan checkout
        'name', // Nama penerima pesanan
        'address', // Alamat pengiriman pesanan
        'city', // Kota pengiriman pesanan
        'phone', // Nomor telepon penerima pesanan
        'payment_method', // Metode pembayaran yang dipilih
        'total_price' // Total harga pesanan
    ];
}
