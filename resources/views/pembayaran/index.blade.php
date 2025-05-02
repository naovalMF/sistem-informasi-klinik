@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Pembayaran</h3>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pendaftaran ID</th>
                <th>Total Biaya</th>
                <th>Jumlah Bayar</th>
                <th>Kembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayarans as $pembayaran)
            <tr>
                <td>{{ $pembayaran->pendaftaran_id }}</td>
                <td>Rp{{ number_format($pembayaran->total_biaya, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($pembayaran->kembalian, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
