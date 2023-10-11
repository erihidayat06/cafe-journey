@extends('login.layouts.main')

@section('container')
    <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">

                        <div class="card-body">

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
                                    <button class="btn btn-primary w-100" type="submit">Simpan</button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

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
