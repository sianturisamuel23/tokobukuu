@extends('admin.layouts.app')

@section('title','Data Buku')

@section('judul','Data Buku')

@section('content')

<div class="card shadow">

    <div class="card-header d-flex justify-content-between">

        <h5>Daftar Buku</h5>

        <a href="{{ route('buku.create') }}" class="btn btn-primary">

            + Tambah Buku

        </a>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <div class="table-responsive">

            <table class="table table-bordered table-striped align-middle">

                <thead class="table-primary">

                <tr>

                    <th>No</th>

                    <th>Gambar</th>

                    <th>Kode</th>

                    <th>Judul</th>

                    <th>Kategori</th>

                    <th>Harga</th>

                    <th>Stok</th>

                    <th width="180">Aksi</th>

                </tr>

                </thead>

                <tbody>

                @forelse($bukus as $buku)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        @if($buku->gambar)

                            <img src="{{ asset('storage/'.$buku->gambar) }}"
                                 width="60">

                        @else

                            -

                        @endif

                    </td>

                    <td>{{ $buku->kode_buku }}</td>

                    <td>{{ $buku->judul }}</td>

                    <td>{{ $buku->kategori->nama_kategori }}</td>

                    <td>Rp {{ number_format($buku->harga,0,',','.') }}</td>

                    <td>{{ $buku->stok }}</td>

                    <td>

                        <a href="{{ route('buku.edit',$buku->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('buku.destroy',$buku->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus buku ini?')"
                                class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="text-center">

                        Belum ada data buku

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection