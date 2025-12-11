<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations (menambah kolom).
     */
    public function up(): void
    {
        // LOGIKA DITAMBAHKAN DI SINI:
        Schema::table('products', function (Blueprint $table) {
            /**
             * Tambahkan kolom 'store_name' sebagai string.
             * Diletakkan 'after('id')' agar mudah dibaca di DB.
             * Dibuat 'nullable()' agar aman jika tabel sudah berisi data.
             */
            $table->string('store_name', 255)->after('id')->nullable(); 
        });
    }

    /**
     * Reverse the migrations (menghapus kolom saat rollback).
     */
    public function down(): void
    {
        // LOGIKA DITAMBAHKAN DI SINI:
        Schema::table('products', function (Blueprint $table) {
            // Menghapus kolom 'store_name' jika migrasi di-rollback
            $table->dropColumn('store_name');
        });
    }
};