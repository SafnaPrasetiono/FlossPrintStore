<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#3c7984" />
    <meta name="msapplication-navbutton-color" content="#3c7984" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#3c7984" />
    <link rel="icon" type="image/png" href="{{url('/images/logo/LOGO.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Register</title>

    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/fontawesome/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/dist/css/regist.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/css/animate.css') }}">
</head>

<body>

    <div class="box-regist">
        <div class="row no-gutters">
            <div class="col-12">
                <h2 class="text-dark mb-1">REGISTER ADMINS</h2>
                <p class="mb-1">wellcome in register form</p>
                <hr class="soft">
            </div>
            <div class="col-12">
                <form action="/admin/registerpost" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="nmDepan" class="form-control rounded-pill px-3" placeholder="Front name" required maxlength="" minlength="" value="{{ old('nmDepan') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="nmBelakang" class="form-control rounded-pill px-3" placeholder="Last Name" required maxlength="" minlength="" value="{{ old('nmBelakang') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="Email" name="email" class="form-control rounded-pill px-3" placeholder="Email" required maxlength="255" minlength="" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control rounded-pill px-3 @error('password') is-invalid @enderror" placeholder="Password" required maxlength="255" minlength="8" value="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control rounded-pill px-3 @error('password') is-invalid @enderror" placeholder="Re Password" required maxlength="255" minlength="8" value="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control rounded-pill">Register</button>
                    </div>
                </form>
            </div>
            <div class="col-12 mt-2">
                <hr class="soft">
                <div class="d-block text-center text-secondary">
                    <small>Your Have Account Click Blow <br>
                        <a href="/login">LOGIN</a>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ url('/dist/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/myscript.js') }}"></script>

    @error('password')
    <div class="modal animated bounceIn" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="py-3 text-center">
                    <i class="fa fa-exclamation-circle text-danger fa-4x mx-auto" aria-hidden="true"></i>
                </div>
                <div class="modal-body text-center">
                    <h4 class="text-dark">Opps...</h4>
                    <h4 class="text-danger">Password dan Repassword tidak sama!</h4>
                </div>
                <div class="py-3 text-center">
                    <button type="button" class="btn btn-primary py-2 px-5 mx-auto" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#myModal').modal('show')
    </script>
    @enderror
</body>

</html>