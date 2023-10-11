@extends('layouts.main')
@section('container')
    {{-- Bantuan --}}
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @include('partials.collaps')
        </div>
    </div>
    {{-- End Bantuan --}}

    <div style="margin-bottom: 300px" class="row row-cols-2 row-cols-lg-6 mt-2 g-4">

        {{-- Card Pilihan Cafe --}}
        @foreach ($cafes as $cafe)
            <div class="col" style="position: relative">
                {{-- Lencana --}}
                @if ($lencana[0] == $cafe->nama_cafe)
                    <img class="lencana shadow-lg" src="/assets/img/terbaik_1.png" alt="" width="60px">
                @elseif ($lencana[1] == $cafe->nama_cafe)
                    <img class="lencana shadow-lg" src="/assets/img/terbaik_2.png" alt="" width="60px">
                @elseif ($lencana[2] == $cafe->nama_cafe)
                    <img class="lencana shadow-lg" src="/assets/img/terbaik_3.png" alt="" width="60px">
                @endif

                {{-- END Lencana --}}


                <div style="width: 160px; height: 290px;" class="card rounded">
                    <a href="/cafe/{{ $cafe->slug }}" class="text-decoration-none text-main">
                        @if (isset($cafe->gambar_profil))
                            <img style="object-fit: cover; width:100%;  height: 145px"
                                src="{{ asset('storage/' . $cafe->gambar_profil) }}" class="card-img-top img-profil"
                                alt="...">
                        @else
                            <img style="object-fit: cover" src="/assets/img/default.png" class="card-img-top img-profil"
                                alt="..." width="50px" height="160px">
                        @endif
                        <div class="card-body">
                            <h6 style="width: 100%" class="card-title text-over d-inline-block text-truncate">
                                {{ $cafe->nama_cafe }}</h6>

                            {{-- Rata Rata Rating --}}
                            @if (count($cafe->ulasan) > 0)
                                <?php
                                $rata_rata = $cafe->ulasan->sum('rating') / count($cafe->ulasan);
                                $jumlahRating = $cafe->ulasan->sum('rating');
                                ?>
                            @endif

                            {{-- Rating --}}
                            @if (count($cafe->ulasan) > 0)
                                <div style="color:#676767;"
                                    class="mb-3 mt-3 col d-flex justify-content-start align-items-center fw-normal">
                                    <div style="font-size: 9px" class="ratings mr-2 d-flex">
                                        <i
                                            class="{{ $rata_rata >= 1 ? 'text-warning bi bi-star-fill' : 'bi bi-star' }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 2 ? 'text-warning bi bi-star-fill' : ($rata_rata > 1 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 3 ? 'text-warning bi bi-star-fill' : ($rata_rata > 2 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 4 ? 'text-warning bi bi-star-fill' : ($rata_rata > 3 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 5 ? 'text-warning bi bi-star-fill' : ($rata_rata > 4 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }} "></i>
                                        <span class="fw-bold">&nbsp;{{ round($rata_rata, 1) }}</span>
                                        <span style="padding-bottom:1px" class="d-flex align-items-end">&nbsp;
                                            ({{ count($cafe->ulasan) }} Ulasan)
                                        </span>
                                    </div>
                                </div>
                            @else
                                <div style="color:#676767;"
                                    class="col mt-3 mb-3 d-flex justify-content-start align-items-center fw-normal">
                                    <div style="font-size: 9px" class="ratings">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <span class="fw-bold">&nbsp;0</span>
                                        <span style="padding-bottom:1px" class="review-count mt-1">
                                            ({{ count($cafe->ulasan) }} Ulasan)
                                        </span>
                                    </div>
                                </div>
                            @endif
                            {{-- End Rating --}}

                            {{-- Domisili Dan Kecamatan --}}
                            <p style="font-size: 11px" class="card-text ">{{ $cafe->domisili }} | Kec
                                {{ $cafe->kecamatan }}
                            </p>

                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        {{-- End Card Pilihan --}}
    </div>
@endsection
