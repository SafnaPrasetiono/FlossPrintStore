@extends('layout.panel')

@section('title')
<title>FlossPrint - Produk</title>
<link rel="stylesheet" href="{{ url('/dist/css/produk.css') }}">
@endsection

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">

        <div class="col-12 col-sm-12 col-md-3 col-lg-3 d-none d-md-block d-lg-block mb-3">
            <h4 class="m-0">Kategori Produk</h4>
            <hr class="soft">
            <div class="list-group">
                <a href="/produk/kategori/jaket" class="list-group-item list-group-item-action">Jaket</a>
                <a href="/produk/kategori/sweater" class="list-group-item list-group-item-action">Sweater</a>
                <a href="/produk/kategori/baju" class="list-group-item list-group-item-action">Baju</a>
                <a href="/produk/kategori/celana" class="list-group-item list-group-item-action">Celana</a>
                <a href="/produk/kategori/topi" class="list-group-item list-group-item-action">Topi</a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="row no-gutters">
                <div class="col-12 mb-3">
                    <form action="/produk/pencarian" method="GET" class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari produk terbaikmu">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text" id="basic-addon2">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <?php if (count($produk) <= 0) : ?>
                <div class="col-12 mb-3">
                    <div class="alert alert-danger text-center py-5" role="alert">
                        <i class="fa fa-dropbox fa-5x mb-3" aria-hidden="true"></i>
                        <h3 class="alert-heading">Maff, Data Tidak Tersedia!</h3>
                        <p>Lihat produk lainnya disini</p>
                        <a href="/produk" class="d-block">-- PRODUK --</a>
                    </div>
                </div>
            <?php else : ?>
                <div class="row no-gutters mb-3">
                    @foreach($produk as $dp)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3 px-1">
                        <div class="produk">
                            @if($dp->stok == 0 or $dp->stok == null)
                            <div class="info-produk">
                                <p class="mb-0 text-white">Habis</p>
                            </div>
                            @endif
                            <img class="card-img-top" src="{{ url('/images/produk/display/' . $dp->samplefoto) }}" alt="">
                            <div class="card-body px-2 pt-2 pb-3">
                                <p class="card-title font-weight-bold text-capitalize text-truncate mb-0">{{ $dp->namaproduk }}</p>
                                <p class="card-text text-danger m-0">Rp. {{ number_format($dp->harga) }}</p>
                            </div>
                            <a href="/produk/detail/{{ $dp->id_produk }}" class="stretched-link link-detail m-0"></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            <?php endif; ?>
            <div class="d-block px-1" aria-label="navigation produk">
                {{ $produk->links() }}
            </div>
        </div>

    </div>
</div>
@endsection