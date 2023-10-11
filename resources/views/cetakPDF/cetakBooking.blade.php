<style>
    table {
        width: 100%;
    }

    .fasilitas {
        color: #4b1f1f;
        font-weight: bold;
        padding: 5px 10px;
        padding-top: 4px;
        border: 2px solid #4b1f1f;
        border-radius: 10px;
    }

    body {
        font-family: Arial, Helvetica, sans-serif
    }

    p {
        font-weight: bold
    }

    .logo {
        text-align: right
    }

    .text-danger {
        color: red;
    }

    .text-warning {
        color: rgb(207, 188, 43)
    }

    .text-success {
        color: green
    }
</style>

<body>
    <div class="logo">
        <img src="assets/img/login.jpg" alt="" width="50px">
    </div>
    <h1 style="text-align: center">Booking Reservasi</h1>

    <table>
        <tr>
            <td>
                <small>Nama Pesanan </small>
                <p>{{ $booking->user->name }}</p>
            </td>

            <td>
                <small>No Pesanan </small>
                <p>{{ $booking->no_pesanan }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <small>No Telepon </small>
                <p>{{ $booking->user->no_telepon }}</p>
            </td>
            <td>
                <small>Tanggal Booking </small>
                <p>{{ date('d M Y', strtotime($booking->tanggal_booking)) }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <small>Jam Booking</small>
                <p>{{ date('H:i', strtotime($booking->jam_booking)) }}</p>
            </td>
            <td>
                <small>Tanggal Pesan </small>
                <p>{{ date('d M Y', strtotime($booking->created_at)) }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <small>Harga </small>
                <?php $harga = $booking->vip->harga; ?>
                <p>{{ number_format("$harga", 0, ',', '.') }}</p>
            </td>
            <td>
                <small>Status</small><br>
                <p
                    class="{{ $booking->opsi == 'tunggu' ? 'text-danger' : ($booking->opsi == 'sukses' ? 'text-warning' : 'text-success') }} fw-bold text-capitalize">
                    {{ strtoupper($booking->opsi) }}</p>
            </td>
        </tr>
    </table>

    <hr>
    <h3>Detail Cafe</h3>
    <small>Nama Cafe</small>
    <p>{{ $booking->cafe->nama_cafe }}</p>
    <small>Nama Reservasi</small>
    <p>{{ $booking->vip->nama_tempat }}</p>
    <small>Deskripsi </small>
    <div>{!! $booking->vip->deskripsi !!}</div>
    <br>
    <small>Fasilitas </small>
    <p style="margin-top: 10px">
        @foreach (explode(',', $booking->vip->fasilitas) as $fasilitas)
            <span class="fasilitas">{{ $fasilitas }}</span>
        @endforeach
    </p>
    <small>Kapasitas </small>
    <p>{{ $booking->vip->kapasitas }}</p>

</body>
