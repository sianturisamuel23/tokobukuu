<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::with('kategori')->latest()->get();

        return view('admin.buku.index', compact('bukus'));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('admin.buku.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|unique:bukus',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('buku', 'public');
        }

        Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'gambar' => $gambar
        ]);

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
        $kategoris = Kategori::all();

        return view('admin.buku.edit', compact('buku', 'kategoris'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'kode_buku' => 'required|unique:bukus,kode_buku,' . $buku->id,
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambar = $buku->gambar;

        if ($request->hasFile('gambar')) {

            if ($gambar) {
                Storage::disk('public')->delete($gambar);
            }

            $gambar = $request->file('gambar')->store('buku', 'public');
        }

        $buku->update([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'gambar' => $gambar
        ]);

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        if ($buku->gambar) {
            Storage::disk('public')->delete($buku->gambar);
        }

        $buku->delete();

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}