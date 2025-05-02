@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Input Transaksi Tindakan & Obat</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pasien_id" class="form-label">Pasien</label>
            <select name="pasien_id" class="form-control" required>
                <option value="">-- Pilih Pasien --</option>
                @foreach($pasiens as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kunjungan" class="form-label">Jenis Kunjungan</label>
            <select name="jenis_kunjungan" class="form-control" required>
                <option value="rawat jalan">Rawat Jalan</option>
                <option value="rawat inap">Rawat Inap</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tindakan_id" class="form-label">Tindakan</label>
            @foreach($tindakans as $tindakan)
                <div class="form-check">
                    <input type="checkbox" name="tindakan_id[]" value="{{ $tindakan->id }}" class="form-check-input">
                    <label class="form-check-label">{{ $tindakan->nama }} - Rp{{ number_format($tindakan->biaya) }}</label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="obat_id" class="form-label">Obat</label>
            @foreach($obats as $obat)
                <div class="form-check">
                    <input type="checkbox" name="obat_id[]" value="{{ $obat->id }}" class="form-check-input">
                    <label class="form-check-label">{{ $obat->nama }} - Rp{{ number_format($obat->harga) }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>
</div>
@endsection
