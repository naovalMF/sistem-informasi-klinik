@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pasien</h1>
    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No KTP</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Wilayah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $pasien)
            <tr>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->no_ktp }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->telepon }}</td>
                <td>{{ $pasien->wilayah->nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
