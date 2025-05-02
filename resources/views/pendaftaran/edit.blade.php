@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pendaftaran Pasien</h1>

    <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Pasien</label>
            <select name="pasien_id" class="form-control" required>
                @foreach ($pasiens as $pasien)
                    <option value="{{ $pasien->id }}" {{ $pendaftaran->pasien_id == $pasien->id ? 'selected' : '' }}>
                        {{ $pasien->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Kunjungan</label>
            <select name="jenis_kunjungan" class="form-control" required>
                <option value="umum" {{ $pendaftaran->jenis_kunjungan == 'umum' ? 'selected' : '' }}>Umum</option>
                <option value="bpjs" {{ $pendaftaran->jenis_kunjungan == 'bpjs' ? 'selected' : '' }}>BPJS</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $pendaftaran->tanggal }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
