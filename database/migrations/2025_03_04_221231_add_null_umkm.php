<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('kelola_umkm', function (Blueprint $table) {
            // Make these columns nullable
            $table->unsignedInteger('id_kategori')->nullable()->change();
            $table->unsignedInteger('id_kabupaten')->nullable()->change();
            $table->unsignedInteger('id_kecamatan')->nullable()->change();
            $table->string('nama_umkm')->nullable()->change();
            $table->text('deskripsi')->nullable()->change();
            $table->string('nama_pemilik')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
