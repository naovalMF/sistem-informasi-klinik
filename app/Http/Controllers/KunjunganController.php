<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Tindakan;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KunjunganController extends Controller
{
    public function create()
    {
        return view('kunjungan.create', [
            'pasiens' => Pasien::all(),
            'pegawais' => Pegawai::all(),
            'tindakans' => Tindakan::all(),
            'obats' => Obat::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'pegawai_id' => 'required|exists:pegawais,id',
            'tindakan_id' => 'required|array',
            'tindakan_id.*' => 'exists:tindakans,id',
            'obat_id' => 'required|array',
            'obat_id.*' => 'exists:obats,id',
        ]);

        DB::transaction(function () use ($request) {
            $kunjungan = Kunjungan::create([
                'pasien_id' => $request->pasien_id,
                'pegawai_id' => $request->pegawai_id,
                'tanggal' => now(),
            ]);

            $kunjungan->tindakans()->attach($request->tindakan_id);
            $kunjungan->obats()->attach($request->obat_id);
        });

        return redirect()->route('kunjungan.create')->with('success', 'Kunjungan berhasil disimpan.');
    }
}
