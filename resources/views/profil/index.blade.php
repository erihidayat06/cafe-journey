@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="card rounded-sm shadow-sm border-0 p-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card rounded-sm mb-3">
                            <h4 class="mx-4 mt-4">Profil Kamu</h4>
                            <hr>
                            <div class="card-body">
                                {{-- Avatar --}}
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=0D8ABC&color=fff"
                                    class="rounded-circle img-thumbnail" alt="...">
                                <br><br>
                                <h5 class="card-title">{{ auth()->user()->name }}</h5>
                                <p class="card-text">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem aliquam nostrum iure. Deleniti molestias architecto quis dolorum reprehenderit. A consectetur rem eos illo ratione tenetur laboriosam fugiat. Eos culpa assumenda quia inventore tenetur sequi molestiae voluptas numquam veniam, fuga tempore quo sed. Assumenda dolorem nihil illo iste reprehenderit dicta animi.
                                </p>
                                <div class="contact-buttons">
                                    <a href="#" class="btn active-button" style="background-color:#25d366 !important;">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                    <a href="#" class="btn active-button" style="background-color:#128c7e !important;">
                                        <i class="bi bi-telephone"></i>
                                    </a>
                                    <a href="#" class="btn active-button">
                                        <i class="bi bi-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card rounded-sm">
                            <h4 class="mx-4 mt-4">Ubah Data Profil</h4>
                            <hr>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" action="/profil/{{ auth()->user()->id }}" method="POST"
                                    novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Nama Kamu</label>
                                        <input type="text" name="name" class="form-control" id="yourName"
                                            value="{{ auth()->user()->name }}" required>
                                        <div class="invalid-feedback">Please, enter Nama Kamu!</div>
                                    </div>
            
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email Kamu</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail"
                                            value="{{ auth()->user()->email }}" disabled>
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>
            
                                    <div class="col-12">
                                        <label for="yournomor" class="form-label">Nomor Hp</label>
                                        <input type="text" name="no_telepon" class="form-control" id="yournomor"
                                            value="{{ auth()->user()->no_telepon }}" required>
                                        <div class="invalid-feedback">Please enter a valid nomor adddress!</div>
                                    </div>
            
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <div id="liveAlertPlaceholder"></div>
                                        <a href="#" id="liveAlertBtn">
                                            <div>
                                                Ubah Password
                                            </div>
                                        </a>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
            
                                    <div class="col-12">
                                        <button class="btn active-button w-100" type="submit">Simpan</button>
                                    </div>
            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
        }

        const alertTrigger = document.getElementById('liveAlertBtn')
        if (alertTrigger) {
            alertTrigger.addEventListener('click', () => {
                appendAlert('Silahkan Login untuk Merubah Password!', 'danger')
            })
        }
    </script>
@endsection
