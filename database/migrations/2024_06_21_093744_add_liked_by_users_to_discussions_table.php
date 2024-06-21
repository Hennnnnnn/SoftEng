<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('discussions', function (Blueprint $table) {
            $table->json('liked_by_users')->nullable(); // Kolom untuk menyimpan ID pengguna yang menyukai diskusi
        });
    }

    /**
     * Membalikkan migrasi.
     */
    public function down(): void
    {
        Schema::table('discussions', function (Blueprint $table) {
            $table->dropColumn('liked_by_users'); // Menghapus kolom jika rollback migrasi
        });
    }
};
