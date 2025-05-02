@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Pendaftaran Pasien</h1>
    <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary mb-3">+ Tambah Pendaftaran</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pasien</th>
                <th>Jenis Kunjungan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftarans as $data)
            <tr>
                <td>{{ $data->pasien->nama }}</td>
                <td>{{ $data->jenis_kunjungan }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>
                    <a href="{{ route('pendaftaran.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pendaftaran.destroy', $data->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
