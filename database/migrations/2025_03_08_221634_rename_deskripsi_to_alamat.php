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
        Schema::table('kelola_umkm', function (Blueprint $table) {
            // Hapus kolom deskripsi
            if (Schema::hasColumn('kelola_umkm', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }

            // Tambahkan kolom alamat setelah nama_umkm
            $table->text('alamat')->after('nama_umkm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kelola_umkm', function (Blueprint $table) {
            // Hapus kolom alamat
            if (Schema::hasColumn('kelola_umkm', 'alamat')) {
                $table->dropColumn('alamat');
            }

            // Tambahkan kembali kolom deskripsi
            $table->text('deskripsi')->after('nama_umkm');
        });
    }
};
