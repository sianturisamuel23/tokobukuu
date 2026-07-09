@extends('toko.layout')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4>

                Detail Pesanan

            </h4>

        </div>

        <div class="card-body">

            <table class="table">

                <tr>

                    <th width="200">Kode Pesanan</th>

                    <td>{{ $pesanan->kode_pesanan }}</td>

                </tr>

                <tr>

                    <th>Tanggal</th>

                    <td>{{ $pesanan->tanggal }}</td>

                </tr>

                <tr>

                    <th>Status</th>

                    <td>

                        {{ $pesanan->status }}

                    </td>

                </tr>

            </table>

            <hr>

            <table class="table table-bordered">

                <thead>

                <tr>

                    <th>Buku</th>

                    <th>Harga</th>

                    <th>Jumlah</th>

                    <th>Subtotal</th>

                </tr>

                </thead>

                <tbody>

                @foreach($pesanan->detailPesanans as $detail)

                <tr>

                    <td>

                        {{ $detail->buku->judul }}

                    </td>

                    <td>

                        Rp {{ number_format($detail->harga,0,',','.') }}

                    </td>

                    <td>

                        {{ $detail->jumlah }}

                    </td>

                    <td>

                        Rp {{ number_format($detail->subtotal,0,',','.') }}

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

            <div class="text-end">

                <h4>

                    Total :

                    Rp {{ number_format($pesanan->total_harga,0,',','.') }}

                </h4>

            </div>

            <a href="{{ route('user.pesanan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection