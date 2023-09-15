<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Etalase extends Model
{
    use HasFactory;   

    protected $table = 'etalase';
    protected $guarded = ['kode_etalase'];
    public $timestamps = false;

    public function kategori() {

        return $this->belongsTo(Kategori::class, 'kode_kategori', 'kode_kategori');
    }

}
