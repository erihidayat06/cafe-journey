<!-- Modal -->
<div class="modal fade" id="detail{{ $cafe->id }}" tabindex="-1" aria-labelledby="detail{{ $cafe->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detail{{ $cafe->id }}Label">Detail Beli</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Perhatiaan !</strong> Jika Belum lanjut Maka Pesanan Masuk Ke <strong><a href="/beli/draf">
                            Menu Draf</a></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <style>
                    tr,
                    td,
                    th {
                        text-align: left
                    }
                </style>
                <table class="table table-light table-striped-columns">
                    <?php $total = 0; ?>
                    <?php $jumlah = 0; ?>
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                    @auth
                        @foreach ($cafe->beli->where('user_id', auth()->user()->id) as $pesanan)
                            @if (!isset($pesanan->no_pesanan))
                                <tr>
                                    <td>
                                        @if (isset($pesanan->minum->nama_minuman))
                                            {{ $pesanan->minum->nama_minuman }}
                                        @elseif (isset($pesanan->makanan->nama_makanan))
                                            {{ $pesanan->makanan->nama_makanan }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $pesanan->jumlah }}
                                        <?php $jumlah = $pesanan->jumlah + $jumlah; ?>
                                    </td>
                                    <td>

                                        @if (isset($pesanan->minum->harga))
                                            <?php
                                            $total = $pesanan->minum->harga * $pesanan->jumlah + $total;
                                            $harga_jumlah = $pesanan->minum->harga * $pesanan->jumlah;
                                            ?>
                                            Rp {{ number_format("$harga_jumlah", 0, ',', '.') }}
                                        @elseif (isset($pesanan->makanan->harga))
                                            <?php
                                            $total = $pesanan->makanan->harga * $pesanan->jumlah + $total;
                                            $harga_jumlah = $pesanan->makanan->harga * $pesanan->jumlah;
                                            ?>
                                            Rp {{ number_format("$harga_jumlah", 0, ',', '.') }}
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
                                    <td>
                                        <form action="/beli/destroy-pesanan/{{ $pesanan->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ms-2"
                                                onclick="return confirm('Yakin Mau Hapus ?')"><i
                                                    class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td>-</td>
                            <td>0</td>
                            <td>Rp 0</td>
                        </tr>
                    @endauth
                    <tr style="color: green" class="fw-bold table-active">
                        <td style="border-top: 2px solid black">Sub Total</td>
                        <td style="border-top: 2px solid black" class="text-center">{{ $jumlah }}</td>
                        <td style="border-top: 2px solid black" class="text-center"></td>
                        <td style="border-top: 2px solid black">Rp {{ number_format("$total", 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @if (isset($pesanan->id))
                    <form action="/beli/{{ $pesanan->id }}" method="post">
                @endif
                @csrf
                @method('PUT')
                <input type="hidden" name="no_pesanan">
                <button type="submit" onclick="return confirm('Pastikan Pesenan Sudah Sesuai Sebelum Lanjut')"
                    class="btn btn-primary">Lanjut Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
