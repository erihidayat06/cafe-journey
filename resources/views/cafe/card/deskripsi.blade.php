<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card rounded-sm mb-4">
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
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card rounded-sm mb-4">
                <div class="card-body text-center">
                    @if (isset($cafes->map))
                        <div class="maps-view">
                            <iframe
                              src="{{ substr($cafes->map, 13, 288) }}"
                              width="100%" height="250" allowfullscreen="" loading="lazy"
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
