@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('judul', 'Data Kategori')

@section('content')

<div class="card shadow">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">Daftar Kategori</h5>

        <a href="{{ route('kategori.create') }}" class="btn btn-primary">
            + Tambah Kategori
        </a>

    </div>

    <div class="card-body">

        @if($kategoris->count())

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="table-primary">

                    <tr>

                        <th width="60">No</th>

                        <th>Nama Kategori</th>

                        <th>Deskripsi</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($kategoris as $kategori)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $kategori->nama_kategori }}</td>

                        <td>{{ $kategori->deskripsi }}</td>

                        <td>

                            <a href="{{ route('kategori.edit', $kategori->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('kategori.destroy', $kategori->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                                    class="btn btn-danger btn-sm">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        @else

            <div class="alert alert-info">

                Belum ada data kategori.

            </div>

        @endif

    </div>

</div>

@endsection