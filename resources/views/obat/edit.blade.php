@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Obat</h1>

    <form action="{{ route('obat.update', $obat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Obat</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $obat->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $obat->satuan }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ $obat->stok }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $obat->harga }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('obat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
