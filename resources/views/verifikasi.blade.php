<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#3c7984" />
    <meta name="msapplication-navbutton-color" content="#3c7984" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#3c7984" />
    <link rel="icon" type="image/png" href="{{url('/images/logo/LOGO.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FlossPrint - Login</title>

    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/fontawesome/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/dist/css/verifikasi.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('/sweetalert/dist/sweetalert2.min.css') }}">
    <script src="{{ url('/sweetalert/dist/sweetalert2.min.js') }}"></script>
</head>

<body>
    <div class="box-verif">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-dark t-white mb-0">Verifikasi</h2>
                    <p class="text-muted t-white">Aktifkan email kamu sekarang</p>
                    <hr class="soft">
                </div>
                <div class="col-12">
                    <form action="/verifikasi/checked" method="post">
                        @csrf
                        <div class="form-group text-center mt-3 mb-5 pb-3 pt-2">
                            <label for="ver" class="t-white">Masukan Kode</label>
                            <input type="text" id="ver" name="kode" class="ipt-verif form-control rounded-0 w-50 mx-auto">
                        </div>
                        <div class="form-group mb-4 pt-4">
                            <p class="m-0 text-muted t-white">Demi keamanan, flossprint ingin memastikan bahwa email anda active.</p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Verifikasi</button>
                        </div>
                        <div class="form-group mb-0 mt-4">
                            <div class="d-flex">
                                <small class="t-white">Belum Dapat? <a href="" class="link ml-auto">Kirim Ulang</a></small>
                                <small class="ml-auto mb-0">Berakhir dalam : 07:00</small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(Session::has('kodefails'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            title: '{{ Session::get("kodefails") }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
</body>

</html>