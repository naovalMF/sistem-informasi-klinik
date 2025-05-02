@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Wilayah</h1>
    <form action="{{ route('wilayah.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Wilayah</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
