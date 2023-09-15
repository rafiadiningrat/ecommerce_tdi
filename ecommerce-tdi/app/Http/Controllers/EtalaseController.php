<?php

namespace App\Http\Controllers;

use App\Models\Etalase;
use Illuminate\Http\Request;

class EtalaseController extends Controller
{
    //
    public function getAllEtalase()
    {
        $etalase = Etalase::all();
        return $etalase;
    }

    public function getEtalase($kode_kategori)
    {
        $etalase = Etalase::with('kategori')->where('kode_kategori', $kode_kategori)->get();
        $etalaseResponse = [];
        foreach ($etalase as $value) {
            array_push($etalaseResponse, [
                'kode_etalase' => $value->kode_etalase,
                'nama_kategori' => $value->kategori->nama_kategori,
                'nama_etalase' => $value->nama_etalase,
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $etalaseResponse
        ], 200);
    }
}
