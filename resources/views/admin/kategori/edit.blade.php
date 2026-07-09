@extends('admin.layouts.app')

@section('title','Edit Kategori')

@section('judul','Edit Kategori')

@section('content')

<div class="card shadow">

    <div class="card-header">

        <h5>Form Edit Kategori</h5>

    </div>

    <div class="card-body">

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    name="nama_kategori"
                    class="form-control"
                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    class="form-control"
                    rows="4">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>

            </div>

            <button type="submit" class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection