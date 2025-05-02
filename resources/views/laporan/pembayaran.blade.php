@extends('layouts.app')

@section('content')
<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-header">Laporan Pembayaran</div>
        <div class="card-body">
            <form method="GET" action="{{ route('laporan.pembayaran') }}" class="row mb-4">
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

            @if(request('start_date') && request('end_date') && $pembayaran && $pembayaran->count())
                <a href="{{ route('laporan.pembayaran.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" target="_blank" class="btn btn-danger mb-3">
                    Export PDF
                </a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Tanggal</th>
                            <th>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembayaran as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pasien->nama }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
