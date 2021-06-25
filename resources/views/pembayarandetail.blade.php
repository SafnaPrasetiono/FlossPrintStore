@extends('layout.panel')

@section('title')
<title>FlossPrint - Detail Pembayaran Produk</title>
<link rel="stylesheet" href="{{ url('/dist/css/pembayaran.css') }}">
@endsection

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h4 class="text-dark m-0">Pembayaran</h4>
            <hr class="soft">
        </div>

        <div class="col-12 mb-3">
            <div class="alert alert-info">
                <h5 class="m-0font-weight-bold">Info nota yang telah dibayar</h5>
                <hr class="soft">
                <div class="d-flex">
                    <p class="m-0 txt-width">Nota</p> : {{ $pembelian['id_pembelian'] }}
                </div>
                <div class="d-flex">
                    <p class="m-0 txt-width">Status</p> : {{ $pembelian['status'] }}
                </div>
                <div class="d-flex">
                    <p class="m-0 txt-width">Tanggal</p> : {{ $pembelian['tanggal'] }}
                </div>
                <div class="d-flex">
                    <p class="m-0 txt-width">Harga</p> : Rp. {{ number_format($pembelian['harga']) }}
                </div>
            </div>
        </div>

        <!-- pemesanan produk -->
        @if($pembelian->tipe === 'pemesanan-produk')
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 mb-3">
            <div class="d-block">
                <h5 class="text-dark">Info Pembayaran</h5>
                <hr class="soft">
            </div>
            <div class="form-group">
                <label for="p">Penyetor</label>
                <input type="text" id="p" class="form-control" readonly value="{{ $pembayaran['penyetor'] }}">
            </div>
            <div class="form-group">
                <label for="T">Tanggal</label>
                <input type="text" id="T" class="form-control" readonly value="{{ $pembayaran['tanggal'] }}">
            </div>
            <div class="form-group">
                <label for="B">Transfer Bank</label>
                <input type="text" id="B" class="form-control" readonly value="{{ $pembayaran['bank'] }}">
            </div>
            <div class="form-group">
                <label for="i">Info Bayar</label>
                <input type="text" class="form-control" readonly value="Rp. {{ number_format($pembayaran['harga']) }}">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-5">
            <div class="d-block">
                <h5 class="text-dark">Bukti Pembayaran</h5>
                <hr class="soft">
            </div>
            <div class="d-block">
                <img src="{{ url('/images/pembayaran/' . $pembayaran['bukti']) }}" alt="pembayaran" width="100%">
            </div>
        </div>

        <!-- pemesanan sablon -->
        @elseif($pembelian->tipe === 'pemesanan-sablon')
            <?php $info = 1; ?>
            @foreach($pembayaran as $pbl)
            <div class="col-12">
                <hr class="soft">
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 mb-3">
                @if($info === 1)
                <div class="d-block">
                    <h5 class="text-dark">Info Pembayaran Uang Muka</h5>
                    <hr class="soft">
                </div>
                @else
                <div class="d-block">
                    <h5 class="text-dark">Info Pelunasan Tagihan</h5>
                    <hr class="soft">
                </div>
                @endif
                <div class="form-group">
                    <label for="p">Penyetor</label>
                    <input type="text" id="p" class="form-control" readonly value="{{ $pbl['penyetor'] }}">
                </div>
                <div class="form-group">
                    <label for="T">Tanggal</label>
                    <input type="text" id="T" class="form-control" readonly value="{{ $pbl['tanggal'] }}">
                </div>
                <div class="form-group">
                    <label for="B">Transfer Bank</label>
                    <input type="text" id="B" class="form-control" readonly value="{{ $pbl['bank'] }}">
                </div>
                <div class="form-group">
                    <label for="i">Info Bayar</label>
                    <input type="text" class="form-control" readonly value="Rp. {{ number_format($pbl['harga']) }}">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                <div class="d-block">
                    <img src="{{ url('/images/pembayaran/' . $pbl['bukti']) }}" alt="pembayaran" width="100%">
                </div>
            </div>
            <?php $info++; ?>
            @endforeach
        @endif
    </div>
</div>
@endsection