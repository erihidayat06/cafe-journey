<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pdf Booking</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 100%;
            font-size: 11px;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .text-danger {
            color: red;
        }

        .text-warning {
            color: rgb(213, 158, 18)
        }

        .text-success {
            color: green
        }


        .fw-bold {
            font-weight: bold;
        }

        .logo {
            text-align: right
        }

        .header {
            text-align: center
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="assets/img/login.jpg" alt="" width="50px">
    </div>

    <div class="header">


        <h2 style="text-transform: capitalize">Laporan Data Booking {{ request('status') }}</h2>
        <h2>"Cafe {{ auth()->user()->cafe->nama_cafe }}"</h2>
        @if (request('dari'))
            <p>{{ date('d M Y', strtotime(request('dari'))) }} - {{ date('d M Y', strtotime(request('sampai'))) }}</p>
        @elseif (request('filter'))
            @if (request('waktu') == 'Hari Ini')
                <p>{{ request('waktu') }} {{ date('d M Y', strtotime(request('filter'))) }}</p>
            @elseif (request('waktu') == 'Bulan Ini')
                <p>{{ request('waktu') }} {{ date('M Y', strtotime(request('filter'))) }}</p>
            @elseif (request('waktu') == 'Tahun Ini')
                <p>{{ request('waktu') }} {{ date('Y', strtotime(request('filter'))) }}</p>
            @endif
        @else
            <p>{{ date('d M Y') }}</p>
        @endif
    </div>

    <table>

        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>No Telepon</th>
            <th>No Pesanan</th>
            <th>Tanggal Booking</th>
            <th>Jam Booking</th>
            <th>Tanggal Pesan</th>
            <th>Harga</th>
            <th>Status</th>
        </tr>

        <?php $i = 1; ?>
        @foreach ($bookings as $booking)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->user->no_telepon }}</td>
                <td>{{ $booking->no_pesanan }}</td>
                <td>{{ date('d M Y', strtotime($booking->tanggal_booking)) }}</td>
                <td>Jam {{ date('H.i', strtotime($booking->jam_booking)) }}</td>
                <td>{{ date('d M Y', strtotime($booking->created_at)) }}</td>
                <td>{{ number_format($booking->vip->harga, 0, ',', '.') }}</td>
                <td>
                    <p
                        class="{{ $booking->opsi == 'tunggu' ? 'text-danger' : ($booking->opsi == 'sukses' ? 'text-warning' : 'text-success') }} fw-bold text-capitalize">
                        {{ strtoupper($booking->opsi) }}</p>
                </td>
            </tr>
        @endforeach
        @if (count($bookings) <= 0)
            <tr>
                <td colspan="9" style="text-align: center">Data Kosong</td>
            </tr>
        @endif
    </table>
</body>

</html>
