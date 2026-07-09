@extends('admin.layout')

@section('content')

<div class="container">

    <h2 class="mb-4">

        Detail Pesanan

    </h2>

    <div class="card">

        <div class="card-body">

            <table class="table">

                <tr>
                    <th>Kode</th>
                    <td>{{ $pesanan->kode_pesanan }}</td>
                </tr>

                <tr>
                    <th>Customer</th>
                    <td>{{ $pesanan->user->name }}</td>
                </tr>

                <tr>
                    <th>Tanggal</th>
                    <td>{{ $pesanan->tanggal }}</td>
                </tr>

                <tr>
                    <th>Status</th>

                    <td>

                        <form method="POST"
                              action="{{ route('pesanan.update',$pesanan->id) }}">

                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-md-6">

                                    <select
                                        name="status"
                                        class="form-select">

                                        <option value="Menunggu"
                                            {{ $pesanan->status=='Menunggu' ? 'selected' : '' }}>

                                            Menunggu

                                        </option>

                                        <option value="Diproses"
                                            {{ $pesanan->status=='Diproses' ? 'selected' : '' }}>

                                            Diproses

                                        </option>

                                        <option value="Selesai"
                                            {{ $pesanan->status=='Selesai' ? 'selected' : '' }}>

                                            Selesai

                                        </option>

                                    </select>

                                </div>

                                <div class="col-md-3">

                                    <button class="btn btn-success">

                                        Simpan

                                    </button>

                                </div>

                            </div>

                        </form>

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

                    <td>{{ $detail->buku->judul }}</td>

                    <td>
                        Rp {{ number_format($detail->harga,0,',','.') }}
                    </td>

                    <td>{{ $detail->jumlah }}</td>

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

            <a href="{{ route('pesanan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection