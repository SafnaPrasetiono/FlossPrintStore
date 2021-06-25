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
                    <h2 class="text-dark mb-1">LOGIN</h2>
                    <p class="text-secondary">Selamat datang di login flossprint</p>
                    <hr class="soft">
                </div>
                <div class="col-12 mt-2">
                    <form action="/loginpost" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control rounded-pill px-3 @error('email') is-invalid @enderror" placeholder="Your Email" maxlength="100" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control rounded-pill px-3 @error('password') is-invalid @enderror" placeholder="Your Password" maxlength="255" minlength="8" required>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group form-check px-4 mb-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        </div>
                        <div class="form-group mt-4">
                            <button name="submit" class="btn btn-primary form-control rounded-pill">Login</button>
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
                            <a href="/lupa-password" class="btn btn-primary btn-block rounded-pill">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Lupa Password?
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

    <!-- @if(Session::has('email'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get("email") }}',
        });
    </script>
    @elseif(Session::has('password'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{Session::get('password')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif -->

    <script type="text/javascript" src="{{ url('/dist/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/myscript.js') }}"></script>

    @if(session()->has('email'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session()->get("email") }}',
            showConfirmButton: true,
        })
    </script>
    @elseif(session()->has('password'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session()->get("password") }}',
            showConfirmButton: true,
        })
    </script>
    @elseif(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'success',
            text: '{{ session()->get("success") }}',
            showConfirmButton: true,
        })
    </script>
    @elseif(session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session()->get("error") }}',
            showConfirmButton: true,
        })
    </script>
    @endif
    
</body>

</html>