<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $guarded = ['id_transaksi', 'kode_produk'];
    public $timestamps = false;

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'kode_produk', 'kode_produk');
    }

    // Definisikan relasi many-to-many ke model "Transaksi".
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
}
