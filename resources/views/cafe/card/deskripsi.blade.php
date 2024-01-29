<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-sm mb-4">
                <div class="card-body text-center">
                    <h4 class="text-main">Deskripsi</h4>
                    <p>{!! $cafes->deskripsi !!}</p>
                    <br>
                    <h4 class="text-main">
                        Lokasi Cafe
                    </h4>
                    <p>
                        @if (isset($cafes->alamat))
                            {{ $cafes->alamat }} , Kec {{ $cafes->kecamatan }} , {{ $cafes->domisili }}
                        @else 
                            Data Tidak Ada
                        @endif
                    </p>
                    <br>
                    <div class="contacts">
                        <h4 class="text-main">
                            Kontak Cafe
                        </h4>
                        <p>
                            @if (isset($cafes->whatsapp))
                                <div class="row">
                                    <div class="col-12">
                                        {{-- Whatsapp Button --}}
                                        <a target="_blank"
                                            href="https://api.whatsapp.com/send?phone=62{{ substr($cafes->whatsapp, 1) }}"
                                            class="btn btn-success rounded-sm">
                                            <i class="bi bi-whatsapp"></i>
                                            Whatsapp
                                        </a>
                                        {{-- Instagram Button --}}
                                        <a target="_blank" href="{{ $cafes->instagram }}"
                                            class="btn btn-primary rounded-sm">
                                            <i class="bi bi-instagram"></i>
                                            Instagram
                                        </a>
                                        {{-- Email BUttons --}}
                                        <a target="_blank" href="mailto:{{ $cafes->email }}"
                                            class="btn btn-danger rounded-sm">
                                            <i class="bi bi-envelope"></i>
                                            Email
                                        </a>
                                        {{-- Facebook --}}
                                        <a target="_blank" href="{{ $cafes->facebook }}"
                                            class="btn rounded-sm text-light" style="background-color: blue;">
                                            <i class="bi bi-facebook"></i>
                                            Facebook
                                        </a>
                                    </div>
                                </div>
                            @else 
                                Data Tidak Ada
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-sm mb-4">
                <div class="card-body text-center">
                    @if (isset($cafes->map))
                        <div class="maps-view">
                            <iframe
                              src="{{ substr($cafes->map, 13, 288) }}"
                              width="100%" height="376" allowfullscreen="" loading="lazy"
                              referrerpolicy="no-referrer-when-downgrade" class="maps rounded shadow-sm"></iframe>
                          </div>
                    @else
                        <style>
                            .map {
                                width: 80%;
                                padding: 125px 0px;
                                margin: auto;
                                text-align: center;
                                border: 3px solid #4b1f1f;
                            }
                        </style>
                        <p class="map">Data Tidak Ada</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
