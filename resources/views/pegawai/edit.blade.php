@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Pegawai</h1>
    <form action="{{ route('pegawai.update', $pegawai) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $pegawai->nama }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" value="{{ $pegawai->nip }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" value="{{ $pegawai->jabatan }}" class="form-control" required>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
