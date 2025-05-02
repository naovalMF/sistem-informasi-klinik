<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kunjungan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h3>Laporan Kunjungan</h3>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Pasien</th>
                <th>Pegawai</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->pasien->nama }}</td>
                    <td>{{ $item->pegawai->nama }}</td>
                    <td>{{ $item->tindakan->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
