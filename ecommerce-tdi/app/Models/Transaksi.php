<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = ['id_transaksi'];
    public $timestamps = false;

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'id_transaksi', 'id_transaksi');
    }
}
