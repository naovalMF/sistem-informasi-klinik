@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Tindakan</h1>

    <a href="{{ route('tindakan.create') }}" class="btn btn-primary mb-3">Tambah Tindakan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tindakans as $tindakan)
                <tr>
                    <td>{{ $tindakan->nama }}</td>
                    <td>{{ number_format($tindakan->harga) }}</td>
                    <td>
                        <a href="{{ route('tindakan.edit', $tindakan) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tindakan.destroy', $tindakan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
