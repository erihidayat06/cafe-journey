{{-- card Jadwal --}}
<div class="card mt-2" id="jadwal">
    <div class="card-body text-center">
        <h4 class="text-main">Jadwal</h4>
        <style>
            table,
            tr,
            td {
                padding: 5px;
                font-size: 20px
            }

            table {
                margin: auto;
            }
        </style>

        <table>
            @if (isset($cafes->jadwal))
                <tr>
                    <td>Senin</td>
                    <td>:</td>
                    @if ($cafes->jadwal->senin_buka)
                        <td>{{ date('H:i', strtotime($cafes->jadwal->senin_buka)) }}</td>
                        <td> - </td>
                        <td>{{ date('H:i', strtotime($cafes->jadwal->senin_tutup)) }}</td>
                    @else
                        <td>Libur</td>
                    @endif
                </tr>
                <tr>
                    <td>Selasa</td>
                    <td>:</td>
                    @if ($cafes->jadwal->selasa_buka)
                        <td>{{ date('H:i', strtotime($cafes->jadwal->selasa_buka)) }}</td>
                        <td> - </td>
                        <td>{{ date('H:i', strtotime($cafes->jadwal->selasa_tutup)) }}</td>
                    @else
                        <td>Libur</td>
                    @endif
                </tr>
                <tr>
                    <td>Rabu</td>
                    <td>:</td>
                    @if ($cafes->jadwal->rabu_buka)
                        <td>{{ date('H:i', strtotime($cafes->jadwal->rabu_buka)) }}</td>
                        <td> - </td>
                        <td>{{ date('H:i', strtotime($cafes->jadwal->rabu_tutup)) }}</td>
                    @else
                        <td>Libur</td>
                    @endif
                </tr>
                <tr>
                    <td>Kamis</td>
                    <td>:</td>
                    @if ($cafes->jadwal->kemis_buka)
                        <td>{{ date('H:i', strtotime($cafes->jadwal->kemis_buka)) }}</td>
                        <td> - </td>
                        <td>{{ date('H:i', strtotime($cafes->jadwal->kemis_tutup)) }}</td>
                    @else
                        <td>Libur</td>
                    @endif
                </tr>
                <tr>
                    <td>Jumaat</td>
                    <td>:</td>
                    @if ($cafes->jadwal->jumat_buka)
                        <td>{{ date('H:i', strtotime($cafes->jadwal->jumat_buka)) }}</td>
                        <td> - </td>
                        <td>{{ date('H:i', strtotime($cafes->jadwal->jumat_tutup)) }}</td>
                    @else
                        <td>Libur</td>
                    @endif
                </tr>
                <tr>
                    <td>Sabtu</td>
                    <td>:</td>
                    @if ($cafes->jadwal->sabtu_buka)
                        <td>{{ date('H:i', strtotime($cafes->jadwal->sabtu_buka)) }}</td>
                        <td> - </td>
                        <td>{{ date('H:i', strtotime($cafes->jadwal->sabtu_tutup)) }}</td>
                    @else
                        <td>Libur</td>
                    @endif
                </tr>
                <tr>
                    <td>Minggu</td>
                    <td>:</td>
                    @if ($cafes->jadwal->minggu_buka)
                        <td>{{ date('H:i', strtotime($cafes->jadwal->minggu_buka)) }}</td>
                        <td> - </td>
                        <td>{{ date('H:i', strtotime($cafes->jadwal->minggu_tutup)) }}</td>
                    @else
                        <td>Libur</td>
                    @endif
                </tr>
            @endif
        </table>
    </div>
</div>
