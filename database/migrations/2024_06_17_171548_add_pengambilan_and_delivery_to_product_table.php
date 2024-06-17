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
        Schema::table('product', function (Blueprint $table) {
            $table->string('pengambilan')->nullable()->after('image'); // Menambahkan kolom 'pengambilan'
            $table->string('delivery')->nullable()->after('pengambilan'); // Menambahkan kolom 'delivery'
            $table->unsignedInteger('sold')->default(0)->after('delivery'); // Menambahkan kolom 'sold'

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('pengambilan'); // Menghapus kolom 'pengambilan'
            $table->dropColumn('delivery'); // Menghapus kolom 'delivery'
            $table->dropColumn('sold');
        });
    }
};
