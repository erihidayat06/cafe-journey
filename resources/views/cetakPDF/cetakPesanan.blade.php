<style>
    body {
        font-family: Arial, Helvetica, sans-serif
    }

    th {
        text-align: left;
    }

    table,
    th,
    td {
        border-collapse: collapse;
        padding: 10px;
    }

    .logo {
        text-align: right
    }
</style>

<body>


    <div class="logo">
        <img src="assets/img/login.jpg" alt="" width="50px">
    </div>

    <h1 style="text-align: center">PESANAN ANDA</h1>
    <div class="pelanggan">
        <table>
            <tr style="font-weight: bold;">
                <td>No Pesanan</td>
                <td>:</td>
                <td>{{ $beli->no_pesanan }}</td>
            </tr>
            <tr>
                <td>Nama Cafe</td>
                <td>:</td>
                <td>{{ $beli->cafe->nama_cafe }}</td>
            </tr>
            <tr>
                <td>Nama Pemesan</td>
                <td>:</td>
                <td>{{ $beli->user->name }}</td>
            </tr>

            <tr>
                <td>Tanggal Pesan</td>
                <td>:</td>
                <td>{{ date('d M Y', strtotime($beli->updated_at)) }}</td>
            </tr>
        </table>

    </div>


    <table style="width: 100%">
        <tr>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
        </tr>
        <?php $total = 0; ?>
        <?php $jumlah = 0; ?>

        @foreach ($pesanans as $pesanan)
            <tr>
                <td>
                    @if (isset($pesanan->minum->nama_minuman))
                        {{ $pesanan->minum->nama_minuman }}
                    @elseif (isset($pesanan->makanan->nama_makanan))
                        {{ $pesanan->makanan->nama_makanan }}
                    @endif
                </td>
                <td>
                    {{ $pesanan->jumlah }}
                    <?php $jumlah = $pesanan->jumlah + $jumlah; ?>
                </td>
                <td>

                    @if (isset($pesanan->minum->harga))
                        <?php $total = $pesanan->minum->harga * $pesanan->jumlah + $total;
                        $harga_minum = $pesanan->minum->harga;
                        ?>
                        Rp {{ number_format("$harga_minum", 0, ',', '.') }}
                    @elseif (isset($pesanan->makanan->harga))
                        <?php
                        $total = $pesanan->makanan->harga * $pesanan->jumlah + $total;
                        $harga_makanan = $pesanan->makanan->harga;
                        ?>
                        Rp {{ number_format("$harga_makanan", 0, ',', '.') }}
                    @endif
                </td>
                <td>
                    @if (isset($pesanan->minum->harga))
                        <?php $total_harga = $pesanan->minum->harga * $pesanan->jumlah;
                        ?>
                        Rp {{ number_format("$total_harga", 0, ',', '.') }}
                    @elseif (isset($pesanan->makanan->harga))
                        <?php
                        $total_harga = $pesanan->makanan->harga * $pesanan->jumlah;
                        ?>
                        Rp {{ number_format("$total_harga", 0, ',', '.') }}
                    @endif
                </td>
            </tr>
        @endforeach

        <tr style="font-weight: bold;">
            <td style="border-top: 2px solid black">Sub Total</td>
            <td style="border-top: 2px solid black;">{{ $jumlah }}</td>
            <td style="border-top: 2px solid black"></td>
            <td style="border-top: 2px solid black">Rp {{ number_format("$total", 0, ',', '.') }}
            </td>
        </tr>
    </table>
</body>
