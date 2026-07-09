@extends('toko.layout')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Keranjang Belanja
    </h2>

    @if($cart->count() > 0)

    @php
        $total = 0;
    @endphp

    <table class="table table-bordered bg-white align-middle">

        <thead class="table-light">

        <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Harga</th>
            <th width="180">Jumlah</th>
            <th>Subtotal</th>
            <th width="120">Aksi</th>
        </tr>

        </thead>

        <tbody>

        @foreach($cart as $item)

        @php
            $subtotal = $item->buku->harga * $item->jumlah;
            $total += $subtotal;
        @endphp

        <tr>

            <td>

                @if($item->buku->gambar)

                    <img src="{{ asset('storage/'.$item->buku->gambar) }}"
                         width="70">

                @endif

            </td>

            <td>

                {{ $item->buku->judul }}

            </td>

            <td>

                Rp {{ number_format($item->buku->harga,0,',','.') }}

            </td>

            <td>

                <form action="{{ route('cart.update',$item->id) }}" method="POST">

                    @csrf

                    <input
                        type="number"
                        name="jumlah"
                        min="1"
                        value="{{ $item->jumlah }}"
                        class="form-control mb-2">

                    <button class="btn btn-success btn-sm w-100">

                        Update

                    </button>

                </form>

            </td>

            <td>

                Rp {{ number_format($subtotal,0,',','.') }}

            </td>

            <td>

                <form action="{{ route('cart.remove',$item->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm w-100">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

    <div class="text-end">

        <h4>

            Total :
            Rp {{ number_format($total,0,',','.') }}

        </h4>

        <a href="{{ route('checkout.index') }}" class="btn btn-success">
    <i class="bi bi-credit-card"></i>
    Checkout
</a>

    </div>

    @else

    <div class="alert alert-warning">

        Keranjang masih kosong.

    </div>

    @endif

</div>

@endsection