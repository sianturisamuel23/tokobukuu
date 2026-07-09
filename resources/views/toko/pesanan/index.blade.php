@extends('toko.layout')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            <i class="bi bi-receipt"></i>
            Riwayat Pesanan
        </h2>

        <a href="{{ route('home') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i>
            Kembali Belanja
        </a>

    </div>

    @if($pesanans->count())

    <table class="table table-bordered table-hover bg-white align-middle">

        <thead class="table-primary">

        <tr>

            <th>Kode</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status</th>
            <th width="120">Aksi</th>

        </tr>

        </thead>

        <tbody>

        @foreach($pesanans as $pesanan)

        <tr>

            <td>{{ $pesanan->kode_pesanan }}</td>

            <td>{{ $pesanan->tanggal }}</td>

            <td>

                Rp {{ number_format($pesanan->total_harga,0,',','.') }}

            </td>

            <td>

                @if($pesanan->status=='Menunggu')

                    <span class="badge bg-warning">

                        {{ $pesanan->status }}

                    </span>

                @elseif($pesanan->status=='Diproses')

                    <span class="badge bg-primary">

                        {{ $pesanan->status }}

                    </span>

                @else

                    <span class="badge bg-success">

                        {{ $pesanan->status }}

                    </span>

                @endif

            </td>

            <td>

                <a href="{{ route('user.pesanan.show',$pesanan->id) }}"
                   class="btn btn-info btn-sm">

                    Detail

                </a>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

    @else

        <div class="alert alert-warning">

            Belum ada pesanan.

        </div>

    @endif

</div>

@endsection