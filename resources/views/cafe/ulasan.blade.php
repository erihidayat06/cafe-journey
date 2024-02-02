@extends('cafe.layouts.main')

@section('container')
    <div class="container card shadow-sm rounded-sm border-0 p-5">
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
                                class="d-flex align-items-end">/5.0&nbsp;&nbsp;
                                {{ $jumlahRating }} Rating |
                                {{ count($semua) }} Ulasan</span>
                        </div>
                    </div>
                @else
                    {{-- Jika Tidak Ada Rating --}}
                    <div style="color:#676767;" class="col mt-3 d-flex justify-content-start align-items-center fw-normal">
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
                    <a class="btn active-button" data-bs-toggle="modal" data-bs-target="#ratingModal">Tambah Ulasan</a>
                </div>
                @include('cafe.modal.modalRating')
            @else
                {{-- Menambah Ulsan (Jika Belum Login Maka Akan Muncul Modal Login Dulu Dong!!!) --}}
                <div class="col text-end">
                    <a class="btn active-button" data-bs-toggle="modal" data-bs-target="#login">
                        {{-- Icon PLus --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path
                                d="M8 3.5a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3H4a.5.5
                                0 0 1 0-1h3v-3a.5.5 0 0 1 .5-.5z">
                            </path>
                        </svg>
                        {{-- End Icon PLus --}}
                        Tambah Ulasan
                    </a>
                </div>
                @include('login.modalLogin')
            @endauth

        </div>
        <hr>
        @foreach ($ulasans as $ulasan)
            <div class="card rounded mb-2">
                <div class="card-body">
                    <div class="row row-cols-2">
                        <div class="col text-start">
                            @if ($ulasan->user)
                                {{ $ulasan->user->name }}
                            @else
                                Anonim
                            @endif
                        </div>
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
        @if (count($ulasans) <= 0)
            <div class="row mt-2 text-center">
                <p class="text-main">Cafe Ini Belum Mendapatan Ulasan :(</p>
            </div>
        @endif
    </div>
@endsection
