<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Menampilkan semua pesanan
     */
    public function index()
    {
        $pesanans = Pesanan::with('user')
            ->latest()
            ->get();

        return view('admin.pesanan.index', compact('pesanans'));
    }

    /**
     * Menampilkan detail pesanan
     */
    public function show($id)
    {
        $pesanan = Pesanan::with([
            'user',
            'detailPesanans.buku'
        ])->findOrFail($id);

        return view('admin.pesanan.show', compact('pesanan'));
    }

    /**
     * Mengubah status pesanan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai',
        ]);

        $pesanan = Pesanan::findOrFail($id);

        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()
            ->route('pesanan.index')
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}