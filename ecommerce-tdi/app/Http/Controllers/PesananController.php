<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{

    public function getDetailTransaksi($id_transaksi, $kode_produk)
{
    // Cari data dari tabel Pesanan beserta data yang terkait dari tabel Produk dan Transaksi.
    $pesanan = Pesanan::with('produk', 'transaksi')
        ->where([
            'id_transaksi' => $id_transaksi,
            'kode_produk' => $kode_produk,
        ])
        ->first();

    // Periksa apakah data ditemukan.
    if ($pesanan) {
        return response()->json(['data' => $pesanan]);
    } else {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}

}
