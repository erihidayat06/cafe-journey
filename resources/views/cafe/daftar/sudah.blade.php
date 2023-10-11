@extends('login.layouts.main')
@section('container')
    <div class="row row-cols-1 row-cols-lg-2 align-items-center mt-4">
        <div class="col text-center ">
            <h3 class="text-title fw-bold">Selamat Bergabung di</h3>
            <img src="/assets/img/login.jpg" width="50%" alt="">
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h3>Selamat Anda Telah Terdaftar Di Website Kami</h3>
                    <img src="/assets/img/selamat.gif" alt="" width="50%">
                    <p class="mt-4 fw-bold">Segera Hubungi <span class="text-danger">Admin Cafe Journey</span> Untuk
                        Interview</p>

                    <p class="fw-bold">No Antrian Anda : {{ auth()->user()->cafe->no_antrian }}</p>
                    <input type="hidden" name="tanggal" id="tanggal"
                        value="{{ date('M d, Y H:i:s', strtotime('+10 days', strtotime(auth()->user()->cafe->updated_at))) }}">
                    <span class="fw-bold">Batas Akhir : </span>
                    <p class="fw-bold text-danger" id="waktu"></p>
                    <a href="https://api.whatsapp.com/send?phone=6285647715796&text=*Mendaftar Cafe*%0A%0ANama%20:%20{{ auth()->user()->name }}%0ANo%20Antrian%20:%20*{{ auth()->user()->cafe->no_antrian }}*%0ATanggal Daftar :%20{{ date('M d, Y H:i:s', strtotime(auth()->user()->cafe->updated_at)) }}%0AAkhir Pendaftaran :%20*{{ date('M d, Y H:i:s', strtotime('+10 days', strtotime(auth()->user()->cafe->updated_at))) }}*%0AAlamat%20:%20{{ auth()->user()->cafe->alamat }}%0ANo Telepon : {{ auth()->user()->no_telepon }}"
                        class="btn btn-success"><i class="bi bi-whatsapp"></i> Hubungi Cafe Journey</a>
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
@endsection
