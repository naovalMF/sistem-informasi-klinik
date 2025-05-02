@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Pegawai</h1>
    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control">
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
