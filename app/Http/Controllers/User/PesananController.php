<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Menampilkan semua pesanan milik customer
     */
    public function index()
    {
        $pesanans = Pesanan::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('toko.pesanan.index', compact('pesanans'));
    }

    /**
     * Menampilkan detail pesanan
     */
    public function show($id)
    {
        $pesanan = Pesanan::with('detailPesanans.buku')
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('toko.pesanan.show', compact('pesanan'));
    }
}