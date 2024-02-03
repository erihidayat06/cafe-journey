<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Register - {{ config('app.name') }}
    </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito&display=swap">

    <style>
        * {
            padding: 0;
            margin: 0;
            outline: none;
        }

        body {
            font-family: 'Nunito', sans-serif !important;
            height: 100vh;
            color: #3a3e42 !important;
        }

        .AppForm {
            border-radius: 20px !important;
        }

        .AppForm .AppFormRight {
            border-radius: 20px !important;
        }

        .AppForm .AppFormLeft h1 {
            font-family: 'Nunito';
            font-weight: 700;
            font-size: 35px;
            margin-bottom: 20px;
        }

        .AppForm .AppFormLeft input:focus {
            border-color: #ced4da;
        }

        .AppForm .AppFormLeft input::placeholder {
            font-size: 15px;
        }

        .AppForm .AppFormLeft i {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .AppForm .AppFormLeft a {
            color: #3a3e42;
        }

        .AppForm .AppFormLeft button {
            background: linear-gradient(45deg, #610105, #a85655);
            border-radius: 30px;
        }

        .AppForm .AppFormLeft p span {
            color: #007bff;
        }

        .AppForm .AppFormRight {
            background-image: url('https://img.freepik.com/free-vector/coffee-cup-floating-with-bean-cartoon-vector-icon-illustration-drink-food-icon-concept-isolated_138676-8608.jpg?w=740&t=st=1706499219~exp=1706499819~hmac=d7be5faae72fcb6fa0f71b638b420702f9767f94e95e96a022d1df375d6f82b2');
            height: 100% !important;
            width: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .AppForm .AppFormRight:after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            /* background: linear-gradient(45deg, #8D334C, #CF6964); */
            border-radius: 0px 15px 15px 0px !important;
        }

        .AppForm .AppFormRight h2 {
            z-index: 1;
        }

        .AppForm .AppFormRight h2::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: #fff;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .AppForm .AppFormRight p {
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <form class="col-md-9" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="AppForm shadow-lg">
                    <div class="row">

                        {{-- ALert --}}
                        @if (session('status'))
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('status') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        @endif

                        <div class="col-md-6 d-flex justify-content-center align-items-center p-5">
                            <div class="AppFormLeft">
                                <h1>Registrasi</h1>
                                
                                <div class="form-group position-relative mb-4">
                                    <input type="text"
                                        class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none"
                                        id="Name" placeholder="Nama Lengkap" name="name">
                                    <i class="fa fa-user-o"></i>
                                </div>

                                <div class="form-group position-relative mb-4">
                                    <input type="text"
                                        class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none"
                                        id="no_telepon" placeholder="No Telepon" name="no_telepon">
                                    <i class="fa fa-phone"></i>
                                </div>

                                <div class="form-group position-relative mb-4">
                                    <input type="email"
                                        class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none"
                                        id="email" placeholder="Email" name="email">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group position-relative mb-4">
                                            <input type="password"
                                                class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none"
                                                id="password" placeholder="Kata Sandi" name="password">
                                            <i class="fa fa-key"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group position-relative mb-4">
                                            {{-- Paddowrd_confirmation --}}
                                            <input type="password"
                                                class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none"
                                                id="password_confirmation" placeholder="Ulang Kata Sandi" name="password_confirmation">
                                            <i class="fa fa-key"></i>
        
                                            @if ($errors->has('password_confirmation'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
        
                                        </div>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="btn btn-success btn-block shadow border-0 py-2 text-uppercase">
                                    Daftar
                                </button>

                                <p class="text-center mt-5">
                                    Sudah punya akun?
                                    <span>
                                        <a class="text-danger fw-bold" href="{{ route('login') }}">Masuk Disini</a>
                                    </span>
                                </p>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div
                                class="AppFormRight position-relative d-flex justify-content-center flex-column align-items-center text-center p-5 text-white">
                                {{-- <h2 class="position-relative px-4 pb-3 mb-4">
                                    Cafe Journey
                                </h2>
                                <p>
                                    Welcome to Cafe Journey. Please login with your personal info and enjoy the journey.
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </footer>
</body>

</html>
