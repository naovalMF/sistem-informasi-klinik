@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Tindakan</h1>

    <form method="POST" action="{{ route('tindakan.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nama">Nama Tindakan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
