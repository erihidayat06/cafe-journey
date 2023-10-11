<!-- Modal -->
<div class="modal fade" id="jadwal" tabindex="-1" aria-labelledby="jadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="jadwalLabel">Jadwal Cafe</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Note : Jika Jadwal Buka di Kosongkan Maka Berstatus <span class="text-success">Libur</span></p>
                <form action="/dashboard/jadwal/{{ $jadwal->id }}" method="post">
                    @csrf
                    @method('PUT')

                    <style>
                        table {
                            margin: auto
                        }

                        table,
                        tr,
                        th,
                        td {
                            padding: 2px 3px;
                        }
                    </style>
                    <table>
                        <tr>
                            <th>Hari</th>
                            <th></th>
                            <th>buka</th>
                            <th></th>
                            <th>tutup</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>Senin</td>
                            <td> : </td>
                            <td><input value="{{ $jadwal->senin_buka }}" type="time" name="senin_buka"></td>
                            <td> -</td>
                            <td><input type="time" value="{{ $jadwal->senin_tutup }}" name="senin_tutup">
                            </td>
                            <td>
                                @if (!isset($jadwal->senin_buka))
                                    Libur
                                @else
                                    Buka
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Selasa</td>
                            <td> : </td>
                            <td><input type="time" value="{{ $jadwal->selasa_buka }}" name="selasa_buka"></td>
                            <td> -</td>
                            <td>
                                <input type="time" value="{{ $jadwal->selasa_tutup }}" name="selasa_tutup">
                            </td>
                            <td>
                                @if (!isset($jadwal->selasa_buka))
                                    Libur
                                @else
                                    Buka
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Rabu</td>
                            <td> : </td>
                            <td><input type="time" value="{{ $jadwal->rabu_buka }}" name="rabu_buka">
                            </td>
                            <td> -</td>
                            <td><input type="time" value="{{ $jadwal->rabu_tutup }}" name="rabu_tutup">
                            </td>
                            <td>
                                @if (!isset($jadwal->rabu_buka))
                                    Libur
                                @else
                                    Buka
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Kamis</td>
                            <td> : </td>
                            <td><input type="time" value="{{ $jadwal->kemis_buka }}" name="kemis_buka"></td>
                            <td> -</td>
                            <td><input type="time" value="{{ $jadwal->kemis_tutup }}" name="kemis_tutup">
                            </td>
                            <td>
                                @if (!isset($jadwal->kemis_buka))
                                    Libur
                                @else
                                    Buka
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Jumat</td>
                            <td> : </td>
                            <td><input type="time" value="{{ $jadwal->jumat_buka }}" name="jumat_buka"></td>
                            <td> -</td>
                            <td><input type="time" value="{{ $jadwal->jumat_tutup }}" name="jumat_tutup">
                            </td>
                            <td>
                                @if (!isset($jadwal->jumat_buka))
                                    Libur
                                @else
                                    Buka
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Sabtu</td>
                            <td> : </td>
                            <td><input type="time" value="{{ $jadwal->sabtu_buka }}" name="sabtu_buka"></td>
                            <td> -</td>
                            <td><input type="time" value="{{ $jadwal->sabtu_tutup }}" name="sabtu_tutup">
                            </td>
                            <td>
                                @if (!isset($jadwal->sabtu_buka))
                                    Libur
                                @else
                                    Buka
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Minggu</td>
                            <td> : </td>
                            <td><input type="time" value="{{ $jadwal->minggu_buka }}" name="minggu_buka"></td>
                            <td> -</td>
                            <td><input type="time" value="{{ $jadwal->minggu_tutup }}" name="minggu_tutup">
                            </td>
                            <td>
                                @if (!isset($jadwal->minggu_buka))
                                    Libur
                                @else
                                    Buka
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Opsi</td>
                            <td>:</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group"
                                    aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" id="btnradio1" autocomplete="off"
                                        {{ $jadwal->opsi === 'buka' ? 'checked' : '' }} name="opsi" value="buka">
                                    <label class="btn btn-outline-success" for="btnradio1">Buka</label>

                                    <input type="radio" class="btn-check" id="btnradio2" autocomplete="off"
                                        {{ $jadwal->opsi === 'tutup' ? 'checked' : '' }} name="opsi" value="tutup">
                                    <label class="btn btn-outline-danger" for="btnradio2">Tutup</label>

                                </div>
                            </td>
                        </tr>

                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
