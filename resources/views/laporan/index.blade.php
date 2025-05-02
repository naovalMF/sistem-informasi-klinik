@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Laporan Kunjungan</div>
                <div class="card-body">
                    <a href="{{ route('laporan.kunjungan') }}" class="btn btn-primary">Lihat Laporan</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Laporan Pembayaran</div>
                <div class="card-body">
                    <a href="{{ route('laporan.pembayaran') }}" class="btn btn-success">Lihat Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
