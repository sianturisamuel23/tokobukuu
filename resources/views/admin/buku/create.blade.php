@extends('admin.layouts.app')

@section('title','Tambah Buku')

@section('judul','Tambah Buku')

@section('content')

<div class="card shadow">

    <div class="card-header">
        <h5>Form Tambah Buku</h5>
    </div>

    <div class="card-body">

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Kode Buku</label>

                    <input type="text"
                           name="kode_buku"
                           class="form-control"
                           value="{{ old('kode_buku') }}"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Judul Buku</label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul') }}"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Penulis</label>

                    <input type="text"
                           name="penulis"
                           class="form-control"
                           value="{{ old('penulis') }}"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Penerbit</label>

                    <input type="text"
                           name="penerbit"
                           class="form-control"
                           value="{{ old('penerbit') }}"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label>Tahun Terbit</label>

                    <input type="number"
                           name="tahun_terbit"
                           class="form-control"
                           value="{{ old('tahun_terbit') }}"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label>Stok</label>

                    <input type="number"
                           name="stok"
                           class="form-control"
                           value="{{ old('stok') }}"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label>Harga</label>

                    <input type="number"
                           name="harga"
                           class="form-control"
                           value="{{ old('harga') }}"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Kategori</label>

                    <select name="kategori_id"
                            class="form-select"
                            required>

                        <option value="">-- Pilih Kategori --</option>

                        @foreach($kategoris as $kategori)

                            <option value="{{ $kategori->id }}">

                                {{ $kategori->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Gambar Buku</label>

                    <input type="file"
                           name="gambar"
                           class="form-control">

                </div>

            </div>

            <button class="btn btn-primary">

                Simpan

            </button>

            <a href="{{ route('buku.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection