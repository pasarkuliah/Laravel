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
        // Buat tabel 'carts'
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Kolom untuk menyimpan ID pengguna
            $table->unsignedBigInteger('product_id'); // Kolom untuk menyimpan ID produk
            $table->integer('quantity')->default(1);  // Kolom untuk menyimpan jumlah produk dalam keranjang, defaultnya 1
            $table->timestamps(); // Kolom untuk timestamp created_at dan updated_at
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('checkout_id')->nullable()->references('id')->on('checkouts')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel 'carts' jika sudah ada
        Schema::dropIfExists('carts');
    }
};
