<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#3c7984" />
    <meta name="msapplication-navbutton-color" content="#3c7984" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#3c7984" />
    <link rel="icon" type="image/png" href="{{url('/images/logo/LOGO.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FlossPrint - Lupa password</title>

    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/fontawesome/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/dist/css/login.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('/sweetalert/dist/sweetalert2.min.css') }}">
    <script src="{{ url('/sweetalert/dist/sweetalert2.min.js') }}"></script>
</head>

<body>

    <div class="box-login">
        <div class="content">
            <div class="row">
                <div class="col-12 py-3 py-sm-0 py-md-0 py-lg-0">
                    <h2 class="text-dark mb-1">Ubah Password</h2>
                    <p class="text-secondary">Selamat datang di form Ubah Password</p>
                    <hr class="soft">
                </div>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <strong>Password!</strong>
                        <p class="m-0">Simpan password anda dengan baik, pastikan akun anda tetap aman.</p>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <form action="/ubahpassword" method="POST">
                        @csrf
                        <input type="hidden" name="vkey" value="{{ $key }}">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control rounded-pill px-3 @error('password') is-invalid @enderror" placeholder="Password" required maxlength="255" minlength="8">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control rounded-pill px-3 @error('password') is-invalid @enderror" placeholder="Re Password" required maxlength="255" minlength="8">
                        </div>
                        <div class="form-group">
                            <button name="submit" class="btn btn-primary form-control rounded-pill">PROSES</button>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-5">
                            <hr class="soft">
                        </div>
                        <div class="col-2"><small class="d-block text-center mt-1">OR</small></div>
                        <div class="col-5">
                            <hr class="soft">
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="row">
                        <div class="col-6">
                            <a href="/login" class="btn btn-primary btn-block rounded-pill">
                                <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="/register" class="btn btn-primary btn-block rounded-pill">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Register
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="soft mb-1">
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ url('/dist/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/myscript.js') }}"></script>

    @error('password')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Password tidak sama, ulangi!',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @enderror
</body>

</html>