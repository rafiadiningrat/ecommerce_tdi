<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    //
    public function getAllProduk()
    {
        $produk = Produk::all();
        return $produk;
    }

    public function getProdukByKategori($kode_kategori)
{
    $produk = Produk::whereHas('etalase', function ($query) use ($kode_kategori) {
            $query->where('kode_kategori', $kode_kategori);
        })
        ->with('etalase.kategori') 
        ->get();

    $produkResponse = [];

    foreach ($produk as $value) {
        $etalase = $value->etalase;
        $kategori = $etalase->kategori; 

        array_push($produkResponse, [
            'kode_produk' => $value->kode_produk,
            'nama_kategori' => $kategori->nama_kategori,
            'nama_etalase' => $etalase->nama_etalase,
            'nama_produk' => $value->nama_produk,
            'harga_produk' => $value->harga_produk,
            'stok_produk' => $value->stok_produk,
            'foto_produk' => $value->foto_produk,
            'berat_produk' => $value->berat_produk,
            'ukuran_produk' => $value->ukuran_produk,
            'deskripsi_produk' => $value->deskripsi_produk,
            'varian_produk' => $value->varian_produk,
        ]);
    }

    return response()->json([
        'success' => true,
        'data' => $produkResponse
    ], 200);
}



    public function getProdukByEtalase($kode_kategori, $kode_etalase)
    {
        $produk = Produk::whereHas('etalase', function ($query) use ($kode_kategori, $kode_etalase) {
            $query->where('kode_kategori', $kode_kategori)
                ->where('kode_etalase', $kode_etalase);
        })
        ->with('etalase.kategori')
        ->get();

        $produkResponse = [];

        foreach ($produk as $value) {
            $etalase = $value->etalase;
            $kategori = $etalase->kategori;

            array_push($produkResponse, [
                'kode_produk' => $value->kode_produk,
                'nama_kategori' => $kategori->nama_kategori,
                'nama_etalase' => $etalase->nama_etalase,
                'nama_produk' => $value->nama_produk,
                'harga_produk' => $value->harga_produk,
                'stok_produk' => $value->stok_produk,
                'foto_produk' => $value->foto_produk,
                'berat_produk' => $value->berat_produk,
                'ukuran_produk' => $value->ukuran_produk,
                'deskripsi_produk' => $value->deskripsi_produk,
                'varian_produk' => $value->varian_produk,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $produkResponse
        ], 200);
    }

    public function getDetailProduk($kode_produk)
{
    $produk = Produk::where('kode_produk', $kode_produk)
        ->with('etalase.kategori')
        ->first();

    if (!$produk) {
        return response()->json([
            'success' => false,
            'message' => 'Produk tidak ditemukan'
        ], 404);
    }

    $etalase = $produk->etalase;
    $kategori = $etalase->kategori;

    $produkResponse = [
        'kode_produk' => $produk->kode_produk,
        'nama_kategori' => $kategori->nama_kategori,
        'nama_etalase' => $etalase->nama_etalase,
        'nama_produk' => $produk->nama_produk,
        'harga_produk' => $produk->harga_produk,
        'stok_produk' => $produk->stok_produk,
        'foto_produk' => $produk->foto_produk,
        'berat_produk' => $produk->berat_produk,
        'ukuran_produk' => $produk->ukuran_produk,
        'deskripsi_produk' => $produk->deskripsi_produk,
        'varian_produk' => $produk->varian_produk,
    ];

    return response()->json([
        'success' => true,
        'data' => $produkResponse
    ], 200);
}

}
