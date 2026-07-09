<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;

class HomeController extends Controller
{
    public function index()
    {
        $bukus = Buku::with('kategori')->latest()->get();

        return view('toko.home', compact('bukus'));
    }
}