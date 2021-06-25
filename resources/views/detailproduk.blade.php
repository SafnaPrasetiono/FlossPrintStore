@extends('layout.panel')

@section('title')
<title>FlossPrint - Detail Produk</title>
<link rel="stylesheet" href="{{ url('/dist/css/produk.css') }}">
@endsection

@section('content')

<?php
// product method
foreach ($detailproduk as $dp) {
    $idproduk = $dp->id_produk;
    $namaproduk = $dp->namaproduk;
    $harga = $dp->harga;
    $size = $dp->ukuran;
    $p = $dp->panjang;
    $l = $dp->lebar;
    $jumlah = $dp->stok;
    $terjual = $dp->terjual;
    $displayfoto = $dp->samplefoto;
    $deskripsi = $dp->deskripsi;
}

$numbering = 1;
?>
<!-- head detail produk -->
<div class="container mt-0 mt-sm-4 mt-md-4 mt-lg-4 px-0">
    <div class="row no-gutters mb-5">

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
            <div id="CarauselProduct" class="row no-gutters carousel pr-sm-2 mr-md-2 pr-lg-3">
                <div class="col-12 col-sm-2 col-md-2 col-lg-2 d-none d-sm-block d-md-block d-lg-block">
                    <ol class="nav flex-column d-block pr-1" style="max-height: 455px; overflow-y: auto;">
                        <li data-target="#CarauselProduct" data-slide-to="0" class="mb-1 active">
                            <img src="{{ url('/images/produk/display/'. $displayfoto) }}" alt="data" class="img-fluid">
                        </li>
                        @foreach($fotoproduk as $ftp)
                        <li data-target="#CarauselProduct" data-slide-to="<?php echo $numbering; ?>" class="mb-1">
                            <img src="{{ url('/images/produk/' . $ftp->lokasi) }}" alt="data" class="img-fluid">
                        </li>
                        <?php $numbering++; ?>
                        @endforeach
                    </ol>
                </div>
                <div class="col-12 col-sm-10 col-md-10 col-lg-10">
                    <div class="carousel-inner overflow-hidden">
                        <div class="carousel-item active">
                            <img src="{{ url('/images/produk/display/'. $displayfoto) }}" alt="..." class="zoom-in" width="100%">
                        </div>
                        @foreach($fotoproduk as $fpview)
                        <div class="carousel-item">
                            <img src="{{ url('/images/produk/' . $fpview->lokasi ) }}" alt="..." class="zoom-in" width="100%">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev  d-block d-sm-none d-mdnone  d-lg-none" href="#CarauselProduct" role="button" data-slide="prev" style="padding-top: 50%;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next d-block d-sm-none d-md-none d-lg-bnone" href="#CarauselProduct" role="button" data-slide="next" style="padding-top: 50%;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 px-3 px-sm-0 px-md-0 px-lg-0">
            <div class="p-head">
                <h2 class="text-capitalize">{{ $namaproduk }}</h2>
                <h4 class="text-danger">Rp. {{ number_format($harga) }}</h4>
                <hr class="soft">
            </div>
            <div class="p-body">
                <div class="p-info">
                    <div class="row no-gutters mb-0">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-3 mb-sm-2 mb-md-2 col-lg-0">
                            <div class="alert alert-warning text-center my-0 mr-1 p-1">
                                <p class="mb-0">Ukuran</p>
                                <b class="mb-0 text-capitalize">{{ $size }}</b>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-2 mb-sm-2 mb-md-2 mb-lg-0">
                            <div class="alert alert-warning text-center my-0 mx-0 mx-lg-1 ml-1 ml-lg-0 p-1">
                                <p class="text-center mb-0">Tersedia</p>
                                <b class="mb-0">{{ $jumlah }}</b>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="alert alert-warning text-center my-0 mx-0 mx-lg-1 mr-1 p-1">
                                <p class="mb-0">P/L</p>
                                <b class="mb-0">{{ $p }} / {{ $l }}</b>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="alert alert-warning text-center my-0 ml-1 p-1">
                                <p class="mb-0">Terkirim</p>
                                <b class="mb-0">{{ $terjual }}</b>
                            </div>
                        </div>
                    </div>
                    <hr class="soft">
                </div>
                <form action="/produk/order" method="post" class="row no-gutters">
                    @csrf
                    <input type="hidden" name="idproduk" value="{{ $idproduk }}">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3 pr-sm-1 pr-md-1 pr-lg-1">
                        <div class="alert alert-success rounded-0 mb-0" role="alert">
                            <p class="mb-0">Jumlah</p>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button id="min" class="btn btn-outline-secondary rounded-0" type="button" id="button-addon1">
                                    <i class="fa fa-minus fa-lg" aria-hidden="true"></i>
                                </button>
                            </div>
                            <input type="number" name="qty" id="qty" class="form-control text-center" value="1" min="1" max="{{ $jumlah }}" readonly />
                            <div class="input-group-append">
                                <button id="plus" class="button btn btn-outline-secondary rounded-0" type="button" id="button-addon2">
                                    <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <?php if ($jumlah <= 0) : ?>
                            <button class="btn-aksi btn btn-danger btn-lg btn-block" name="stok_habis">
                                <i class="fa fa-cart-plus"></i> Stok Habis
                            </button>
                        <?php else : ?>
                            <button class="btn-aksi btn btn-success btn-lg btn-block" name="order_barang">
                                <i class="fa fa-cart-plus"></i> Tambahkan ke keranjang
                            </button>
                        <?php endif; ?>
                    </div>
                </form>
                <hr class="soft">
            </div>
        </div>

    </div>
</div>

<!-- deskripsi, review, and chat produk -->
<div class="container">
    <!-- body detail produk -->
    <div class="row no-gutters mb-5">
        <!-- deskripsi, komentar, detail produk -->
        <div class="col-12 col-md-8 col-lg-8">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-deskripsi-tab" data-toggle="tab" href="#nav-deskripsi" role="tab" aria-controls="nav-deskripsi" aria-selected="true">
                        Deskripsi
                    </a>
                    <a class="nav-item nav-link" id="nav-review-tab" data-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="false">
                        Ulasan
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-deskripsi" role="tabpanel" aria-labelledby="nav-deskripsi">
                    <!-- deskripsi produk -->
                    <div class="p-deskripsi py-4">
                        <div class="d-block">
                            <?php echo $deskripsi; ?>
                        </div>
                    </div>

                </div>
                <div class="tab-pane py-2 fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review">
                    @if(count($ulasan) != 0)
                    @foreach($ulasan as $uls)
                    <div class="p-review border rounded p-2 mb-2">
                        <div class="media">
                            <img src="{{ url('/images/user/' . $uls->foto) }}" class="rounded-circle my-1 mx-2 mr-3" alt="..." width="42px" height="42px">
                            <div class="media-body">
                                <p class="mb-0 font-weight-bold">{{ $uls->nama_lengkap}}</p>
                                <small>
                                    <?php $rating = $uls->rating / 20; ?>
                                    <?php $sisa = 5 % $rating; ?>
                                    <?php for ($r = 1; $r <= $rating; $r++) : ?>
                                        <i class="fa fa-star text-warning"></i>
                                    <?php endfor; ?>
                                    <?php for ($s = 1; $s <= $sisa; $s++) : ?>
                                        <i class="fa fa-star text-secondary"></i>
                                    <?php endfor; ?>
                                </small>
                                <p class="selengkapnya mt-1 mb-0">{{ $uls->tanggapan }}</p>
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            @if($uls->balasan != null)
                            <a href="#balasan-{{ $uls->id_ulasan }}" class="btn ml-auto mr-3 btn-sm" type="button" data-toggle="collapse">Lihat Balasan <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            @endif
                        </div>
                        <div class="media collapse border-top mt-2 py-2" id="balasan-{{ $uls->id_ulasan }}">
                            <img src="{{ url('/images/logo/LOGO.png') }}" class="rounded-circle my-1 mx-2 mr-3" alt="..." width="32px" height="32px">
                            <div class="media-body">
                                <p class="mb-0 font-weight-bold">Flossprint</p>
                                {{$uls->balasan}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-danger text-center" role="alert">
                        <h5 class="font-weight-bold mb-0">Belum ulasan untuk produk ini</h5>
                        <p class="mb-0"></p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@endsection