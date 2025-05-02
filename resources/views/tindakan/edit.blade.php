@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Tindakan</h1>

    <form method="POST" action="{{ route('tindakan.update', $tindakan) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama">Nama Tindakan</label>
            <input type="text" name="nama" class="form-control" value="{{ $tindakan->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $tindakan->harga }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
