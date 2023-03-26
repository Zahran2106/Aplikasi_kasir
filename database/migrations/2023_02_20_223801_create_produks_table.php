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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();  
            $table->integer('kode_barang');
            $table->string('nama_barang');
            $table->string('kategori');
            $table->integer('stok_barang');
            $table->string('satuan');
            $table->integer('harga_modal');
            $table->integer('harga_jual');
            $table->string('foto_barang');
            $table->string('status_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
