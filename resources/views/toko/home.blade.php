@extends('toko.layout')

@section('content')

<section class="hero-panel mb-4">
    <div>
        <span class="badge text-bg-light text-success mb-3 px-3 py-2">
            Koleksi pilihan toko
        </span>
        <h1 class="display-6 fw-bold mb-3">
            Temukan buku yang pas untuk dibaca hari ini.
        </h1>
        <p class="mb-0">
            Jelajahi katalog buku, pilih judul favorit, lalu tambahkan ke keranjang dengan cepat.
        </p>
    </div>
</section>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
    <div>
        <h2 class="section-title h3 mb-1">Katalog Buku</h2>
        <p class="text-muted mb-0">Buku terbaru dan stok siap dipesan.</p>
    </div>

    <span class="badge rounded-pill text-bg-light border px-3 py-2">
        {{ $bukus->count() }} judul tersedia
    </span>
</div>

<div class="row g-4">
    @forelse($bukus as $buku)
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card book-card">
                @if($buku->gambar)
                    <img src="{{ asset('storage/'.$buku->gambar) }}"
                         class="book-cover"
                         alt="Cover {{ $buku->judul }}">
                @else
                    <div class="book-cover-placeholder">
                        <i class="bi bi-book"></i>
                    </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <span class="text-muted small mb-2">
                        <i class="bi bi-tag"></i>
                        {{ $buku->kategori->nama_kategori }}
                    </span>

                    <h5 class="fw-bold mb-2">
                        {{ $buku->judul }}
                    </h5>

                    <p class="text-muted small mb-3">
                        {{ $buku->penulis }}
                    </p>

                    <div class="mt-auto">
                        <div class="price-text h5 mb-3">
                            Rp {{ number_format($buku->harga,0,',','.') }}
                        </div>

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
