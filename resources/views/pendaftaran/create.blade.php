@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pendaftaran Pasien</h1>

    <form action="{{ route('pendaftaran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Pasien</label>
            <select name="pasien_id" class="form-control" required>
                <option value="">-- Pilih Pasien --</option>
                @foreach ($pasiens as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Kunjungan</label>
            <select name="jenis_kunjungan" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="umum">Umum</option>
                <option value="bpjs">BPJS</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
