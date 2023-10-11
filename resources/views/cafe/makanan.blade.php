  <div class="tab-pane fade show active" id="makanan" role="tabpanel" aria-labelledby="makanan-tab" tabindex="0">
      <div class="row row-cols-2 row-cols-md-6 g-4">
          @foreach ($makanans as $makanan)
              <form action="/beli" method="post">
                  @csrf
                  <div class="col">
                      <div class="card h-100">
                          <img src="{{ asset('storage/' . $makanan->gambar) }}" style="object-fit:contain;padding:5px"
                              width="150px" height="150px" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h6 class="card-title text-truncate">{{ $makanan->nama_makanan }}</h6>
                              <p class="card-text fs-5">Rp {{ number_format("$makanan->harga", 0, ',', '.') }}</p>
                              <p style="margin: 0px; font-size: 11px;">
                                  {{ count($beli->where('makanan_id', $makanan->id)) }}x dipesan</p>
                              <span class="card-text"><a href="" class="text-main" data-bs-toggle="modal"
                                      data-bs-target="#deskripsiMakanan{{ $makanan->id }}"><small>Detail</small></a></span>
                              @include('cafe.modal.modalMakanan')
                          </div>
                          @auth
                              <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                          @endauth
                          <input type="hidden" name="cafe_id" value="{{ $cafe->id }}">
                          <input type="hidden" name="pemilik" value="{{ $cafe->user->id }}">
                          <input type="hidden" name="makanan_id" value="{{ $makanan->id }}">
                          @auth
                              <div class="card-footer text-center">
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                      data-bs-target="#beli{{ $makanan->id }}">
                                      Beli
                                  </button>
                              </div>
                              @include('cafe.modal.modalBeli')
                          @else
                              <div class="card-footer text-center">
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                      data-bs-target="#login2">
                                      Beli
                                  </button>
                              </div>
                              @include('login.modalLogin2')
                          @endauth

                      </div>
                  </div>
              </form>
          @endforeach

          @if (count($makanans) <= 0)
              <div class="row mt-5 text-center">
                  <p class="text-main">KOSONGGGG !!!!</p>
              </div>
          @endif
      </div>
  </div>
