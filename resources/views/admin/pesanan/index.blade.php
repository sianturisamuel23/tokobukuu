@extends('admin.layout')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Data Pesanan
    </h2>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

        <tr>

            <th>No</th>
            <th>Kode</th>
            <th>Customer</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>

        </tr>

        </thead>

        <tbody>

        @forelse($pesanans as $pesanan)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $pesanan->kode_pesanan }}</td>

            <td>{{ $pesanan->user->name }}</td>

            <td>{{ $pesanan->tanggal }}</td>

            <td>
                Rp {{ number_format($pesanan->total_harga,0,',','.') }}
            </td>

            <td>

                <span class="badge bg-primary">

                    {{ $pesanan->status }}

                </span>

            </td>

            <td>

                <a href="{{ route('pesanan.show',$pesanan->id) }}"
                   class="btn btn-info btn-sm">

                    Detail

                </a>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="7" class="text-center">

                Belum ada pesanan.

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection