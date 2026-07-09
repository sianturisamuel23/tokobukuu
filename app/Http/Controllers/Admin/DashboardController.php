<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalKategori = Kategori::count();
        $totalPesanan = Pesanan::count();
        $totalUser = User::count();

        return view('admin.dashboard', compact(
            'totalBuku',
            'totalKategori',
            'totalPesanan',
            'totalUser'
        ));
    }
}