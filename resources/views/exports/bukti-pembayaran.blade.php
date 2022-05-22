<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bukti Pembayaran | {{ $name_type_of_payment }}</title>
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet"> --}}
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            padding: 0;
            margin: 0;
        }

        table.data {
            border-collapse: collapse;
            width: 100%;
        }

        table.data,
        table.data th,
        table.data td {
            border: 1px solid black;
        }

        table.data th,
        table.data td {
            padding: 10px;
        }

        table.data th {
            background-color: #4CAF50;
            color: white;
        }

    </style>
</head>

<body style="padding: 10px;">
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td>
                    <span style="font-size: 25px;">SD PUPUK KUJANG CIKAMPEK</span>
                </td>
                <td style="text-align: right;">
                    <span style="font-size: 20px;">Bukti Pembayaran</span>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <table style="margin: 10px 0;">
        <tbody>
            <tr>
                <td>Nama</td>
                <td style="padding: 0 10px;">:</td>
                <td>{{ $student->identity->nama }}</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td style="padding: 0 10px;">:</td>
                <td>{{ $student->identity->nisn }}</td>
            </tr>
        </tbody>
    </table>
    <span style="font-size: 20px; padding: 10px 0;">{{ $name_type_of_payment }}</span>
    <table class="data">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>No Pembayaran</th>
                <th>Keterangan</th>
                <th>Jumlah Bayar</th>
                {{-- <th>Jumlah Kembalian</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($item_payments as $item_payment)
                <tr>
                    <td>{{ $item_payment->tanggal }}</td>
                    <td>{{ $item_payment->payment_number }}</td>
                    <td>{{ $item_payment->description }}</td>
                    <td>Rp. {{ numberFormat($item_payment->billing) }}</td>
                    {{-- <td>{{ numberFormat($item_payment->change) }}</td> --}}
                </tr>
            @endforeach
            <tr>
                <td colspan="3" align="right">Total Bayar</td>
                <td>Rp. {{ numberFormat($item_payments->sum('billing')) }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
