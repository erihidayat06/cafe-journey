@extends('cafe.layouts.main')

@section('container')
    <ul class="nav nav-underline mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-main" id="minuman-tab" data-bs-toggle="pill" data-bs-target="#minuman"
                type="button" role="tab" aria-controls="minuman" aria-selected="true">Minuman</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-main" id="makanan-tab" data-bs-toggle="pill" data-bs-target="#makanan"
                type="button" role="tab" aria-controls="makanan" aria-selected="false">Makanan</button>
        </li>
    </ul>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="minuman" role="tabpanel" aria-labelledby="minuman-tab" tabindex="0">
            @include('cafe.minuman')
        </div>
        <div class="tab-pane fade" id="makanan" role="tabpanel" aria-labelledby="makanan-tab" tabindex="0">
            @include('cafe.makanan')
        </div>
    </div>

    <div class="position-fixed bottom-0 start-0 shadow" id="pembelian">
        <div class="row row-cols-3">
            @auth
                <?php $total = 0; ?>
                <?php $total_harga = 0; ?>

                @auth
                    @foreach ($cafe->beli->where('user_id', auth()->user()->id) as $beli)
                        @if (!isset($beli->no_pesanan))
                            <?php $total = $beli->jumlah + $total; ?>
                            @if (isset($beli->minum->harga))
                                <?php $total_harga = $beli->minum->harga * $beli->jumlah + $total_harga; ?>
                            @elseif (isset($beli->makanan->harga))
                                <?php $total_harga = $beli->makanan->harga * $beli->jumlah + $total_harga; ?>
                            @endif
                        @endif
                    @endforeach
                @endauth

                <div class="col">Jumlah : {{ number_format("$total",0,",",".") }}</div>

                <div class="col">Sub Total : {{ number_format("$total_harga",0,",",".") }}</div>
            @else
                <div class="col">Jumlah : 0</div>

                <div class="col">Sub Total : 0</div>
            @endauth
            <div class="col">
                <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#detail{{ $cafe->id }}">Lihat Pesanan</a>
            </div>
        </div>
    </div>
    @include('cafe.modal.modalDetail')
@endsection
