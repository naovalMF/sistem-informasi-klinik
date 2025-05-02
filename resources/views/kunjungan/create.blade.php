@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Input Kunjungan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('kunjungan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Pasien</label>
            <select name="pasien_id" class="form-control" required>
                <option value="">Pilih Pasien</option>
                @foreach($pasiens as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Pegawai</label>
            <select name="pegawai_id" class="form-control" required>
                <option value="">Pilih Pegawai</option>
                @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tindakan</label>
            <select name="tindakan_id[]" class="form-control" multiple required>
                @foreach($tindakans as $tindakan)
                    <option value="{{ $tindakan->id }}">{{ $tindakan->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Obat</label>
            <select name="obat_id[]" class="form-control" multiple required>
                @foreach($obats as $obat)
                    <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
