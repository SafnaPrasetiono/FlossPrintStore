@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Dashboard</title>
@endsection

@section('content')
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-12 ">
            <div class="bg-white rounded shadow py-3 px-3">
                <h2 class="text-primary mb-1">Hello, <span class="text-capitalize">{{ auth('admin')->user()->nama_lengkap}}</span></h2>
                <p class="m-0">Selamat datang di dashboard flossprint studio</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-3">

    <div class="row">
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4">
            <div class="info bg-white rounded shadow px-3 py-2">
                <div class="d-flex py-2 border-bottom border-primary">
                    <i class="fa fa-users fa-icon" aria-hidden="true"></i>
                    <h4 class="ml-3 mt-auto mb-2">{{ $pelanggan }}</h4>
                </div>
                <p class="mb-0 py-1">Pelanggan</p>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4">
            <div class="info bg-white rounded shadow px-3 py-2">
                <div class="d-flex py-2 border-bottom border-primary">
                    <i class="fa fa-cubes fa-icon" aria-hidden="true"></i>
                    <h4 class="ml-3 mt-auto mb-2">{{ $jumproduk }}</h4>
                </div>
                <p class="mb-0 py-1">Produk</p>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4">
            <div class="info bg-white rounded shadow px-3 py-2">
                <div class="d-flex py-2 border-bottom border-primary">
                    <i class="fa fa-dropbox fa-icon" aria-hidden="true"></i>
                    <h4 class="ml-3 mt-auto mb-2">{{ $jumprodukhabis }}</h4>
                </div>
                <p class="mb-0 py-1">Stok Habis</p>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4">
            <div class="info bg-white rounded shadow px-3 py-2">
                <div class="d-flex py-2 border-bottom border-primary">
                    <i class="fa fa-truck fa-icon" aria-hidden="true"></i>
                    <h4 class="ml-3 mt-auto mb-2">{{ $terjual }}</h4>
                </div>
                <p class="mb-0 py-1">Produk Terjual</p>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4">
            <div class="info bg-white rounded shadow px-3 py-2">
                <div class="d-flex py-2 border-bottom border-primary">
                    <i class="fa fa-shopping-bag fa-icon" aria-hidden="true"></i>
                    <h4 class="ml-3 mt-auto mb-2">{{ $pemesananproduk }}</h4>
                </div>
                <p class="mb-0 py-1">Pemesanan Produk</p>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4">
            <div class="info bg-white rounded shadow px-3 py-2">
                <div class="d-flex py-2 border-bottom border-primary">
                    <i class="fa fa-shopping-basket fa-icon" aria-hidden="true"></i>
                    <h4 class="ml-3 mt-auto mb-2">{{ $pemesanansablon }}</h4>
                </div>
                <p class="mb-0 py-1">Pemesanan Sablon</p>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4">
            <div class="info bg-white rounded shadow px-3 py-2">
                <div class="d-flex py-2 border-bottom border-primary">
                    <i class="fa fa-money fa-icon" aria-hidden="true"></i>
                    <h4 class="ml-3 mt-auto mb-2">{{ $sudahbayar }}</h4>
                </div>
                <p class="mb-0 py-1">Pemesanan Sudah Bayar</p>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4">
            <div class="info bg-white rounded shadow px-3 py-2">
                <div class="d-flex py-2 border-bottom border-primary">
                    <i class="fa fa-flag fa-icon" aria-hidden="true"></i>
                    <h4 class="ml-3 mt-auto mb-2">{{ $selesai }}</h4>
                </div>
                <p class="mb-0 py-1">Pemesanan Selesai</p>
            </div>
        </div>
    </div>

</div>
@endsection