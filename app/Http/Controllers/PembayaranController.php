<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PembayaranController extends Controller
{
    public function index()
    {
        $data = Pembayaran::with('kunjungan.pasien')->get();
        return view('pembayaran.index', compact('data'));
    }

    public function create($kunjungan_id)
    {
        $kunjungan = Kunjungan::with(['tindakans', 'obats'])->findOrFail($kunjungan_id);

        $total_tindakan = $kunjungan->tindakans->sum('harga');
        $total_obat = $kunjungan->obats->sum('harga');
        $total = $total_tindakan + $total_obat;

        return view('pembayaran.create', compact('kunjungan', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'total' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ]);

        Pembayaran::create([
            'kunjungan_id' => $request->kunjungan_id,
            'total' => $request->total,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_bayar' => Carbon::now(),
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil disimpan.');
    }
}
