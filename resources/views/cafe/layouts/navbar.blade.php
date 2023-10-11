<div class="card text-bg-dark">
    <img src="{{ asset('storage/' . $cafes->gambar_profil) }}" class="card-img img-cafe" alt="...">

    <div class="card-img-overlay bg-nav-cafe">
        <div class="row row-cols-1 row-cols-lg-2 ">
            <div class="col col-lg-2">
                @if (isset($cafes->gambar_profil))
                    <img class="img-cafe-logo" src="{{ asset('storage/' . $cafes->gambar_logo) }}" alt="">
                @else
                    <img class="img-cafe-logo" src="/assets/img/default.png" alt="">
                @endif
            </div>
            <div class="col">
                <div class="text-cafe">
                    <h3 class="text-capitalize">{{ $cafes->nama_cafe }}</h3>
                    @if (count($semua) > 0)
                        <?php
                        $rata_rata = $semua->sum('rating') / count($semua);
                        $jumlahRating = $semua->sum('rating');
                        ?>
                    @endif
                    <a href="#rating" class="text-decoration-none text-white">
                        @if (isset($rata_rata))
                            <div style="color:#676767;"
                                class="mt-2 mb-1 col d-flex justify-content-start align-items-center fw-normal">
                                <div class="ratings mr-2 fs-6 d-flex text-white">
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

                                    <span style="font-size: 12px; padding-bottom:1px"
                                        class="d-flex align-items-end">/5.0</span>
                                </div>
                            </div>
                            <span style="font-size: 12px">{{ $jumlahRating }} dari ({{ count($semua) }} Ulasan)</span>
                        @else
                            <div style="color:#ffffff;"
                                class="col mt-3 d-flex justify-content-start align-items-center fw-normal">
                                <div class="ratings">
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                </div>
                                <span class="fw-bold">&nbsp;0/5.0</span>
                            </div>
                            <span style="font-size: 12px; padding-bottom:1px" class="review-count mt-1">0 dari (0
                                Ulasan)
                            </span>
                        @endif
                    </a>

                    <p class="text-capitalize" style="width: 70%">{{ $cafes->alamat }} ,Kec {{ $cafes->kecamatan }} ,
                        {{ $cafes->domisili }}</p>
                </div>
            </div>

            <a href="#jadwal">
                <div class="jadwal">
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    @include('cafe.layouts.jadwal')

                </div>
            </a>
        </div>
    </div>
</div>
<a href="/" style="font-size: 12px" class="home-cafe text-light text-decoration-none">Home</a>
<nav class="navbar bg-white text-main">
    <div class="container-fluid">

        <div style="margin: auto" class="text-center" id="navbarNav">
            <ul class="nav ">
                <li class="nav-item text-main">
                    <a style="color: #4b1f1f; {{ Request::is("cafe/$cafes->slug") ? 'border-bottom:2px solid #4b1f1f;' : '' }}"
                        class="nav-link" href="/cafe/{{ $cafes->slug }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a style="color: #4b1f1f; {{ Request::is("cafe/ulasan/$cafes->slug") ? 'border-bottom:2px solid #4b1f1f;' : '' }}"
                        class="nav-link" href="/cafe/ulasan/{{ $cafes->slug }}">Ulasan</a>
                </li>
                <li class="nav-item">
                    <a style="color: #4b1f1f; {{ Request::is("cafe/menu/$cafes->slug") ? 'border-bottom:2px solid #4b1f1f;' : '' }}"
                        class="nav-link" href="/cafe/menu/{{ $cafes->slug }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a style="color: #4b1f1f; {{ Request::is("cafe/booking/$cafes->slug") ? 'border-bottom:2px solid #4b1f1f;' : '' }}"
                        class="nav-link" href="/cafe/booking/{{ $cafes->slug }}">Reservasi</a>
                </li>
            </ul>
        </div>
    </div>

</nav>
