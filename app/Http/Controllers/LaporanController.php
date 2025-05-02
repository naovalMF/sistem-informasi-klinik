<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Pembayaran;
use PDF; // Pastikan package dompdf terinstall

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function kunjungan(Request $request)
    {
        $kunjungan = null;

        if ($request->has(['start_date', 'end_date'])) {
            $kunjungan = Pendaftaran::with(['pasien', 'pegawai', 'tindakan'])
                ->whereBetween('tanggal', [$request->start_date, $request->end_date])
                ->get();
        }

        return view('laporan.kunjungan', compact('kunjungan'));
    }

    public function pembayaran(Request $request)
    {
        $pembayaran = null;

        if ($request->has(['start_date', 'end_date'])) {
            $pembayaran = Pembayaran::with('pasien')
                ->whereBetween('tanggal', [$request->start_date, $request->end_date])
                ->get();
        }

        return view('laporan.pembayaran', compact('pembayaran'));
    }

    public function cetakKunjungan(Request $request)
    {
        $data = Pendaftaran::with(['pasien', 'pegawai', 'tindakan'])
            ->whereBetween('tanggal', [$request->start_date, $request->end_date])
            ->get();

        $pdf = PDF::loadView('laporan.pdf_kunjungan', compact('data'));
        return $pdf->download('laporan_kunjungan.pdf');
    }

    public function cetakPembayaran(Request $request)
    {
        $data = Pembayaran::with('pasien')
            ->whereBetween('tanggal', [$request->start_date, $request->end_date])
            ->get();

        $pdf = PDF::loadView('laporan.pdf_pembayaran', compact('data'));
        return $pdf->download('laporan_pembayaran.pdf');
    }
}
