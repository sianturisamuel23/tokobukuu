@extends('toko.layout')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Checkout
    </h2>

    <table class="table table-bordered bg-white align-middle">

        <thead class="table-light">
            <tr>
                <th>Judul Buku</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>

        <tbody>

        @foreach($cart as $item)

            <tr>

                <td>{{ $item->buku->judul }}</td>

                <td>
                    Rp {{ number_format($item->buku->harga,0,',','.') }}
                </td>

                <td>{{ $item->jumlah }}</td>

                <td>
                    Rp {{ number_format($item->buku->harga * $item->jumlah,0,',','.') }}
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    <div class="text-end">

        <h3 class="mb-3">

            Total :

            Rp {{ number_format($total,0,',','.') }}

        </h3>

        <form action="{{ route('checkout.store') }}" method="POST">

            @csrf

            <button class="btn btn-success btn-lg">

                <i class="bi bi-bag-check-fill"></i>

                Buat Pesanan

            </button>

        </form>

    </div>

</div>

@endsection