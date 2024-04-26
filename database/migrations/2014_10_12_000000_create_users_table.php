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
        // Buat tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('username'); // Kolom username
            $table->string('email')->unique(); // Kolom email dengan constraint unique
            $table->string('password'); // Kolom password
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel 'users' jika sudah ada
        Schema::dropIfExists('users');
    }
};
