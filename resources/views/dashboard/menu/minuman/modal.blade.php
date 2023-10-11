<!-- Modal -->
<div class="modal fade" id="deskripsiMinuman{{ $minuman->id }}" tabindex="-1" aria-labelledby="deskripsiMinuman{{ $minuman->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deskripsiMinuman{{ $minuman->id }}Label">{{ $minuman->nama_minuman }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Deskripsi : </h5>
        {!! $minuman->deskripsi !!}
      </div>
    </div>
  </div>
</div>