<!-- Modal -->
<div class="modal fade" id="detail{{ $cafe->id }}" tabindex="-1" aria-labelledby="detail{{ $cafe->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detail{{ $cafe->id }}Label">Detail Cafe <span
                        class="fw-bold">{{ $cafe->nama_cafe }}</span> </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">
                        <span style="font-size: 12px">nama</span>
                        <p>{{ $cafe->user->name }}</p>
                    </div>
                    <div class="col">
                        <span style="font-size: 12px">No Antrian</span>
                        <p>{{ $cafe->no_antrian }}</p>
                    </div>
                    <div class="col">
                        <span style="font-size: 12px">Tanggal daftar</span>
                        <p>{{ date('d M Y H:i:s', strtotime($cafe->updated_at)) }}</p>
                    </div>
                    @if ($cafe->konfirmasi == 'tunggu')
                        <div class="col">
                            <span style="font-size: 12px">Batas Akhir</span>
                            <p>{{ date('d M Y H:i:s', strtotime('+10 days', strtotime($cafe->updated_at))) }}
                            </p>
                        </div>
                    @endif

                    <div class="col">
                        <span style="font-size: 12px">Domisili</span>
                        <p>{{ $cafe->domisili }}</p>
                    </div>
                    <div class="col">
                        <span style="font-size: 12px">Kecamatan</span>
                        <p>{{ $cafe->kecamatan }}</p>
                    </div>
                </div>
                <div>
                    <span style="font-size: 12px">Alamat</span>
                    <p>{{ $cafe->alamat }}</p>
                </div>

                @if ($cafe->konfirmasi == 'tunggu')
                    <div class="text-center">
                        <input type="hidden" name="tanggal" id="tanggal"
                            value="{{ date('M d, Y H:i:s', strtotime('+10 days', strtotime($cafe->updated_at))) }}">
                        <span class="fw-bold">Batas Akhir</span>
                        <p class="fw-bold text-danger" id="waktu"></p>
                    </div>
                @endif


            </div>
        </div>
    </div>
</div>


<script>
    var tanggal = document.getElementById("tanggal").value
    // Mengatur waktu akhir perhitungan mundur
    var countDownDate = new Date(tanggal)
        .getTime();

    // Memperbarui hitungan mundur setiap 1 detik
    var x = setInterval(function() {

        // Untuk mendapatkan tanggal dan waktu hari ini
        var now = new Date().getTime();

        // Temukan jarak antara sekarang dan tanggal hitung mundur
        var distance = countDownDate - now;

        // Perhitungan waktu untuk hari, jam, menit dan detik
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Keluarkan hasil dalam elemen dengan id = "waktu"
        document.getElementById("waktu").innerHTML =
            days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // Jika hitungan mundur selesai, tulis beberapa teks
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("waktu").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
