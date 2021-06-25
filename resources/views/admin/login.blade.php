<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#3c7984" />
    <meta name="msapplication-navbutton-color" content="#3c7984" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#3c7984" />
    <link rel="icon" type="image/png" href="{{url('/images/logo/LOGO.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/fontawesome/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/dist/css/login.css') }}">
</head>

<body>

    <div class="box-login">
        <div class="content">
            <div class="row">
                <div class="col-12 py-3 py-sm-0 py-md-0 py-lg-0">
                    <h2 class="text-dark mb-1">LoginForm</h2>
                    <p class="text-secondary">Wellcome In Admins Login</p>
                    <hr class="soft">
                </div>
                <div class="col-12 mt-2">
                    <form action="/admin/loginpost" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control rounded-pill px-3 @error('email') is-invalid @enderror" placeholder="Email" maxlength="100" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control rounded-pill px-3 @error('password') is-invalid @enderror" placeholder="Password" maxlength="255" minlength="8" required>
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
                <div class="col-12 mt-2">
                    <hr class="soft">
                    <div class="d-block text-center text-secondary">
                        <small>Get Password Account <br>
                            <a href="/register">Get Password</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ url('/dist/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/myscript.js') }}"></script>
    @if(Session::has('email'))
    <div class="modal animated bounceIn" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="py-3 text-center">
                    <i class="fa fa-exclamation-circle text-danger fa-4x mx-auto" aria-hidden="true"></i>
                </div>
                <div class="modal-body text-center">
                    <h4 class="text-dark">Opps...</h4>
                    <h4 class="text-danger">{{Session::get('email')}}</h4>
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
    @elseif(Session::has('password'))
    <div class="modal animated bounceIn" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="py-3 text-center">
                    <i class="fa fa-exclamation-circle text-warning fa-4x mx-auto" aria-hidden="true"></i>
                </div>
                <div class="modal-body text-center">
                    <h4 class="text-dark">Opps...</h4>
                    <h4 class="text-danger">{{Session::get('password')}}</h4>
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
    @endif
</body>

</html>