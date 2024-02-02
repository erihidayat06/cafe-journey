@extends('layouts.main')

@section('container')
    @auth
        <section id="cafe-list-container" class="rounded-sm p-3">

            {{-- Section Title --}}
            <div class="row" id="cafe-list-title">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center px-3 pt-4 mb-3">
                        <h5 class="fw-bold">
                            Popular Cafe
                        </h5>
                        <a href="/cafes" class="text-decoration-none">Lihat Semua</a>
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
            </div>
        </section>
    @else
        {{-- Hero --}}
        <section id="hero">
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
                                    <h4 class="hero-title"><span style="color: #cf9181">Cari,</span> <span
                                            style="color: #385a64">Pesan <br> &</span> <span style="color: #ff755f;">Santai!</span>
                                    </h4>
                                    <p class="hero-subtitle">
                                        Temukan dunia kafe yang menyenangkan di Tegal. Jelajahi tempat ngopi terbaik yang dicari khusus untuk Anda. Dari sudut yang nyaman hingga suasana yang semarak, kami memiliki semua kebutuhan kafe Anda.
                                    </p>
                                </div>
                                <div class="px-2 py-2">
                                    <button type="button" class="hero-button shadow-sm" data-bs-toggle="modal" data-bs-target="#searchModal">
                                        <i class="bi bi-search ps-2"></i>
                                        <span class="px-2">Cari Kafe Sekarang</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        {{-- Popular Cafe --}}
        <section id="cafe-list-container" class="rounded-sm p-3">
            <div class="row" id="cafe-list-title">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center px-3 pt-4 mb-3">
                        <h5 class="fw-bold">
                            Kafe Terpopuler
                        </h5>
                        <a href="/cafes" class="text-decoration-none">Lihat Semua</a>
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
                                    <img style="object-fit: cover" src="/assets/img/default.png"
                                        class="card-img-top img-profil" alt="..." width="50px" height="160px">
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
            </div>
        </section>

        {{-- Popular Menu --}}
        <section id="cafe-gallery-menu">
            <div class="gallery-block grid-gallery">
                <div class="container">
                    {{-- Section Title --}}
                    <div class="row" id="cafe-list-title">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center pt-4 mb-3">
                                <h5 class="fw-bold text-danger">
                                    Rekomendasi Menu
                                </h5>
                                <p>
                                    Daftar menu yang direkomendasikan dari berbagai kafe di Tegal
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 item">
                            <a class="lightbox"
                                href="https://images.unsplash.com/photo-1541167760496-1628856ab772?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8Y29mZmVlfGVufDB8fDB8fHww">
                                <img class="img-fluid image scale-on-hover"
                                    src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fGNvZmZlZXxlbnwwfDB8MHx8fDA%3D">
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <a class="lightbox"
                                href="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y29mZmVlfGVufDB8MHwwfHx8MA%3D%3D">
                                <img class="img-fluid image scale-on-hover"
                                    src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y29mZmVlfGVufDB8MHwwfHx8MA%3D%3D">
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <a class="lightbox"
                                href="https://res.cloudinary.com/dpnaptcei/image/upload/v1537070506/Gallery/image3.jpg">
                                <img class="img-fluid image scale-on-hover"
                                    src="https://plus.unsplash.com/premium_photo-1674407009848-4da7a12b6b25?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGNvZmZlZXxlbnwwfDB8MHx8fDA%3D">
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <a class="lightbox"
                                href="https://res.cloudinary.com/dpnaptcei/image/upload/v1537070505/Gallery/image4.jpg">
                                <img class="img-fluid image scale-on-hover"
                                    src="https://plus.unsplash.com/premium_photo-1668063245248-90ee5a1ff77c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjF8fGNvZmZlZXxlbnwwfDB8MHx8fDA%3D">
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <a class="lightbox"
                                href="https://res.cloudinary.com/dpnaptcei/image/upload/v1537070506/Gallery/image5.jpg">
                                <img class="img-fluid image scale-on-hover"
                                    src="https://images.unsplash.com/photo-1594910060116-a496d8a55fae?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YnJlYWQlMjBjaG9jb3xlbnwwfDB8MHx8fDA%3D">
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 item">
                            <a class="lightbox"
                                href="https://res.cloudinary.com/dpnaptcei/image/upload/v1537070508/Gallery/image6.jpg">
                                <img class="img-fluid image scale-on-hover"
                                    src="https://plus.unsplash.com/premium_photo-1667806845059-51fa9165bda1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDh8fHxlbnwwfHx8fHw%3D">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endauth

    <!-- Modal Pencarian -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 rounded-sm shadow-sm">
                {{-- <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">Cari Kafe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body">
                    <h6>
                        Cari Nama Kafe (BETA)
                    </h6>
                    <form action="/" id="searchForm" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Nama Cafe [ENTER]"
                                aria-label="Cari Nama Cafe [ENTER]" name="cari" value="{{ request('cari') }}">
                            
                            <!-- Pill Rekomendasi -->
                            <div class="input-group-append ms-2">
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#rekomendasiPills" aria-expanded="false" aria-controls="rekomendasiPills">
                                    Rekomendasi
                                </button>
                            </div>
                        </div>
    
                        <!-- Pill Rekomendasi (hidden by default) -->
                        <div class="collapse mt-2" id="rekomendasiPills">
                            <div class="d-flex flex-wrap">
                                <!-- Tambahkan pill-pill rekomendasi di sini -->
                                <span class="badge bg-primary me-2 mb-2">Kafe A</span>
                                <span class="badge bg-primary me-2 mb-2">Kafe B</span>
                                <span class="badge bg-primary me-2 mb-2">Kafe C</span>
                            </div>
                        </div>
                    </form>                  
                </div>
            </div>
        </div>
    </div>

@endsection
