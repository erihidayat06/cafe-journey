{{-- Rating --}}
<div class="card mt-2" id="rating">
    <div class="card-body text-center">
        <h4 class="text-main">Ulasan</h4>
        <div class="row row-cols-1 row-cols-lg-2">

            <div class="col">

                {{-- Menghitung Rata Rata --}}
                @if (count($semua) > 0)
                    <?php
                    $rata_rata = $semua->sum('rating') / count($semua);
                    $jumlahRating = $semua->sum('rating');
                    ?>
                @endif
                {{-- End Menghitung Rata Rata --}}

                {{-- Jika Terdapat Rating --}}
                @if (isset($rata_rata))
                    <div style="color:#676767;"
                        class="mb-3 mt-3 col d-flex justify-content-start align-items-center fw-normal">
                        <div class="ratings mr-2 fs-6 d-flex">
                            <i class="{{ $rata_rata >= 1 ? 'text-warning bi bi-star-fill' : 'bi bi-star' }}"></i>
                            <i
                                class="{{ $rata_rata >= 2 ? 'text-warning bi bi-star-fill' : ($rata_rata > 1 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                            <i
                                class="{{ $rata_rata >= 3 ? 'text-warning bi bi-star-fill' : ($rata_rata > 2 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                            <i
                                class="{{ $rata_rata >= 4 ? 'text-warning bi bi-star-fill' : ($rata_rata > 3 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                            <i
                                class="{{ $rata_rata >= 5 ? 'text-warning bi bi-star-fill' : ($rata_rata > 4 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }} "></i>
                            <span class="fw-bold">&nbsp;{{ round($rata_rata, 1) }}</span>
                            <span style="font-size: 12px; padding-bottom:1px"
                                class="d-flex align-items-end">/5.0&nbsp;&nbsp; {{ $jumlahRating }} Rating |
                                {{ count($semua) }} Ulasan</span>
                        </div>
                    </div>
                @else
                    {{-- Jika Tidak Ada Rating --}}
                    <div style="color:#676767;"
                        class="col mt-3 d-flex justify-content-start align-items-center fw-normal">
                        <div class="ratings">
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <span class="fw-bold">&nbsp;0</span>
                        <span style="font-size: 12px; padding-bottom:1px" class="review-count mt-1">/0 Rating |
                            {{ count($semua) }} Ulasan
                        </span>
                    </div>
                @endif
            </div>

            {{-- Menambah Ulasan --}}
            @auth
                <div class="col text-end">
                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ratingModal">Tambah Ulasan</a>
                </div>
                @include('cafe.modal.modalRating')
            @else
                {{-- Menambah Ulsan (Jika Belum Login Maka Akan Muncul Modal Login Dulu Dong!!!) --}}
                <div class="col text-end">
                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#login">Tambah Ulasan</a>
                </div>
                @include('login.modalLogin')
            @endauth

        </div>
        <hr>

        {{-- Ulasan Pengunjung Cafe (Ditampilakan Hanya dua) --}}
        @foreach ($ulasans as $ulasan)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row row-cols-2">
                        <div class="col text-start">{{ $ulasan->user->name }}</div>
                        <div class="col text-end">
                            <div class="rate">
                                <span>
                                    <?= $ulasan->rating >= 1 ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-warning"></i>' ?></span>
                                <span>
                                    <?= $ulasan->rating >= 2 ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-warning"></i>' ?></span>
                                <span>
                                    <?= $ulasan->rating >= 3 ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-warning"></i>' ?></span>
                                <span>
                                    <?= $ulasan->rating >= 4 ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-warning"></i>' ?></span>
                                <span>
                                    <?= $ulasan->rating == 5 ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-warning"></i>' ?></span>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-start">
                        <p>{{ $ulasan->ulasan }}</p>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Lihat Ulasan Lainya --}}
        @if (count($ulasans) >= 1)
            <div class="row mt-2">
                <a href="/cafe/ulasan/{{ $cafes->slug }}" class="text-main">Lihat Ulasan Lainnya >>></a>
            </div>
        @else
            <div class="row mt-2">
                <p class="text-main">Cafe Ini Belum Mendapatan Ulasan</p>
            </div>
        @endif

    </div>
</div>
