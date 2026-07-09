@extends('toko.layout')

@section('content')

<div class="p-5 mb-4 bg-white rounded shadow">

    <h2 class="fw-bold">

        Selamat Datang di Toko Buku 📚

    </h2>

    <p>

        Temukan berbagai koleksi buku favoritmu dengan harga terbaik.

    </p>

</div>

<div class="row">

@forelse($bukus as $buku)

<div class="col-lg-3 col-md-4 col-sm-6 mb-4">

    <div class="card shadow h-100">

        @if($buku->gambar)

        <img src="{{ asset('storage/'.$buku->gambar) }}"
             class="card-img-top"
             style="height:300px;object-fit:cover;">

        @endif

        <div class="card-body">

            <h5>

                {{ $buku->judul }}

            </h5>

            <p class="text-muted">

                {{ $buku->kategori->nama_kategori }}

            </p>

            <h5 class="text-success">

                Rp {{ number_format($buku->harga,0,',','.') }}

            </h5>

        </div>

        <div class="card-footer bg-white">

            <form action="{{ route('cart.add', $buku->id) }}" method="POST">
    @csrf

    <button type="submit" class="btn btn-primary w-100">
        <i class="bi bi-cart-plus"></i>
        Tambah Keranjang
    </button>
</form>

        </div>

    </div>

</div>

@empty

<div class="col-12">

<div class="alert alert-warning">

Belum ada buku.

</div>

</div>

@endforelse

</div>

@endsection