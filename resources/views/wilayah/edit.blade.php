@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Wilayah</h1>
    <form action="{{ route('wilayah.update', $wilayah->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Wilayah</label>
            <input type="text" name="nama" class="form-control" value="{{ $wilayah->nama }}" required>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
