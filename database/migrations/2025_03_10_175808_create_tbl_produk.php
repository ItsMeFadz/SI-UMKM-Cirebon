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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk'); 
            $table->unsignedBigInteger('id_pengguna'); 
            $table->unsignedInteger('id_kategori'); 
            $table->unsignedInteger('id_satuan'); 
            $table->string('name');
            $table->unsignedInteger('stok'); 
            $table->unsignedBigInteger('harga');
            $table->text('deskripsi');
            $table->string('link');
            $table->string('gambar');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
