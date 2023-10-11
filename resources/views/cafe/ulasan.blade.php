@extends('cafe.layouts.main')

@section('container')
    @foreach ($ulasans as $ulasan)
        <div class="card rounded mb-2">
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
    @if (count($ulasans) <= 0)
        <div class="row mt-2 text-center">
            <p class="text-main">Cafe Ini Belum Mendapatan Ulasan :(</p>
        </div>
    @endif
@endsection
