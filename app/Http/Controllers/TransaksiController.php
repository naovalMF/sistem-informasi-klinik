<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\KunjunganTindakan;
use App\Models\KunjunganObat;
use App\Models\Tindakan;
use App\Models\Obat;

class TransaksiController extends Controller
{
    // Form input tindakan & obat
    public function create()
    {
        $kunjungans = Kunjungan::with('pasien')->get();
        $tindakans = Tindakan::all();
        $obats = Obat::all();

        return view('transaksi.form', compact('kunjungans', 'tindakans', 'obats'));
    }

    // Simpan transaksi tindakan & obat
    public function store(Request $request)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
        ]);

        // Simpan tindakan
        if ($request->has('tindakan_ids')) {
            foreach ($request->tindakan_ids as $tindakan_id) {
                $tindakan = Tindakan::find($tindakan_id);
                KunjunganTindakan::create([
                    'kunjungan_id' => $request->kunjungan_id,
                    'tindakan_id' => $tindakan_id,
                    'biaya' => $tindakan->biaya,
                ]);
            }
        }

        // Simpan obat
        if ($request->has('obat_qty')) {
            foreach ($request->obat_qty as $obat_id => $jumlah) {
                if ($jumlah > 0) {
                    $obat = Obat::find($obat_id);
                    KunjunganObat::create([
                        'kunjungan_id' => $request->kunjungan_id,
                        'obat_id' => $obat_id,
                        'jumlah' => $jumlah,
                        'harga_satuan' => $obat->harga,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Transaksi berhasil disimpan.');
    }

    // Halaman daftar pembayaran
    public function index()
    {
        $kunjungans = Kunjungan::with(['pasien', 'tindakan', 'obat'])
            ->where('status_pembayaran', 'belum')
            ->get();

        return view('pembayaran.index', compact('kunjungans'));
    }

    // Konfirmasi pembayaran
    public function bayar($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->status_pembayaran = 'sudah';
        $kunjungan->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}
