<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#3c7984" />
    <meta name="msapplication-navbutton-color" content="#3c7984" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#3c7984" />
    <link rel="icon" type="image/png" href="{{url('/images/logo/LOGO.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FlossPrint - Register</title>

    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/fontawesome/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/dist/css/regist.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('/sweetalert/dist/sweetalert2.min.css') }}">
    <script src="{{ url('/sweetalert/dist/sweetalert2.min.js') }}"></script>
</head>

<body>

    <div class="box-regist">
        <div class="row no-gutters">
            <div class="col-12">
                <h2 class="text-dark mb-1">REGISTER</h2>
                <p class="mb-1">Selamat datang diform pendaftaran</p>
                <hr class="soft">
            </div>
            <div class="col-12">
                <form action="/registerpost" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="nmDepan" class="form-control rounded-pill px-3" placeholder="Nama Depan" required maxlength="" minlength="" value="{{ old('nmDepan') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="nmBelakang" class="form-control rounded-pill px-3" placeholder="Nama Belakang" required maxlength="" minlength="" value="{{ old('nmBelakang') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="Email" name="email" class="form-control rounded-pill px-3" placeholder="Email" required maxlength="255" minlength="" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control rounded-pill px-3 @error('password') is-invalid @enderror" placeholder="Password" required maxlength="255" minlength="8">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control rounded-pill px-3 @error('password') is-invalid @enderror" placeholder="Re Password" required maxlength="255" minlength="8">
                    </div>
                    <div class="form-group">
                        <button name="submit" class="btn btn-primary form-control rounded-pill">Register</button>
                    </div>
                </form>
            </div>
            <div class="col-12 mt-2">
                <hr class="soft">
                <div class="d-block text-center text-secondary">
                    <small class="d-block">Sudah Punya Akun Login disini</small>
                    <a href="/login">LOGIN</a>
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
            text: 'Password dan re-password tidak sama, ulangi!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    @enderror

    @error('email')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            title: 'Email anda sudah aktif silahkan login',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    @enderror

    @if(Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'success',
            text: '{{ Session::get("success") }}',
            showConfirmButton: true,
        })
    </script>
    @elseif(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get("error") }}',
            showConfirmButton: true,
        })
    </script>
    @endif
    
</body>

</html>