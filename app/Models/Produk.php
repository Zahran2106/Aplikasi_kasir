<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $fillable = [
        'kode_barang', 
        'nama_barang', 
        'kategori', 
        'stok_barang', 
        'satuan', 
        'harga_modal', 
        'harga_jual', 
        'staus_barang', 
        'foto_barang'
    ];
}
