<!-- resources/views/pasien/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pasien Baru</h1>

    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="no_ktp" class="form-label">No. KTP</label>
            <input type="text" name="no_ktp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="wilayah_id" class="form-label">Wilayah</label>
            <select name="wilayah_id" class="form-control" required>
                <option value="">-- Pilih Wilayah --</option>
                @foreach($wilayah as $w)
                    <option value="{{ $w->id }}">{{ $w->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
