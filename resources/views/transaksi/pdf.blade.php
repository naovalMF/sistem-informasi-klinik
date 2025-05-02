<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Transaksi</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: left; }
    </style>
</head>
<body>
    <h2>Struk Transaksi Kunjungan</h2>
    <p><strong>Pasien:</strong> {{ $kunjungan->pasien->nama }}</p>
    <p><strong>Tanggal:</strong> {{ $kunjungan->tanggal }}</p>
    <p><strong>Jenis Kunjungan:</strong> {{ $kunjungan->jenis_kunjungan }}</p>

    <h4>Tindakan</h4>
    <table>
        <thead>
            <tr>
                <th>Nama Tindakan</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kunjungan->tindakans as $t)
                <tr>
                    <td>{{ $t->nama }}</td>
                    <td>Rp{{ number_format($t->pivot->biaya) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Obat</h4>
    <table>
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kunjungan->obats as $o)
                <tr>
                    <td>{{ $o->nama }}</td>
                    <td>Rp{{ number_format($o->harga) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
