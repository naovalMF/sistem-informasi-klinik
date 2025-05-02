@extends('layouts.app')

@section('content')
<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-header">Laporan Kunjungan Pasien</div>
        <div class="card-body">
            <form method="GET" action="{{ route('laporan.kunjungan') }}" class="row mb-4">
                <div class="col-md-5">
                    <input type="date" name="start_date" class="form-control" required value="{{ request('start_date') }}">
                </div>
                <div class="col-md-5">
                    <input type="date" name="end_date" class="form-control" required value="{{ request('end_date') }}">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100" type="submit">Tampilkan</button>
                </div>
            </form>

            @isset($kunjungan)
                @if(request('start_date') && request('end_date') && $kunjungan->count())
                    <a href="{{ route('laporan.kunjungan.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" target="_blank" class="btn btn-danger mb-3">
                        Export PDF
                    </a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pasien</th>
                                <th>Tanggal</th>
                                <th>Dokter</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kunjungan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pasien->nama }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->pegawai->nama }}</td>
                                <td>{{ $item->tindakan->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Tidak ada data kunjungan pada rentang tanggal tersebut.</p>
                @endif
            @endisset
        </div>
    </div>
</div>
@endsection
