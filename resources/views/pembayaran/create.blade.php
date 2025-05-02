@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Pembayaran</h3>

    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pendaftaran_id" class="form-label">Pendaftaran</label>
            <select name="pendaftaran_id" class="form-control" required>
                <option value="">-- Pilih Pendaftaran --</option>
                @foreach($pendaftarans as $pendaftaran)
                <option value="{{ $pendaftaran->id }}">#{{ $pendaftaran->id }} - {{ $pendaftaran->pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="total_biaya" class="form-label">Total Biaya</label>
            <input type="number" name="total_biaya" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
            <input type="number" name="jumlah_bayar" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
