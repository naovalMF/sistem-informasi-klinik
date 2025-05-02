@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Wilayah</h1>
    <a href="{{ route('wilayah.create') }}" class="btn btn-primary mb-3">Tambah Wilayah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wilayah as $w)
            <tr>
                <td>{{ $w->id }}</td>
                <td>{{ $w->nama }}</td>
                <td>
                    <a href="{{ route('wilayah.edit', $w->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('wilayah.destroy', $w->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
