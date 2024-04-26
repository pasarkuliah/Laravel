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
        // Buat tabel products
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('name'); // Nama produk
            $table->text('description')->nullable(); // Deskripsi produk
            $table->decimal('price', 10, 2); // Harga produk
            $table->string('image_url')->nullable(); // URL gambar produk
            $table->unsignedBigInteger('category_id'); // Kolom category_id
            $table->timestamps(); // Kolom untuk timestamp created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel products jika sudah ada
        Schema::dropIfExists('products');
    }
};
