@extends('layouts.main')

@section('container')
    {{-- Hero --}}
    <section id="hero" class="pt-5">
        <div class="hero-container my-5">
            <div class="container-fluid">
                <div class="row d-flex">
                    <div class="col align-middle">
                        <div class="px-2 py-2">
                            <img src="{{ asset('/assets/img/' . 'coffee_illustration.png') }}" class="img-fluid"
                                alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="px-5 py-5 mt-5">
                            <div class="px-2 py-2 align-middle">
                                <h4 class="hero-title"><span style="color: #cf9181">Find,</span> <span style="color: #385a64">Order &</span> <span style="color: #ff755f;">Enjoy!</span></h4>
                                <p class="hero-subtitle">Discover a world of delightful cafes in Tegal. Explore the finest coffee spots curated
                                    just for you. From cozy
                                    corners to vibrant atmospheres, we've got your cafe needs covered.</p>
                            </div>
                            <div class="px-2 py-2">
                                <button type="button" class="hero-button shadow-sm">
                                    <i class="bi bi-search ps-2"></i>
                                    <span class="px-2">Find Your Cafe</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    {{-- End Hero --}}

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

    <section id="cafe-list-container" class=" rounded-sm p-3">

        {{-- Section Title --}}
        <div class="row" id="cafe-list-title">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center px-3 pt-4 mb-3">
                    <h5 class="fw-bold">
                        Popular Cafe
                    </h5>
                    <a href="/cafe" class="text-decoration-none">See All</a>
                </div>
            </div>
        </div>

        {{-- Cafe List --}}
        <div id="cafe-list-card" class="row row-cols-2 row-cols-lg-4 g-4 p-3 mb-4">
            @foreach ($cafes as $cafe)
                <div class="col-6 col-md-3" style="position: relative">
                    {{-- Lencana --}}
                    @if ($lencana[0] == $cafe->nama_cafe)
                        <img class="lencana shadow-lg" src="/assets/img/terbaik_1.png" alt="" width="60px">
                    @elseif ($lencana[1] == $cafe->nama_cafe)
                        <img class="lencana shadow-lg" src="/assets/img/terbaik_2.png" alt="" width="60px">
                    @elseif ($lencana[2] == $cafe->nama_cafe)
                        <img class="lencana shadow-lg" src="/assets/img/terbaik_3.png" alt="" width="60px">
                    @endif
                    {{-- END Lencana --}}

                    <div class="card rounded-sm p-3 border-0 shadow-sm mb-3">
                        <a href="/cafe/{{ $cafe->slug }}" class="text-decoration-none text-main">
                            @if (isset($cafe->gambar_profil))
                                <img style="object-fit: cover; width:100%;  height: 145px"
                                    src="{{ asset('storage/' . $cafe->gambar_profil) }}"
                                    class="card-img-top img-profil rounded-sm" alt="...">
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
                                        <div style="font-size: 12px" class="ratings mr-2 d-flex">
                                            <i class="{{ $rata_rata >= 1 ? 'text-warning bi bi-star-fill' : 'bi bi-star' }}"></i>
                                            <i class="{{ $rata_rata >= 2 ? 'text-warning bi bi-star-fill' : ($rata_rata > 1 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                            <i class="{{ $rata_rata >= 3 ? 'text-warning bi bi-star-fill' : ($rata_rata > 2 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                            <i class="{{ $rata_rata >= 4 ? 'text-warning bi bi-star-fill' : ($rata_rata > 3 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                            <i class="{{ $rata_rata >= 5 ? 'text-warning bi bi-star-fill' : ($rata_rata > 4 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }} "></i>
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
        </div>
    </section>
@endsection
