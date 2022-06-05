<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            padding: 0;
            margin: 0;
        }

        table {
            font-family: verdana, arial, sans-serif;
            font-size: 11px;
            color: #333333;
            border-width: none;
            /*border-color: #666666;*/
            border-collapse: collapse;
            width: 100%;
        }

        th {
            padding-bottom: 8px;
            padding-top: 8px;
            background-color: #dedede;
            /*border-bottom: solid;*/
            text-align: left;
        }

        td {
            text-align: left;
            border-color: #666666;
            background-color: #ffffff;
            line-height: 20px;
        }

    </style>
</head>

<body style="padding: 0 20px;">
    <header style="text-align: center; padding: 10px 0;">
        <h2>{{ env('APP_NAME') }}</h2>
        <h2 style="color: rgb(0, 204, 255);">Jurnal Kas Masuk</h2>
        <span
            style="color: rgb(231, 117, 36); line-height: 25px;">{{ \Carbon\Carbon::make($first_date)->translatedFormat('d M Y') }}
            - {{ \Carbon\Carbon::make($last_date)->translatedFormat('d M Y') }}</span>
    </header>
    <table>
        <tr>
            <th style="padding: 0 0 0 5px;">No</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Debet</th>
            <th>Kredit</th>
        </tr>
        @foreach ($cash_ins as $cash_in)
            <tr>
                <td style="padding: 0 0 0 5px;"></td>
                <td>
                    {{ \Carbon\Carbon::make($cash_in->tanggal)->format('d/m/Y') }}
                </td>
                <td>
                    {{ $cash_in->keterangan }}
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0 0 5px;">{{ $loop->iteration }}</td>
                <td>
                    {{ $cash_in->no_cek }}
                </td>
                <td>
                    {{ $cash_in->account->code . ' ' . $cash_in->account->name }}
                </td>
                <td>
                    Rp. {{ numberFormat($cash_in->jumlah_bayar) }}
                </td>
                <td></td>
            </tr>
            <tr>
                <td style="padding: 0 0 0 5px; border-bottom: 1px solid;"></td>
                <td style="border-bottom: 1px solid;">
                    {{ $cash_in->no_cek }}
                </td>
                <td style="border-bottom: 1px solid;">
                    {{ $cash_in->account->code . ' ' . $cash_in->account->name }}
                </td>
                <td style="border-bottom: 1px solid;"></td>
                <td style="border-bottom: 1px solid;">
                    Rp. {{ numberFormat($cash_in->jumlah_bayar) }}
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
