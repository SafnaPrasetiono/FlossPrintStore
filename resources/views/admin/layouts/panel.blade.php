<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#3c7984" />
    <meta name="msapplication-navbutton-color" content="#3c7984" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#3c7984" />
    <link rel="icon" type="image/png" href="{{url('/images/logo/LOGO.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('title')
    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/fontawesome/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/dist/css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/css/admin.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('/sweetalert/dist/sweetalert2.min.css') }}">
    <script src="{{ url('/sweetalert/dist/sweetalert2.min.js') }}"></script>
    @livewireStyles
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-sm navbar-dark py-1 shadow">
            <div class="container-fluid">
                <div class="navbar-head d-lg-none">
                    <button class="btn btn-slidered pt-0 pb-1 pl-0 pr-2" id="btn-slider" type="button">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <a class="navbar-brand text-warning" href="#">Floss<span class="nb-font text-white">Print</span></a>
                </div>
                <ul class="nav accordion ml-auto mt-0 mt-lg-0" id="acr">
                    <li class="nav-item">
                        <a class="nav-link text-white px-2 px-md-3 px-lg-3" href="#" data-target="#dropdownId1" data-toggle="collapse">
                            <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                            @if(session('message'))
                            <span class="notif-badge mt-1">{{ count(session('message')) }}</span>
                            @endif
                        </a>
                        <div class="collapse menu-panel animated bounceIn" id="dropdownId1" data-parent="#acr">
                            <div class="bg-success px-2 py-1">
                                <h6 class="text-white m-0">Messages</h6>
                            </div>
                            @if(session('message'))
                            @foreach(session('message') as $msge)
                            <a href="/admin/message/{{$msge['id_ulasan']}}" class="media linking">
                                <div class="d-flex py-2 pl-2" href="#">
                                    <img src="{{ url('/images/user/' . $msge['foto']) }}" alt="user" class="rounded-circle mt-1" height="32px" width="32px">
                                </div>
                                <div class="media-body text-dark overflow-hidden text-truncate py-2 ml-2" style="line-height: 18px;">
                                    <p class="m-0">{{ $msge['nama_lengkap'] }}</p>
                                    <small class="m-0">{{ $msge['tanggapan'] }}</small>
                                </div>
                                <i class="fa fa-reply position-relative mx-2 py-2 float-right text-primary" aria-hidden="true"></i>
                            </a>
                            @endforeach
                            @else
                            <div class="media linking">
                                <div class="d-block w-100 text-center text-success p-3">
                                    <i class="fa fa-envelope fa-2x mb-1" aria-hidden="true"></i>
                                    <h4 class="m-2">Tidak Ada Pesan</h4>
                                </div>
                            </div>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item dropleft">
                        <a class="nav-link text-white px-2 px-md-3 px-lg-3" href="#" data-target="#dropdownId2" data-toggle="collapse">
                            <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
                            <!-- koding notif -->
                            @if(session('notif'))
                            <span class="notif-badge">{{ count(session('notif')) }}</span>
                            @endif
                            <!-- end notif -->
                        </a>
                        <div class="collapse menu-panel animated bounceIn" id="dropdownId2" data-parent="#acr">
                            <div class="bg-danger px-2 py-1">
                                <h6 class="text-white m-0">Notify</h6>
                            </div>
                            @if(session('notif'))
                            @foreach(session('notif') as $pbl)
                            <a href="/admin/pemesanan/pelanggan/detail/{{ $pbl['id_pembelian'] }}" class="media linking">
                                <div class="d-flex py-2 pl-2" href="#">
                                    <div class="notify-info bg-success rounded-circle px-0">
                                        @if($pbl['tipe'] === 'pemesanan-sablon')
                                        <i class="fa fa-paint-brush fa-lg" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-shopping-bag fa-lg" aria-hidden="true"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="media-body text-dark overflow-hidden text-truncate py-2 mx-2" style="line-height: 18px;">
                                    <p class="m-0">{{ $pbl['tipe'] }}</p>
                                    <small class="m-0">{{ $pbl['nama_lengkap'] }}, {{ $pbl['status'] }}, {{ $pbl['harga'] }}</small>
                                </div>
                            </a>
                            @endforeach
                            @else
                            <div class="media linking">
                                <div class="d-block text-center text-danger p-3">
                                    <i class="fa fa-bell fa-2x mb-1" aria-hidden="true"></i>
                                    <h4 class="mb-2">Tidak Ada Pemberitahuan</h4>
                                </div>
                            </div>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item py-0 dropleft">
                        <a class="nav-link pl-2 pr-0 px-md-3 px-lg-3 py-1" href="#" data-target="#navbarDropdown" role="button" data-toggle="collapse">
                            <img src="{{ url('/images/admin/', auth('admin')->user()->foto) }}" alt="user" class="rounded-circle" width="32px">
                        </a>
                        <div class="collapse menu-profile animated bounceIn" id="navbarDropdown" data-parent="#acr">
                            <a class="dropdown-item" href="/admin/profile/">
                                <i class="fa fa-user box-icon" aria-hidden="true"></i> Profile
                            </a>
                            <a class="dropdown-item" href="/admin/logout">
                                <i class="fa fa-sign-out box-icon" aria-hidden="true"></i> LogOut
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="slider" id="slider-panel">
            <div class="slider-brand">
                <div class="text-center">
                    <h4 class="text-warning">Floss<span class="text-white">Print</span></h4>
                </div>
            </div>
            <div class="navigations d-block overflow-hidden px-2">
                <ul class="nav flex-column d-block accordion" id="expAccor">
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a class="nav-link linking px-1 py-0" href="#" type="button" data-toggle="collapse" data-target="#collapse2">
                            <div class="media px-2 overflow-hidden">
                                <img src="{{ url('/images/admin/', auth('admin')->user()->foto) }}" class="img-profile rounded-circle mt-2 shadow" alt="fotoAdmin" height="35px" width="35px">
                                <div class="media-body overflow-hidden text-truncate py-1 ml-2">
                                    <h5 class="mt-1 mb-0 text-white text-capitalize text-truncate font-weight-bold" style="font-size: 16px;">{{ auth('admin')->user()->nama_lengkap }}</h5>
                                    <small class="m-0 text-white d-inline-block text-truncate w-100">{{ auth('admin')->user()->email }}</small>
                                </div>
                            </div>
                        </a>
                        <div id="collapse2" class="collapse" data-parent="#expAccor">
                            <a class="nav-link linking pl-4" href="/admin/profile">
                                <i class="fa fa-dot-circle-o box-icon" aria-hidden="true"></i>Profile
                            </a>
                            <a class="nav-link linking pl-4" href="#">
                                <i class="fa fa-dot-circle-o box-icon" aria-hidden="true"></i>Setting
                            </a>
                        </div>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link linking">
                            <i class="fa fa-tachometer fa-lg box-icon pt-0" aria-hidden="true"></i>Dashboard
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a class="nav-link linking" href="#" type="button" data-toggle="collapse" data-target="#collapse3">
                            <i class="fa fa-dropbox fa-lg box-icon" aria-hidden="true"></i>Produk
                        </a>
                        <div id="collapse3" class="collapse" data-parent="#expAccor">
                            <a class="nav-link linking pl-4" href="/admin/produk/tambah">
                                <i class="fa fa-dot-circle-o box-icon" aria-hidden="true"></i>Tambah
                            </a>
                            <a class="nav-link linking pl-4" href="/admin/produk/data">
                                <i class="fa fa-dot-circle-o box-icon" aria-hidden="true"></i>Data Produk
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/bank" class="nav-link linking">
                            <i class="fa fa-credit-card box-icon" aria-hidden="true"></i> Bank
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a class="nav-link linking" href="/admin/pemesanan">
                            <i class="fa fa-shopping-cart fa-lg box-icon" aria-hidden="true"></i> Pemesanan
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a class="nav-link linking" href="/admin/pelanggan/">
                            <i class="fa fa-users fa-lg box-icon" aria-hidden="true"></i>Pelanggan
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a class="nav-link linking" href="/admin/message">
                            <i class="fa fa-tags box-icon" aria-hidden="true"></i>Ulasan
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="/admin/laporan" class="nav-link linking">
                            <i class="fa fa-file-text box-icon" aria-hidden="true"></i> Laporan
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="/admin/logout" class="nav-link linking">
                            <i class="fa fa-sign-out fa-lg box-icon" aria-hidden="true"></i>LogOut
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <main class="content">
            @yield('content')
        </main>
    </div>


    <div class="slider-background" id="slider-back"></div>
    <script type="text/javascript" src="{{ url('/dist/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/admin.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/form-upload.js') }}"></script>
    @livewireScripts

    @if(Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get("success") }}',
            showConfirmButton: true,
        })
    </script>
    @elseif(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get("error") }}',
            showConfirmButton: true,
        })
    </script>
    @endif
</body>

</html>