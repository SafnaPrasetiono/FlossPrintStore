@extends('layout.panel')

@section('title')
<title>FlossPrint - Profile</title>
<link rel="stylesheet" href="{{ url('/dist/css/profile.css') }}">
@endsection

@section('content')
<?php $x = 0; ?>
@foreach($pembelian as $notify)
@if($notify->status != 'pending' and $notify->status != 'sudah-bayar')
<?php $x++; ?>
@endif
@endforeach

<div class="container py-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-5 col-lg-4 mb-4">
            <div class="d-block bg-white rounded shadow overflow-hidden">
                <div class="bg-light d-block py-4">
                    <form action="/user/profile/updatefoto" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="d-block">
                                <div class="box-foto mx-auto">
                                    <label for="file-input" class="btn-foto">
                                        <i class="fa fa-upload text-primary fa-2x" aria-hidden="true"></i>
                                    </label>
                                    <img src="{{ url('/images/user/' . auth('user')->user()->foto) }}" alt="user_photos" class="Responsive image rounded-circle mx-auto d-block" height="200px" width="200px" id="displayGambar">
                                </div>
                            </div>
                            <input type="file" name="fotouser" onchange="displayImageUP(this)" id="file-input">
                            <button type="submit" id="postpic" class="d-none mx-auto">Udate Foto</button>
                        </div>
                        <div class="form-group text-center mt-4 mb-4">
                            <h3 class="text-dark text-capitalize mb-0">{{ auth('user')->user()->nama_lengkap }}</h3>
                            <p class="m-0 text-dark">{{ auth('user')->user()->email }}</p>
                        </div>
                    </form>
                </div>
                <div class="bg-white d-block">
                    <div class="list-group list-group-flush">
                        <a href="/user/profile/" class="list-group-item list-group-item-action">PROFILE</a>
                        <a href="/user/riwayat-belanja/" class="list-group-item list-group-item-action">RIWAYAT BELANJA</a>
                        <a href="/user/notifikasi/" class="list-group-item list-group-item-action active">
                            NOTIFIKASI
                            <span class="badge badge-light badge-pill float-right"><?php echo $x; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-7 col-lg-8">
            <div class="d-block bg-white rounded shadow p-3">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-dark mb-1">Notifikasi</h3>
                        <hr class="soft">
                    </div>
                    <div class="col-12">
                        @foreach($pembelian as $pb)
                        @if($pb->status === "proses")
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-lg-3 text-center text-success bg-success d-block">
                                    <i class="fa fa-shopping-bag fa-4x icon-info" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card-body mr-2">
                                        <h5 class="card-title">Pemesanan Produk</h5>
                                        <p class="card-text mb-0">Pemesanan produk pada tanggal {{ date($pb->tanggal) }} telah di konfirmasi dan di <span class="text-danger">{{ $pb->status }}</span> cek berkala notifikasi untuk melihat status pemesanan anda.</p>
                                        <p class="card-text"><small class="text-muted">Lihat Detail Nota <a href="/user/pembelian/nota/{{ $pb->id_pembelian }}">di sini</a></small></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 35%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($pb->status === "proses-sablon")
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-lg-3 text-center text-success bg-success d-block">
                                    <i class="fa fa-paint-brush fa-4x icon-info" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card-body mr-2">
                                        <h5 class="card-title">Pemesanan Sablon</h5>
                                        <p class="card-text">Pemesanan sablon anda pada tanggal {{ date($pb->tanggal) }} sedang dalam pemrosesan, cek berkala notifikasi anda untuk melihat status pemesanan anda.</p>
                                        <p class="card-text"><small class="text-muted">Lihat Detail Nota <a href="/user/pembelian/nota/{{ $pb->id_pembelian }}">di sini</a></small></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 35%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($pb->status === "anjuran-bayar-lunas")
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-lg-3 text-center text-success bg-info d-block">
                                    <i class="fa fa-money fa-4x icon-info" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card-body mr-2">
                                        <h5 class="card-title">Pemesanan Sablon</h5>
                                        <p class="card-text">Pengerjaan proses sablon pakaian anda kini telah selesai kami kerjakan. Anda diwajibkan untuk membayara sisa tagihan pemesanan sablon anda untuk proses pengiriman sablon pakaian.</p>
                                        <p class="card-text"><small class="text-muted"><a href="/user/pembayaran/nota/{{ $pb->id_pembelian }}">Klik di sini untuk melanjutkan pembayaran anda</a></small></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($pb->status === "dikirim")
                        @if($pb->tipe === "pemesanan-produk")
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-lg-3 text-center text-warning bg-warning d-block">
                                    <i class="fa fa-truck fa-4x icon-info" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card-body mr-2">
                                        <h5 class="card-title">Pemesanan Produk</h5>
                                        <p class="card-text">Pemesanan produk anda pada tanggal {{ date($pb->tanggal) }} sedang dalam pengiriman dengan nomor resi <span class="bg-warning px-1">{{ $pb->resi }}</span> cek berkala notifikasi anda untuk melihat status pemesanan anda.</p>
                                        <p class="card-text"><small class="text-muted">Lihat Detail Nota <a href="/user/pembelian/nota/{{ $pb->id_pembelian }}">di sini</a></small></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 65%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-lg-3 text-center text-warning bg-warning d-block">
                                    <i class="fa fa-truck fa-4x icon-info" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card-body mr-2">
                                        <h5 class="card-title">Pemesanan Sablon</h5>
                                        <p class="card-text">Pemesanan sablon anda pada tanggal {{ date($pb->tanggal) }} sedang dalam pengiriman dengan nomor resi <span class="bg-warning px-1">{{ $pb->resi }}</span> cek berkala notifikasi anda untuk melihat status pemesanan anda.</p>
                                        <p class="card-text"><small class="text-muted">Lihat Detail Nota <a href="/user/pembelian/nota/{{ $pb->id_pembelian }}">di sini</a></small></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @elseif($pb->status === "selesai")
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-lg-3 text-center text-warning bg-primary d-block">
                                    <i class="fa fa-check-square-o fa-4x icon-info" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card-body mr-2">
                                        <h5 class="card-title">Pemesanan Produk</h5>
                                        <p class="card-text">Proses pemesanan produk anda dengan nomor nota {{ $pb->id_pembelian }} pada tanggal {{ date($pb->tanggal) }} sudah selesai.</p>
                                        <p class="card-text"><small class="text-muted">Lihat Detail Nota <a href="/user/pembelian/nota/{{ $pb->id_pembelian }}">di sini</a></small></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection