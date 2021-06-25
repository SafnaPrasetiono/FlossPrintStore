@extends('layout.panel')

@section('title')
<title>FlossPrint - Form Pembayaran Produk</title>
<link rel="stylesheet" href="{{ url('/dist/css/pembayaran.css') }}">
@endsection

@section('content')
<div class="container my-4">

    <div class="row">
        <div class="col-12">
            <h3 class="m-0">Pembayaran</h3>
            <hr class="soft">
        </div>
    </div>

    @if($pembelian['tipe'] === 'pemesanan-produk')
    <div class="row">
        <!-- pembayaran pemesanan produk -->
        <div class="col-12 mb-3">
            <div class="alert alert-info">
                <h5 class="m-0font-weight-bold">Info Nota Yang akan di bayar</h5>
                <hr class="soft">
                <div class="d-flex">
                    <p class="m-0 txt-width">Nota</p> : {{ $pembelian['id_pembelian'] }}
                </div>
                <div class="d-flex">
                    <p class="m-0 txt-width">Tipe</p> : {{ $pembelian['tipe'] }}
                </div>
                <div class="d-flex mb-3">
                    <p class="m-0 txt-width">Tanggal</p> : {{ $pembelian['tanggal'] }}
                </div>
                <p class="m-0">Total yang harus di bayar sebesar<br class="d-block d-sm-none d-md-none d-lg-none"> <b> Rp. {{ number_format($pembelian['harga']) }}</b></p>
            </div>
            <hr class="soft">
        </div>
        <form action="/user/pembayaran/produk" method="POST" enctype="multipart/form-data" class="col-12">
            @csrf
            <div class="row">
                <input type="hidden" name="id_pembelian" value="{{ $pembelian->id_pembelian }}">
                <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                    <div class="form-group">
                        <label for="penyetor">Penyetor</label>
                        <input type="text" id="penyetor" name="penyetor" class="form-control  @error('penyetor') is-invalid @enderror" required value="{{ auth('user')->user()->nama_lengkap }}">
                    </div>
                    <div class="form-group">
                        <label for="bank">Bank</label>
                        <input type="text" id="bank" name="bank" class="form-control  @error('bank') is-invalid @enderror" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" required min="1">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="form-group">
                        <label>Bukti Pembayaran</label>
                        <label for="file-input" class="form-upload form-control">
                            <img src="{{ url('/images/brangkas/upload.png') }}" alt="" class="buktiImages rounded" width="100%" height="auto">
                        </label>
                        <input type="file" name="bukti" onchange="buktiImages(this)" id="file-input" required>
                    </div>
                    @error('bukti')
                    <div class="invalid-feedback">Pastika Upload Bukti Pembayaran</div>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Proses</button>
                </div>
            </div>
        </form>
    </div>


    @else
    <!-- pembayaran pemesanan sablon -->
    <div class="row">
        <?php
        $totalbayar = $pembelian['harga'];
        if ($totalbayar < 1000000) {
            $harga_dp = $totalbayar - ($totalbayar * 75 / 100);
        } elseif ($totalbayar >= 1000000) {
            $harga_dp = $totalbayar - ($totalbayar * 80 / 100);
        }
        ?>
        <div class="col-12">
            <div class="alert alert-info">
                <strong class="m-0">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Info Nota Yang akan di bayar
                </strong>
                <hr class="soft my-2">
                <div class="d-flex">
                    <p class="m-0 txt-width">Nota</p> : {{ $pembelian['id_pembelian'] }}
                </div>
                <div class="d-flex">
                    <p class="m-0 txt-width">Tipe</p> : {{ $pembelian['tipe'] }}
                </div>
                <div class="d-flex">
                    <p class="m-0 txt-width">Tanggal</p> : {{ $pembelian['tanggal'] }}
                </div>
                <div class="d-flex">
                    <p class="m-0 txt-width">Harga Total</p> : Rp. {{ number_format($pembelian['harga']) }}
                </div>
                @if($pembelian->status === 'anjuran-bayar-lunas')
                <div class="d-flex mb-3">
                    <p class="m-0 txt-width">Uang Muka</p> : Rp. {{ number_format($pembayaran['harga']) }}
                </div>
                <?php $grandtotal = $pembelian['harga'] - $pembayaran['harga']; ?>
                <p class="m-0">Sisa tagihan pembayaran atas pemesanan sablon sebesar<br class="d-block d-sm-none d-md-none d-lg-none"> <b> Rp. {{ number_format($grandtotal) }}</b></p>
                @else
                <p class="m-0">Uang muka yang harus di bayar sebesar<br class="d-block d-sm-none d-md-none d-lg-none"> <b> Rp. {{ number_format($harga_dp) }}</b></p>
                @endif
            </div>
            <hr class="soft">
        </div>
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <strong class="m-0">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Pemesanan sablon
                </strong>
                <hr class="soft my-2">
                <p class="mb-0">Syarat dan ketentuan terhadap teransaksi pemesanan jasa sablon telah di tetapkan pada toko flossprint lihat syarat dan ketentuan <a href="/syaratketentuan/">disini</a></p>
            </div>
            <hr class="soft">
        </div>
        <form action="/user/pembayaran/sablon" method="POST" enctype="multipart/form-data" class="col-12">
            <div class="row">
                @csrf
                <input type="hidden" name="id_pembelian" value="{{ $pembelian->id_pembelian }}">
                <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                    <div class="form-group">
                        <label for="penyetor">Penyetor</label>
                        <input type="text" id="penyetor" name="penyetor" class="form-control  @error('penyetor') is-invalid @enderror" required value="{{ auth('user')->user()->nama_lengkap }}">
                    </div>
                    <div class="form-group">
                        <label for="bank">Bank</label>
                        <input type="text" id="bank" name="bank" class="form-control  @error('bank') is-invalid @enderror" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" required min="1">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="form-group">
                        <label>Bukti Pembayaran</label>
                        <label for="file-input" class="form-upload form-control">
                            <img src="{{ url('/images/brangkas/upload.png') }}" alt="" class="buktiImages rounded" width="100%" height="auto">
                        </label>
                        <input type="file" name="bukti" onchange="buktiImages(this)" id="file-input" required>
                    </div>
                    @error('bukti')
                    <div class="invalid-feedback">Pastika Upload Bukti Pembayaran</div>
                    @enderror
                </div>
                @if($pembelian->status === 'anjuran-bayar-lunas')
                <div class="col-12">
                    <button type="submit" name="bayar" value="tagihan" class="btn btn-primary btn-lg btn-block">Bayar Tagihan</button>
                </div>
                @else
                <div class="col-12 mb-3">
                    <button type="submit" name="bayar" value="uangmuka" class="btn btn-info btn-lg btn-block">Bayar Uang Muka</button>
                </div>
                <div class="col-12">
                    <button type="submit" name="bayar" value="lunas" class="btn btn-primary btn-lg btn-block">Bayar Semua</button>
                </div>
                @endif
            </div>
        </form>
    </div>
    @endif
</div>
@endsection