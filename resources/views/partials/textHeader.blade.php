<div class="text-header">
    <div class="container-fluid">

        <div class="row row-cols-2 row-cols-lg-2">
            <div class="col text-start">
                <a href="#" class="text-white text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#tentangModal">Tentang Kami
                </a><span>|</span>
                <a href="#" class="text-white text-decoration-none">Hubungi Kami <i class="bi bi-headset"></i></a>
            </div>
            <div class="col text-end ">
                <a href="" class="text-white text-decoration-none" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i
                        class="bi bi-question-circle"></i> Bantuan
                </a>
                @can('bukan_admin')
                    <span>|</span>
                    <a href="/daftar-cafe" class="text-white text-decoration-none">Mendaftar Cafe</a>
                @endcan
            </div>

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tentangModal" tabindex="-1" aria-labelledby="tentangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tentangModalLabel">Tentang Kami</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Cafe Journey adalah tempat terpercaya yang dapat membantu Anda menemukan berbagai cafe menarik di kota
                dan kabupaten Tegal. Kami fokus pada kualitas, kenyamanan, dan kenikmatan dalam menyediakan informasi
                tentang cafe terbaik. Kami memberikan informasi lengkap tentang menu lezat dan suasana yang menarik di
                setiap cafe. Tim kami telah melakukan penelitian dan pengujian untuk memastikan bahwa setiap cafe yang
                terdaftar di platform kami memenuhi standar kualitas yang tinggi. Kami berkomitmen untuk memberikan
                pengalaman pencarian yang mudah, menarik, dan memuaskan bagi semua pecinta kopi dan pengunjung cafe.
                Temukan tempat yang sempurna untuk pertemuan bisnis, nongkrong santai, atau bersantai bersama
                teman-teman di Cafe Journey.
            </div>
        </div>
    </div>
</div>


{{-- Bantuan --}}
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Bantuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @include('partials.collaps')
    </div>
</div>
{{-- End Bantuan --}}
