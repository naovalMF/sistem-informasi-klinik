@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Obat</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('obat.create') }}" class="btn btn-primary mb-3">+ Tambah Obat</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($obats as $obat)
                <tr>
                    <td>{{ $obat->nama }}</td>
                    <td>{{ $obat->satuan }}</td>
                    <td>{{ $obat->stok }}</td>
                    <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data obat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
