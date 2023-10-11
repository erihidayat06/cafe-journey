{{-- Card Alamat --}}
<div class="card mt-2">
    <div class="card-body text-center">
        <h4 class="text-main">Alamat</h4>
        <p>
            @if (isset($cafes->map))
                <iframe style="border: 3px solid #4b1f1f" src="{{ substr($cafes->map, 13, 288) }}" width="80%"
                    height="250" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            @else
                <style>
                    .map {
                        transform: 50% 50%;
                        width: 80%;
                        padding: 125px 0px;
                        margin: auto;
                        text-align: center;
                        border: 3px solid #4b1f1f;
                    }
                </style>
                <p class="map">Data Tidak Ada</p>
            @endif
        </p>
        @if (isset($cafes->alamat))
            <p>{{ $cafes->alamat }} , Kec {{ $cafes->kecamatan }} , {{ $cafes->domisili }}</p>
        @endif
    </div>
</div>
{{-- End Card Alamat --}}
