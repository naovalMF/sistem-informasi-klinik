@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pegawai</h1>
    <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">+ Tambah Pegawai</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $row)
            <tr>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->nip ?? '-' }}</td>
                <td>{{ $row->jabatan }}</td>
                <td>
                    <a href="{{ route('pegawai.edit', $row) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pegawai.destroy', $row) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
