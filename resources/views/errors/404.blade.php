
<!doctype html>
<html lang="en">

<head>
    @yield('title')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Untuk Chrome & Opera, Windows Phone, Safari iOS dan Logo -->
    <meta name="theme-color" content="#3c7984" />
    <meta name="msapplication-navbutton-color" content="#3c7984" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#3c7984" />
    <link rel="icon" type="image/png" href="{{url('/images/logo/LOGO.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <!-- icon framework -->
    <link rel="stylesheet" href="{{ url('/fontawesome/css/all.css') }}">
    <!-- font text stylers -->
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&family=Open+Sans:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/dist/css/error.css') }}">
</head>
<body>

    <div class="content">
        <div class="d-block text-center">
            <h2 class="text-large text-secondary text-style">404</h2>
            <h1 class="text-uppercase text-secondary text-style">HALAMAN TIDAK DITEMUKAN</h1>
        </div>
        <div class="d-block text-center">
            <hr class="soft w-50 shadow">
            <a href="/home" class="text-project text-warning">Floss<span class="text-project text-secondary">Print</span></a>
        </div>
    </div>



    <script type="text/javascript" src="{{ url('/dist/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>

</body>

</html>