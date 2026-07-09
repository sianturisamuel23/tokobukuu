<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('buku')
            ->where('user_id', auth()->id())
            ->get();

        return view('toko.cart', compact('cart'));
    }

    public function add($id)
    {
        $buku = Buku::findOrFail($id);

        $cart = Cart::where('user_id', auth()->id())
            ->where('buku_id', $buku->id)
            ->first();

        if ($cart) {

            $cart->jumlah += 1;
            $cart->save();

        } else {

            Cart::create([
                'user_id' => auth()->id(),
                'buku_id' => $buku->id,
                'jumlah' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        $cart = Cart::findOrFail($id);

        $cart->update([
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        Cart::findOrFail($id)->delete();

        return redirect()->route('cart.index')
            ->with('success', 'Buku dihapus dari keranjang.');
    }
}