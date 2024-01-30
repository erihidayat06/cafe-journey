  <div class="tab-pane fade show active" id="minuman" role="tabpanel" aria-labelledby="minuman-tab" tabindex="0">
      <div class="row row-cols-2 row-cols-md-4 g-4">
          @foreach ($minumans as $minuman)
              @if (isset($minuman->cafe_id))
                  <form action="/beli" method="POST">
                      @csrf
                      <div class="col">
                          <div class="card border-0 shadow-sm rounded-sm h-100">
                              <img src="{{ asset('storage/' . $minuman->gambar) }}" style="object-fit:cover;"
                                  width="100%" height="250px" class="card-img-top p-3 rounded-sm" alt="...">
                              <div class="card-body">
                                  <h6 class="card-title text-truncate">{{ $minuman->nama_minuman }}</h6>
                                  <p class="card-text fs-5">Rp {{ number_format("$minuman->harga", 0, ',', '.') }}</p>
                                  <p style="margin: 0px; font-size: 11px;">
                                      {{ count($beli->where('minum_id', $minuman->id)) }}x dipesan</p>
                                  {{-- <span class="card-text"><a href="" class="text-main" data-bs-toggle="modal"
                                          data-bs-target="#deskripsiMinuman{{ $minuman->id }}"><small>Detail</small></a></span> --}}
                                  @include('cafe.modal.modalMinum')
                              </div>
                              @auth
                                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                              @endauth
                              <input type="hidden" name="cafe_id" value="{{ $cafe->id }}">
                              <input type="hidden" name="pemilik" value="{{ $cafe->user->id }}">
                              <input type="hidden" name="minum_id" value="{{ $minuman->id }}">
                              @auth
                                  <div class="card-footer mb-2 text-left">
                                      {{-- Detail Button --}}
                                      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                                          data-bs-target="#deskripsiMinuman{{ $minuman->id }}">
                                          <i class="bi bi-info-circle"></i> Detail
                                      </button>

                                      {{-- Beli Button --}}
                                      <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
                                          data-bs-target="#beliMinum{{ $minuman->id }}">
                                          <i class="bi bi-bag-plus"></i> Beli
                                      </button>
                                  </div>
                                  @include('cafe.modal.modalBeliMinum')
                              @else
                                  <div class="card-footer text-center">
                                      <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                          data-bs-target="#login">
                                          Beli
                                      </button>
                                  </div>
                                  @include('login.modalLogin')
                              @endauth
                          </div>
                      </div>
                  </form>
              @endif
          @endforeach

          @if (count($minumans) <= 0)
              <div class="row mt-5 text-center">
                  <p class="text-main">KOSONGGGG !!!!</p>
              </div>
          @endif
      </div>
  </div>
