@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- Sidebar --}}
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted">
                    <span>Menu Utama</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pendaftaran.index') }}">
                            Pendaftaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pembayaran.index') }}">
                            Pembayaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan.index') }}">
                            Laporan
                        </a>
                    </li>
                </ul>

                @if (Auth::user()->role === 'admin')
                <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted">
                    <span>Menu Admin</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wilayah.index') }}">
                            Master Wilayah
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pegawai.index') }}">
                            Master Pegawai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('obat.index') }}">
                            Master Obat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tindakan.index') }}">
                            Master Tindakan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pasien.index') }}">
                            Master Pasien
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Tambah User
                        </a>
                    </li>
                </ul>
                @endif
            </div>
        </nav>

        {{-- Main content --}}
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Selamat Datang, {{ Auth::user()->name }}</h1>
            </div>
            <p>Silakan pilih menu di sidebar untuk mengelola data.</p>
        </main>
    </div>
</div>
@endsection
