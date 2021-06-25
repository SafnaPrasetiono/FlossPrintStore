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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico&display=swap" rel="stylesheet">
    <!-- animated css stylers -->
    <link rel="stylesheet" href="{{ url('/dist/css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/css/style.css') }}">

    <!-- messages -->
    <link rel="stylesheet" href="{{ url('/sweetalert/dist/sweetalert2.min.css') }}">
    <script src="{{ url('/sweetalert/dist/sweetalert2.min.js') }}"></script>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark accordion" id="nav-accordions">
        <div class="container">
            <div class="navbar-head w-100">
                <nav class="nav">
                    <a class="navbar-brand nav-link px-0" href="/home">
                        <span class="nb2 text-warning">Floss</span>Print
                    </a>
                    <a href="#" class="nav-link text-white px-2 ml-auto d-block d-md-none d-lg none" type="button" data-toggle="collapse" data-target="#shopping-xs-slide">
                        <i class="fa fa-shopping-cart fa-lg pt-2" aria-hidden="true"></i>
                        @if(session('cart'))
                        <span class="shopping-add">{{ count(session('cart'))}}</span>
                        @elseif(session('sablon'))
                        <span class="shopping-add">1</span>
                        @elseif(session('cartsablon'))
                        <span class="shopping-add">1</span>
                        @endif
                    </a>
                    <!-- isi dari shopping cart mobile resposive -->
                    <div class="shopping-content-xs collapse animated fadeIn d-md-none d-ld-none" id="shopping-xs-slide" data-parent="#nav-accordions">
                        <div class="shopping-head">
                            <p class="mb-0 text-dark">
                                <i class="fa fa-shopping-cart text-danger mr-2" aria-hidden="true"></i>Shopping Cart
                            </p>
                            <hr class="soft my-2">
                        </div>
                        <div class="row no-gutters p-2">
                            @if(session('cart'))
                            @foreach(session('cart') as $cart)
                            <div class="col-12 mb-2">
                                <div class="row no-gutters">
                                    <div class="col-3">
                                        <img src="{{ url('/images/produk/display/' . $cart['fotoproduk']) }}" alt="" class="w-100 rounded">
                                    </div>
                                    <div class="col-9 px-2 py-1">
                                        <!-- penghapusan produk -->
                                        <a href="/produk/deleteorder/{{ $cart['idproduk'] }}" class="close text-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <h5 class="mb-0 text-truncate">{{ $cart['namaproduk'] }}</h5>
                                        <p class="mb-1">Ukuran <span class="ml-2 text-upercase font-weight-bold">{{ $cart['ukuranproduk'] }}</span>
                                        </p>
                                        <p class="mb-0">{{ $cart['qty'] }} x Rp. {{ number_format($cart['hargaproduk']) }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-12">
                                <hr class="soft my-2">
                                <div class="d-flex">
                                    <a href="/pemesanan/keranjang-belanja" class="btn btn-primary btn-sm ml-auto">Lihat Keranjang</a>
                                </div>
                            </div>
                            @elseif(session('sablon'))
                            <div class="col-12 mb-2">
                                <div class="media">
                                    <a href="/pemesanan/sablon" class="d-flex linking-notify w-100">
                                        <div class="rounded-circle bg-danger py-2 px-1 mr-2" style="width: 46px; height: 46px;">
                                            <i class="fa fa-paint-brush fa-2x text-white" aria-hidden="true"></i>
                                        </div>
                                        <div class="media-body text-dark overflow-hidden text-truncate py-1 ml-1" style="line-height: 18px;">
                                            <p class="m-0">Pemesanan Sablon</p>
                                            <small class="m-0">Proses Pemesanan sablon Anda</small>
                                        </div>
                                    </a>
                                    <a href="/pemesanan/sablon/hapus" class="btn btn-danger btn-small my-1">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            @elseif(session('cartsablon'))
                            <div class="col-12 mb-2">
                                <div class="media">
                                    <a href="/pemesanan/checkout" class="d-flex linking-notify w-100">
                                        <div class="rounded-circle bg-warning py-2 px-1 mr-2" style="width: 46px; height: 46px;">
                                            <i class="fa fa-paint-brush fa-2x text-white" aria-hidden="true"></i>
                                        </div>
                                        <div class="media-body text-dark overflow-hidden text-truncate py-1 ml-1" style="line-height: 18px;">
                                            <p class="m-0">Pemesanan Sablon</p>
                                            <small class="m-0">Checkout Pemesanan sablon Anda</small>
                                        </div>
                                    </a>
                                    <a href="/pemesanan/sablon/proses/batal" class="btn btn-danger btn-small my-1">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            @else
                            <div class="col-12">
                                <span class="d-block py-4 px-2 text-center text-muted border rounded-bottom">
                                    <i class="fa fa-shopping-cart fa-4x mb-4" aria-hidden="true"></i>
                                    <h4><b>Belum Ada Barang</b></h4>
                                    <h5><b>Keranjang Kosong</b></h5>
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <a class="nav-link text-white pl-3 pr-0 d-md-none d-lg-none" href="#" type="button" data-toggle="collapse" data-target="#collapsibleNavId">
                        <i class="fa fa-bars fa-lg pt-2" href="#"></i>
                    </a>
                </nav>
            </div>
            <div class="collapse navbar-collapse" id="collapsibleNavId" data-parent="#nav-accordions">
                <ul class="navbar-nav ml-auto pb-3 pb-md-1 mt-lg-1">
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/produk/desain">Desain</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/produk">Produk</a>
                    </li>
                    <li class="nav-item active d-none d-md-block d-lg-block">
                        <a class="nav-link px-3" href="#" type="button" data-toggle="collapse" data-target="#shopping-lg-slide">
                            <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                            @if(session('cart'))
                            <span class="shopping-add">{{ count(session('cart'))}}</span>
                            @elseif(session('sablon'))
                            <span class="shopping-add">1</span>
                            @elseif(session('cartsablon'))
                            <span class="shopping-add">1</span>
                            @endif
                        </a>
                        <!-- isi dari shopping cart tablet, laptop dan pc responsive -->
                        <div class="shopping-content-lg collapse" id="shopping-lg-slide" data-parent="#nav-accordions">
                            <span class="fa fa-caret-up fa-2x up-noted text-danger"></span>
                            <div class="shopping-head bg-danger rounded-top py-1 px-2">
                                <p class="mb-0 text-white">
                                    <i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i> Shopping Cart
                                </p>
                            </div>
                            <div class="row no-gutters p-2">
                                @if(session('cart'))
                                @foreach(session('cart') as $cart)
                                <div class="col-12 mb-2">
                                    <div class="row no-gutters">
                                        <div class="col-3">
                                            <img src="{{ url('/images/produk/display/' . $cart['fotoproduk']) }}" alt="" class="w-100 rounded">
                                        </div>
                                        <div class="col-9 px-2 py-1">
                                            <!-- penghapusan produk -->
                                            <a href="/produk/deleteorder/{{ $cart['idproduk'] }}" class="close text-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            <h5 class="mb-0 text-truncate">{{ $cart['namaproduk'] }}</h5>
                                            <p class="mb-1">Ukuran <span class="ml-2 text-upercase font-weight-bold">{{ $cart['ukuranproduk'] }}</span>
                                            </p>
                                            <p class="mb-0">{{ $cart['qty'] }} x Rp. {{ number_format($cart['hargaproduk']) }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-12">
                                    <hr class="soft my-2">
                                    <div class="d-flex">
                                        <a href="/pemesanan/keranjang-belanja" class="btn btn-primary btn-sm ml-auto">Lihat Keranjang</a>
                                    </div>
                                </div>
                                @elseif(session('sablon'))
                                <div class="col-12 mb-2">
                                    <div class="media">
                                        <a href="/pemesanan/sablon" class="d-flex linking-notify w-100">
                                            <div class="rounded-circle bg-danger py-2 px-1 mr-2" style="width: 46px; height: 46px;">
                                                <i class="fa fa-paint-brush fa-2x text-white" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body text-dark overflow-hidden text-truncate py-1 ml-1" style="line-height: 18px;">
                                                <p class="m-0">Pemesanan Sablon</p>
                                                <small class="m-0">Proses Pemesanan sablon Anda</small>
                                            </div>
                                        </a>
                                        <a href="/pemesanan/sablon/hapus" class="btn btn-danger btn-small my-1">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                @elseif(session('cartsablon'))
                                <div class="col-12 mb-2">
                                    <div class="media">
                                        <a href="/pemesanan/checkout" class="d-flex linking-notify w-100">
                                            <div class="rounded-circle bg-warning py-2 px-1 mr-2" style="width: 46px; height: 46px;">
                                                <i class="fa fa-paint-brush fa-2x text-white" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body text-dark overflow-hidden text-truncate py-1 ml-1" style="line-height: 18px;">
                                                <p class="m-0">Pemesanan Sablon</p>
                                                <small class="m-0">Checkout Pemesanan sablon Anda</small>
                                            </div>
                                        </a>
                                        <a href="/pemesanan/sablon/proses/batal" class="btn btn-danger btn-small my-1">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                @else
                                <div class="col-12">
                                    <span class="d-block py-4 px-2 text-center text-muted border rounded-bottom">
                                        <i class="fa fa-shopping-cart fa-4x mb-4" aria-hidden="true"></i>
                                        <h4><b>Belum Ada Barang</b></h4>
                                        <h5><b>Keranjang Kosong</b></h5>
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </li>
                    @auth("user")
                    <li class="nav-item active dropleft">
                        <a class="nav-link d-flex pb-0" style="padding-top: 4px;" href="#" id="ddUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ url('images/user/', auth('user')->user()->foto) }}" alt="fotouser" class="rounded-circle" width="32px" height="32px">
                            <p class="d-md-none d-lg-none ml-2 py-1 w-50">{{ auth('user')->user()->nama_lengkap }}</p>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="ddUser">
                            <a class="dropdown-item" href="/user/profile">Profile</a>
                            <a class="dropdown-item" href="/user/riwayat-belanja">Riwayat Belanja</a>
                            <a class="dropdown-item" href="/user/notifikasi">Notifikasi</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/user/logout">Logout</a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item active">
                        <a href="/register" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item d-md-none d-lg-none">
                        <a href="/login" class="nav-link text-warning">Login</a>
                    </li>
                    <li class="nav-item ml-3 mr-0 d-none d-md-block d-lg-block">
                        <a href="/login" class="btn border border-warning text-warning py-1 px-4 mt-1">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 pr-md-2 pr-lg-3 mb-3">
                    <h5 class="text-warning">Tentang FlossPrint</h5>
                    <p class="text-light">FlossPrint Studio merupakan toko konveksi yang menyediakan pelayanan dalam
                        pembuatan sablon baju. Pemesanan sablon baju sesuai dengan label yang dierikan oleh konsumen.
                        FlossPrint juga menjual berbagai macam pakain yang berkualitas dan unik.</p>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-3">
                    <h5 class="text-warning">FlossPrint</h5>
                    <ul class="nav flex-column">
                        <li class="nav nav-link px-0 py-1">
                            <a href="/home" class="nav-item text-light linking">Home</a>
                        </li>
                        <li class="nav nav-link px-0 py-1">
                            <a href="/carabelanja/" class="nav-item text-light linking">Cara Belanja</a>
                        </li>
                        <li class="nav nav-link px-0 py-1">
                            <a href="/syaratketentuan/" class="nav-item text-light linking">Syarat & Ketentuan</a>
                        </li>
                        <li class="nav nav-link px-0 py-1">
                            <a href="/tentangkami/" class="nav-item text-light linking">Tentang Kami</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-3 pl-1 overflow-hidden">
                    <h5 class="text-warning">Kontak</h5>
                    <ul class="nav flex-column">
                        <li class="nav nav-link px-0 py-1">
                            <a href="" class="nav-item text-light linking">
                                <i class="fa fa-whatsapp icon-size" aria-hidden="true"></i> 087889449334
                            </a>
                        </li>
                        <li class="nav nav-link px-0 py-1">
                            <a href="" class="nav-item text-light linking">
                                <i class="fa fa-envelope icon-size" aria-hidden="true"></i> info@flossprint.store
                            </a>
                        </li>
                        <li class="nav nav-link px-0 py-1">
                            <a href="" class="nav-item text-light linking">
                                <i class="fa fa-facebook icon-size" aria-hidden="true"></i> FlossPrint
                            </a>
                        </li>
                        <li class="nav nav-link px-0 py-1">
                            <a href="" class="nav-item text-light linking">
                                <i class="fa fa-instagram icon-size" aria-hidden="true"></i> FlossPrint
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="cc">
            <div class="container py-2">
                <div class="text-center">
                    <small class="text-white m-0">Made in Indonesia 2020 || by Safna Prasetiono</small>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="{{ url('/dist/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/jquery.mask.js') }}"></script>
    <script src="{{ url('/dist/js/jquery.mask.min.js') }}"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="{{ url('/dist/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/myscript.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/fotoupdate.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/fabric.js') }}"></script>
    <script src="{{ url('/canvas-master/js/canvas-to-blob.min.js') }}"></script>
    <script src="{{ url('/dist/js/htmlcanvas.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/desainer.js') }}"></script>
    <script src="{{ url('/dist/js/pemesanansablon.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Format mata uang.
            $('.IDR').mask('000.000.000', {
                reverse: true
            });
        })
    </script>

    @if(Session::has('deletekeranjang'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'success',
            text: '{{ Session::get("deletekeranjang") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif


    @if(Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'success',
            text: '{{ Session::get("success") }}',
            showConfirmButton: true,
        });
    </script>
    @elseif(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'error',
            text: '{{ Session::get("error") }}',
            showConfirmButton: true,
        });
    </script>
    @endif

</body>

</html>