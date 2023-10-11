{{-- Hari senin --}}
@if (isset($cafes->jadwal))
    @if ($cafes->jadwal->opsi == 'buka')
        @if (date('H.i', strtotime($cafes->jadwal->senin_buka)) < date('H.i') &&
                date('H.i', strtotime($cafes->jadwal->senin_tutup)) > date('H.i') &&
                date('D') == 'Mon')
            {{ 'Buka' }}
            <div style="border-bottom: 2px solid white"></div>
            {{ date('H.i', strtotime($cafes->jadwal->senin_buka)) }} -
            {{ date('H.i', strtotime($cafes->jadwal->senin_tutup)) }}
            {{-- End Hari senin --}}

            {{-- Hari selasa --}}
        @elseif (date('H.i', strtotime($cafes->jadwal->selasa_buka)) < date('H.i') &&
                date('H.i', strtotime($cafes->jadwal->selasa_tutup)) > date('H.i') &&
                date('D') == 'Tue')
            {{ 'Buka' }}
            <div style="border-bottom: 2px solid white"></div>
            {{ date('H.i', strtotime($cafes->jadwal->selasa_buka)) }} -
            {{ date('H.i', strtotime($cafes->jadwal->selasa_tutup)) }}
            {{-- End Hari selasa --}}

            {{-- Hari Rabu --}}
        @elseif (date('H.i', strtotime($cafes->jadwal->rabu_buka)) < date('H.i') &&
                date('H.i', strtotime($cafes->jadwal->rabu_tutup)) > date('H.i') &&
                date('D') == 'Wed')
            {{ 'Buka' }}
            <div style="border-bottom: 2px solid white"></div>
            {{ date('H.i', strtotime($cafes->jadwal->rabu_buka)) }} -
            {{ date('H.i', strtotime($cafes->jadwal->rabu_tutup)) }}
            {{-- End Hari Rabu --}}

            {{-- Hari Kamis --}}
        @elseif (date('H.i', strtotime($cafes->jadwal->kemis_buka)) < date('H.i') &&
                date('H.i', strtotime($cafes->jadwal->kemis_tutup)) > date('H.i') &&
                date('D') == 'Thu')
            {{ 'Buka' }}
            <div style="border-bottom: 2px solid white"></div>
            {{ date('H.i', strtotime($cafes->jadwal->kemis_buka)) }} -
            {{ date('H.i', strtotime($cafes->jadwal->kemis_tutup)) }}
            {{-- End Hari Kamis --}}

            {{-- Hari Jumat --}}
        @elseif (date('H.i', strtotime($cafes->jadwal->jumat_buka)) < date('H.i') &&
                date('H.i', strtotime($cafes->jadwal->jumat_tutup)) > date('H.i') &&
                date('D') == 'Fri')
            {{ 'Buka' }}
            <div style="border-bottom: 2px solid white"></div>
            {{ date('H.i', strtotime($cafes->jadwal->jumat_buka)) }} -
            {{ date('H.i', strtotime($cafes->jadwal->jumat_tutup)) }}
            {{-- End Hari Jumat --}}

            {{-- Hari sabtu --}}
        @elseif (date('H.i', strtotime($cafes->jadwal->sabtu_buka)) < date('H.i') &&
                date('H.i', strtotime($cafes->jadwal->sabtu_tutup)) > date('H.i') &&
                date('D') == 'Sat')
            {{ 'Buka' }}
            <div style="border-bottom: 2px solid white"></div>
            {{ date('H.i', strtotime($cafes->jadwal->sabtu_buka)) }} -
            {{ date('H.i', strtotime($cafes->jadwal->sabtu_tutup)) }}
            {{-- End Hari sabtu --}}

            {{-- Hari Minggu --}}
        @elseif (date('H.i', strtotime($cafes->jadwal->minggu_buka)) < date('H.i') &&
                date('H.i', strtotime($cafes->jadwal->minggu_tutup)) > date('H.i') &&
                date('D') == 'Mon')
            {{ 'Buka' }}
            <div style="border-bottom: 2px solid white"></div>
            {{ date('H.i', strtotime($cafes->jadwal->minggu_buka)) }} -
            {{ date('H.i', strtotime($cafes->jadwal->minggu_tutup)) }}
            {{-- End Hari Minggu --}}
        @else
            <?php $t = 1; ?>
            <p style="padding: 15px 25px 5px 25px">Tutup</p>
        @endif

        @if (isset($t))
            <style>
                .jadwal {
                    background-color: #c12525;
                }
            </style>
        @else
            <style>
                .jadwal {
                    background-color: #31ad2f;
                }
            </style>
        @endif
    @elseif ($cafes->jadwal->opsi == 'tutup')
        <style>
            .jadwal {
                background-color: #c12525;
            }
        </style>

        <p style="padding: 15px 25px 5px 25px">Tutup</p>
    @endif

@endif
