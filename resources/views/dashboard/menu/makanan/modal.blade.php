<!-- Modal -->
<div class="modal fade" id="deskripsiMakanan{{ $makanan->id }}" tabindex="-1" aria-labelledby="deskripsiMakanan{{ $makanan->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 fw-bold" id="deskripsiMakanan{{ $makanan->id }}Label">{{ $makanan->nama_makanan }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Deskripsi : </h5>
        {!! $makanan->deskripsi !!}
      </div>
    </div>
  </div>
</div>