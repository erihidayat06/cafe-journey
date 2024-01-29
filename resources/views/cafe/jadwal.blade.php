@extends('cafe.layouts.main')

@section('container')
    <div class="container card mt-2 shadow-sm rounded-sm border-0" id="jadwal">
        <div class="card-body text-center">
            @if (isset($cafes->jadwal))
                <div class="table-responsive">
                    <table class="table table-bordered rounded-sm">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Jam Buka</th>
                                <th>Jam Tutup</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumaat', 'Sabtu', 'Minggu'] as $day)
                                @php
                                    $day_lower = strtolower($day);
                                @endphp
                                <tr>
                                    <td>{{ $day }}</td>
                                    @if ($cafes->jadwal->{$day_lower.'_buka'})
                                        <td>{{ date('H:i', strtotime($cafes->jadwal->{$day_lower.'_buka'})) }}</td>
                                        <td>{{ date('H:i', strtotime($cafes->jadwal->{$day_lower.'_tutup'})) }}</td>
                                    @else
                                        <td colspan="2">Libur</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <small>
                        <i>
                            *Jam buka dan tutup dapat berubah sewaktu-waktu
                        </i>
                    </small>
                </div>
            @endif
        </div>
    </div>
@endsection
