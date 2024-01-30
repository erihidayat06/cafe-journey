@extends('login.layouts.main')
@section('container')
   
    <div class="waiting">
        
        <h3>
            Kafe anda sudah terdaftar di sistem kami. <br>
        </h3>
        <div class="card rounded-sm shadow-sm border-0">
            {{-- Table --}}
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama Kafe</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">No Antrian</th>
                            <th scope="col">Status</th>
                            <th scope="col">Batas Akhir Interview</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ auth()->user()->cafe->nama_cafe }}</td>
                            <td>{{ auth()->user()->cafe->no_telepon }}</td>
                            <td>{{ auth()->user()->cafe->no_antrian }}</td>
                            <td>
                                @if (auth()->user()->cafe->konfirmasi == 'tunggu')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif(auth()->user()->cafe->konfirmasi == 'konfirmasi')
                                    <span class="badge bg-success">Diterima</span>
                                @endif
                            </td>
                            <td>{{ date('M d, Y H:i:s', strtotime('+10 days', strtotime(auth()->user()->cafe->updated_at))) }}</td>
                        </tr>
                    </tbody>
                </table>
                <small>
                    Segera Hubungi Admin Cafe Journey Untuk Interview di <a href="https://api.whatsapp.com/send?phone=6285647715796&text=*Mendaftar Cafe*%0A%0ANama%20:%20{{ auth()->user()->name }}%0ANo%20Antrian%20:%20*{{ auth()->user()->cafe->no_antrian }}*%0ATanggal Daftar :%20{{ date('M d, Y H:i:s', strtotime(auth()->user()->cafe->updated_at)) }}%0AAkhir Pendaftaran :%20*{{ date('M d, Y H:i:s', strtotime('+10 days', strtotime(auth()->user()->cafe->updated_at))) }}*%0AAlamat%20:%20{{ auth()->user()->cafe->alamat }}%0ANo Telepon : {{ auth()->user()->no_telepon }}" class="fw-bold text-decoration-none">No. Whatsapp</a> ini.
                </small>
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
