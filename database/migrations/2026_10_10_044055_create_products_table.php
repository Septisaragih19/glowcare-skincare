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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // Nama produk skincare
            $table->string('brand')->nullable();  // Brand/Merk (boleh kosong)
            $table->integer('price');            // Harga produk
            $table->integer('stock')->default(0); // Stok produk
            $table->text('description')->nullable(); // Deskripsi
            $table->string('image')->nullable();  // Tempat menyimpan path/nama file gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
