@extends('layouts.main')

@section('container')
    <section class="about">
        <div class="page-header">
            <h2 class="page-title">
                Tentang Kami
            </h2>
        </div>
        <div class="page-content py-4">
            <div class="row">
                <div class="col-md-12">
                    {{-- Logo --}}
                    <div class="text-left">
                        <img src="{{ asset('assets/img/login.jpg') }}" alt="Logo Cafe Journey" class="img-fluid my-4 rounded shadow-sm" width="100">
                    </div>
                    <p>
                        Cafe Journey : Cari, Pesan dan Santai!
                    </p>
                    <p>
                        Selamat datang di Cafe Journey, tempat di mana perjalanan rasa dimulai. Kami adalah platform inovatif
                        yang dirancang untuk membawa pengalaman kafe Anda ke level berikutnya. Dengan Cafe Journey, Anda dapat
                        menemukan kafe terbaik, memesan hidangan favorit Anda, dan menikmati momen-momen istimewa bersama
                        teman atau keluarga.
                    </p>
    
                    <h4 class="mt-4 mb-3">Misi Kami</h4>
                    <p>
                        Misi kami adalah menciptakan pengalaman unik bagi para pecinta kopi dan penggemar kuliner. Kami
                        berkomitmen untuk menyajikan informasi lengkap tentang kafe terbaik, menu spesial, serta memberikan
                        akses mudah untuk memesan dan menikmati hidangan lezat di tempat-tempat pilihan Anda.
                    </p>
    
                    <h4 class="mt-4 mb-3">Fitur Utama</h4>
                    <ul>
                        <li><strong>Temukan Kafe:</strong> Jelajahi berbagai kafe di sekitar Anda dan temukan tempat-tempat
                            unik dengan atmosfer yang menyenangkan.</li>
                        <li><strong>Pesan Mudah:</strong> Pesan makanan dan minuman favorit Anda dengan cepat dan mudah
                            melalui platform kami.</li>
                        <li><strong>Nikmati Bersama:</strong> Bagikan pengalaman bersama teman dan keluarga di kafe pilihan
                            Anda.</li>
                    </ul>
    
                    <h4 class="mt-4 mb-3">Hubungi Kami</h4>
                    <p>
                        Kami senang mendengar dari Anda! Jika Anda memiliki pertanyaan, saran, atau umpan balik, jangan
                        ragu untuk menghubungi tim Cafe Journey melalui email di <a href="mailto:info@cafejourney.my.id">info@cafejourney.my.id</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
