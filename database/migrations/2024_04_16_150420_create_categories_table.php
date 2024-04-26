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
        // Buat tabel categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('name'); // Kolom nama kategori
            $table->string('image_url'); // Kolom untuk URL gambar kategori
            $table->timestamps(); // Kolom untuk timestamp created_at dan updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel 'categories' jika sudah ada
        Schema::dropIfExists('categories');
    }
};
