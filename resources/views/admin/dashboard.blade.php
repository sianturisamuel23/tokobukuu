@extends('admin.layouts.app')

@section('title','Dashboard')

@section('judul','Dashboard')

@section('content')

<div class="row">

    <div class="col-md-3 mb-4">

        <div class="card shadow">

            <div class="card-body text-center">

                <h1 class="text-primary">
                    {{ $totalBuku }}
                </h1>

                <h5>Total Buku</h5>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow">

            <div class="card-body text-center">

                <h1 class="text-success">
                    {{ $totalKategori }}
                </h1>

                <h5>Total Kategori</h5>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow">

            <div class="card-body text-center">

                <h1 class="text-warning">
                    {{ $totalPesanan }}
                </h1>

                <h5>Total Pesanan</h5>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow">

            <div class="card-body text-center">

                <h1 class="text-danger">
                    {{ $totalUser }}
                </h1>

                <h5>Total User</h5>

            </div>

        </div>

    </div>

</div>

<div class="card shadow">

    <div class="card-body">

        <h4>Selamat Datang 👋</h4>

        <hr>

        <p>

            Selamat datang di Sistem Informasi Penjualan Toko Buku.

            Gunakan menu di sebelah kiri untuk mengelola data buku,
            kategori, pesanan dan laporan.

        </p>

    </div>

</div>

@endsection