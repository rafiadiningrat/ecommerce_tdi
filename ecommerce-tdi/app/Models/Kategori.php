<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $guarded = ['kode_kategori'];
    public $timestamps = false;

    public function etalases() {

        return $this->hasMany(Etalase::class);
    }

    
}
