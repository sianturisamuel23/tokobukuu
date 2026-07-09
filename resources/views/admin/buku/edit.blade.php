@extends('admin.layouts.app')

@section('title','Edit Buku')

@section('judul','Edit Buku')

@section('content')

<div class="card shadow">

    <div class="card-header">

        <h5>Edit Buku</h5>

    </div>

    <div class="card-body">

        @if($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('buku.update',$buku->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Kode Buku</label>
                    <input type="text"
                           name="kode_buku"
                           class="form-control"
                           value="{{ old('kode_buku',$buku->kode_buku) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Judul</label>
                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul',$buku->judul) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Penulis</label>
                    <input type="text"
                           name="penulis"
                           class="form-control"
                           value="{{ old('penulis',$buku->penulis) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Penerbit</label>
                    <input type="text"
                           name="penerbit"
                           class="form-control"
                           value="{{ old('penerbit',$buku->penerbit) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Tahun</label>
                    <input type="number"
                           name="tahun_terbit"
                           class="form-control"
                           value="{{ old('tahun_terbit',$buku->tahun_terbit) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Stok</label>
                    <input type="number"
                           name="stok"
                           class="form-control"
                           value="{{ old('stok',$buku->stok) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Harga</label>
                    <input type="number"
                           name="harga"
                           class="form-control"
                           value="{{ old('harga',$buku->harga) }}">
                </div>

                <div class="col-md-6 mb-3">

                    <label>Kategori</label>

                    <select name="kategori_id" class="form-select">

                        @foreach($kategoris as $kategori)

                            <option value="{{ $kategori->id }}"
                                {{ $kategori->id == $buku->kategori_id ? 'selected' : '' }}>

                                {{ $kategori->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Gambar Baru</label>

                    <input type="file"
                           name="gambar"
                           class="form-control">

                </div>

            </div>

            <button class="btn btn-primary">

                Update

            </button>

            <a href="{{ route('buku.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection