<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etalase;
use App\Models\Kategori;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $guarded = ['kode_produk'];
    public $timestamps = false;

    public function etalase() {

        return $this->belongsTo(Etalase::class, 'kode_etalase', 'kode_etalase');
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'kode_produk', 'kode_produk');
    }

    public function kategori()
    {
        return $this->hasManyThrough(
            Kategori::class,
            Etalase::class,
            'kode_etalase',
            'kode_kategori',
            'kode_etalase',
            'kode_kategori'
        );
    }
}
