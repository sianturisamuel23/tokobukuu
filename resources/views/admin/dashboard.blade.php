@extends('admin.layouts.app')

@section('title','Dashboard')

@section('judul','Dashboard')

@section('content')

<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card">
            <div class="card-body">
                <div>
                    <p class="text-muted fw-semibold mb-1">Total Buku</p>
                    <h2 class="fw-bold mb-0">{{ $totalBuku }}</h2>
                </div>
                <span class="stat-icon"><i class="bi bi-journal-bookmark"></i></span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card">
            <div class="card-body">
                <div>
                    <p class="text-muted fw-semibold mb-1">Total Kategori</p>
                    <h2 class="fw-bold mb-0">{{ $totalKategori }}</h2>
                </div>
                <span class="stat-icon"><i class="bi bi-folder2-open"></i></span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card">
            <div class="card-body">
                <div>
                    <p class="text-muted fw-semibold mb-1">Total Pesanan</p>
                    <h2 class="fw-bold mb-0">{{ $totalPesanan }}</h2>
                </div>
                <span class="stat-icon"><i class="bi bi-box-seam"></i></span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card">
            <div class="card-body">
                <div>
                    <p class="text-muted fw-semibold mb-1">Total User</p>
                    <h2 class="fw-bold mb-0">{{ $totalUser }}</h2>
                </div>
                <span class="stat-icon"><i class="bi bi-people"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-start gap-3">
            <span class="stat-icon"><i class="bi bi-stars"></i></span>
            <div>
                <h4 class="fw-bold mb-2">Selamat datang di panel admin</h4>
                <p class="text-muted mb-0">
                    Gunakan menu di sebelah kiri untuk mengelola buku, kategori, pesanan, dan data pelanggan.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
