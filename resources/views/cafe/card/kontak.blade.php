{{-- Crad Kontak --}}
<div class="card mt-2">
    <div class="card-body text-center ">
        <h4 class="text-main">Kontak</h4>

        <div class="col">
            <h2 class=" text-main">(<span class="text-decoration-underline">{{ $cafes->no_telepon }}</span>)</h2>

        </div>
        <div class="d-flex justify-content-center mt-3">
            {{-- item kontak --}}

            {{-- Whatsapp --}}
            @if (isset($cafes->whatsapp))
                <a target="_blank" href="https://api.whatsapp.com/send?phone=62{{ substr($cafes->whatsapp, 1) }}"
                    class="text-decoration-none
                    m-3 text-main text-center">
                    <i class="bi bi-whatsapp fs-3"></i>
                    <p> whatshapp</p>
                </a>
            @endif

            {{-- Facebook --}}
            @if (isset($cafes->facebook))
                <a target="_blank" href="{{ $cafes->facebook }}"
                    class="text-decoration-none m-3  text-main text-center">
                    <i class="bi bi-facebook fs-3"></i>
                    <p> Facebook</p>
                </a>
            @endif

            {{-- instagram --}}
            @if (isset($cafes->instagram))
                <a target="_blank" href="{{ $cafes->instagram }}"
                    class="text-decoration-none m-3  text-main text-center">
                    <i class="bi bi-instagram fs-3"></i>
                    <p>Instagram</p>
                </a>
            @endif

        </div>
    </div>
</div>
