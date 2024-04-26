<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Buat tabel checkouts
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Kolom untuk menyimpan ID pengguna dengan constraint foreign key, jika pengguna dihapus, hapus juga checkout-nya
            $table->string('name'); // Kolom untuk menyimpan nama penerima pesanan
            $table->string('address'); // Kolom untuk menyimpan alamat pengiriman pesanan
            $table->string('city'); // Kolom untuk menyimpan kota pengiriman pesanan
            $table->string('phone'); // Kolom untuk menyimpan nomor telepon penerima pesanan
            $table->string('payment_method'); // Kolom untuk menyimpan metode pembayaran
            $table->decimal('total_price', 10, 2); // Kolom untuk menyimpan total harga pesanan (10 digit maksimum, 2 digit di belakang koma)
            $table->timestamps(); // Kolom untuk timestamp created_at dan updated_at
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel 'checkouts' jika sudah ada
        Schema::dropIfExists('checkouts');
    }
};
