<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout
     */
    public function index()
    {
        $cart = Cart::with('buku')
            ->where('user_id', auth()->id())
            ->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        $total = $cart->sum(function ($item) {
            return $item->buku->harga * $item->jumlah;
        });

        return view('toko.checkout', compact('cart', 'total'));
    }

    /**
     * Proses checkout
     */
    public function store()
    {
        $cart = Cart::with('buku')
            ->where('user_id', auth()->id())
            ->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        DB::beginTransaction();

        try {

            $total = $cart->sum(function ($item) {
                return $item->buku->harga * $item->jumlah;
            });

            $pesanan = Pesanan::create([
                'user_id'       => auth()->id(),
                'kode_pesanan'  => 'PSN-' . date('YmdHis') . rand(100, 999),
                'tanggal'       => now()->toDateString(),
                'total_harga'   => $total,
                'status'        => 'Menunggu',
            ]);

            foreach ($cart as $item) {

                if ($item->buku->stok < $item->jumlah) {
                    throw new \Exception(
                        'Stok buku "' . $item->buku->judul . '" tidak mencukupi.'
                    );
                }

                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'buku_id'    => $item->buku_id,
                    'jumlah'     => $item->jumlah,
                    'harga'      => $item->buku->harga,
                    'subtotal'   => $item->jumlah * $item->buku->harga,
                ]);

                $item->buku->decrement('stok', $item->jumlah);
            }

            Cart::where('user_id', auth()->id())->delete();

            DB::commit();

            return redirect()
                ->route('home')
                ->with('success', 'Checkout berhasil. Pesanan berhasil dibuat.');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}