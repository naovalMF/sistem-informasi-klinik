<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pembayaran</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        h3 { margin-bottom: 0; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <h3>Laporan Pembayaran</h3>
    <p>Periode: {{ request('start_date') }} s.d. {{ request('end_date') }}</p>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Pasien</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->pasien->nama }}</td>
                    <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                </tr>
                @php $total += $item->total_bayar; @endphp
            @endforeach
            <tr>
                <td colspan="2" class="total">Total Keseluruhan</td>
                <td class="total">Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
