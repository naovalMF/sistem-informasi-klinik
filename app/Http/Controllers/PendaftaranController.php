<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with('pasien')->get();
        return view('pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        return view('pendaftaran.create', compact('pasiens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'jenis_kunjungan' => 'required',
            'tanggal' => 'required|date',
        ]);

        Pendaftaran::create($request->all());
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    public function edit(Pendaftaran $pendaftaran)
    {
        $pasiens = Pasien::all();
        return view('pendaftaran.edit', compact('pendaftaran', 'pasiens'));
    }

    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'pasien_id' => 'required',
            'jenis_kunjungan' => 'required',
            'tanggal' => 'required|date',
        ]);

        $pendaftaran->update($request->all());
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil diubah.');
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
