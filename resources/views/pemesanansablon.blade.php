@extends('layout.panel')

@section('title')
<title>FlossPrint - Pemesanan desain pakaian</title>
<link rel="stylesheet" href="{{ url('/dist/css/pemesanansablon.css') }}">
@endsection

@section('content')

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h4 class="m-0">Pemesanan Sablon</h4>
            <hr class="soft">
        </div>
    </div>

    <form action="{{ route('pemesanansablon') }}" method="POST" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-12 mb-4">
            @if(session('sablon'))
            @foreach(session('sablon') as $dt )
            <div class="row no-gutters">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h5 class="m-0 w-100">Desain Baju Depan</h5>
                    <div class="d-block w-100 text-center">
                        <img src="{{ $dt['imgFront'] }}" alt="baju-depan" width="100%">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h5 class="m-0 w-100">Desain Baju Belakang</h5>
                    <div class="d-block text-center">
                        <img src="{{ $dt['imgBack'] }}" alt="baju-belakang" width="100%">
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="row no-gutter">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Upload Desain Depan</label>
                        <label for="file-input-1" class="form-upload form-control">
                            <img src="{{ url('/images/brangkas/upload.png') }}" alt="" id="displayDepan" class="rounded" width="100%" height="auto">
                        </label>
                        <input type="file" name="fotoDepan" onchange="ImgBajuDepan(this)" id="file-input-1">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Upload Desain Belakang</label>
                        <label for="file-input-2" class="form-upload form-control">
                            <img src="{{ url('/images/brangkas/upload.png') }}" alt="" id="displayBelakang" class="rounded" width="100%" height="auto">
                        </label>
                        <input type="file" name="fotoBelakang" onchange="ImgBajuBelakang(this)" id="file-input-2">
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-12">
            <hr class="soft">
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-7">
            <div class="form-group">
                <label for="ts">Tipe Sablon</label>
                <select name="tipesablon" id="ts" class="form-control">
                    <option value="tidak-berwarna">Tidak Berwarna</option>
                    <option value="berwarna">Berwarna</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ukuran">Ukuran Pakaian</label>
                <select name="ukuran" id="ukuran" class="form-control">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bahan">Jenis Bahan Pakaian</label>
                <select name="bahan" id="bahan" class="form-control">
                    <option value="combed-20s">Bahan Combed 20s</option>
                    <option value="combed-24s">Bahan Combed 24s</option>
                    <option value="combed-30s">Bahan Combed 30s</option>
                    <option value="cotton-bambo">Bahan Cotton Bambo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jum">Jumlah Pemesanan</label>
                <input type="number" name="jumlah" id="jump" min="3" max="1000" class="form-control" value="3">
            </div>
            @if(empty(session('sablon')))
            <div class="d-block">
                <label for="warna">Piliha Warna Pakaian</label>
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" id="color1" name="color" class="custom-control-input" value="putih">
                    <label class="custom-control-label" for="color1">
                        <div class="option-control text-dark bg-white">Putih</div>
                    </label>
                </div>
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" id="color2" name="color" class="custom-control-input" value="biru">
                    <label class="custom-control-label" for="color2">
                        <div class="option-control bg-primary">Biru</div>
                    </label>
                </div>
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" id="color3" name="color" class="custom-control-input" value="kuning">
                    <label class="custom-control-label" for="color3">
                        <div class="option-control bg-warning">Kuning</div>
                    </label>
                </div>
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" id="color4" name="color" class="custom-control-input" value="hijau">
                    <label class="custom-control-label" for="color4">
                        <div class="option-control bg-success">Hijau</div>
                    </label>
                </div>
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" id="color5" name="color" class="custom-control-input" value="merah">
                    <label class="custom-control-label" for="color5">
                        <div class="option-control bg-danger">Merah</div>
                    </label>
                </div>
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" id="color6" name="color" class="custom-control-input" value="hitam">
                    <label class="custom-control-label" for="color6">
                        <div class="option-control bg-dark">Hitam</div>
                    </label>
                </div>
            </div>
            @endif
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-5">
            <input type="hidden" name="total" id="total" value="">
            <div class="d-block p-2 rounded border">
                <strong>Info Harga</strong>
                <hr class="soft">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Harga Perpakaian
                        <span class="badge">
                            <span id="qtyp">3</span>
                            <span>x Rp.</span>
                            <span id="hrg">0</span>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Harga Perpakaian
                        <span class="badge">
                            <span>Rp.</span>
                            <span id="valuetotal">0</span>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Lihat Keterangan Harga
                        <a href="/sablon#harga" class="badge">DISINI</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 mt-5">
            <a href="/pemesanan/sablon/hapus" class="btn btn-danger btn-lg btn-xs border mb-3">Batalkan</a>
            <button type="submit" class="btn btn-primary btn-lg btn-xs ml-1 ml-md-3 float-right">Checkout</button>
        </div>
    </form>

</div>
@endsection