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
        Schema::create('kelola_umkm', function (Blueprint $table) {
            $table->id('id_umkm'); // Primary key, auto-increment
            $table->unsignedBigInteger('id_pengguna'); // Foreign key ke tabel users
            $table->unsignedInteger('id_kategori'); // Foreign key ke tabel kategori
            $table->unsignedInteger('id_kabupaten'); // Foreign key ke tabel kabupaten
            $table->unsignedInteger('id_kecamatan'); // Foreign key ke tabel kecamatan
            $table->string('nama_umkm');
            $table->text('deskripsi');
            $table->string('nama_pemilik');
            $table->string('foto_profil_umkm')->nullable(); // Kolom opsional
            $table->string('link_wa')->nullable(); // Kolom opsional
            $table->string('link_marketplace')->nullable(); // Kolom opsional
            $table->string('link_gmaps')->nullable(); // Kolom opsional
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_umkm');
    }
};
