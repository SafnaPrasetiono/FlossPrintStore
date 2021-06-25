@extends('layout.panel')

@section('title')
<title>FlossPrint - Keranjang Belanja Produk</title>
<link rel="stylesheet" href="{{ url('/dist/css/pemesanan.css') }}">
@endsection

@section('content')

<div class="container py-4">
    <div class="row">

        <div class="col-12">
            <h3 class="text-dark mb-0">Keranjang Belanja</h3>
            <hr class="soft">
        </div>

        @if(empty(session('cart')))
        <div class="col-12 mb-2">
            <div class="d-block py-5 bg-secondary rounded shadow">
                <div class="text-center text-white py-5 my-5">
                    <i class="fa fa-shopping-cart fa-5x mb-4" aria-hidden="true"></i>
                    <h3><b>Belum Ada Barang</b></h3>
                    <h4 class="mb-4"><b>Keranjang Kosong</b></h4>
                    <a href="/produk" class="text-white"><i class="fa fa-angle-down mr-2" aria-hidden="true"></i>Ayo.. Belanja Sekarang!<i class="fa fa-angle-down ml-2" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        @else
        <div class="col-12 mb-2">
            <div class="table-responsive">
                <table class="table table-bordered rounded overflow-hidden">
                    <thead>
                        <tr class="table-active">
                            <th>Foto</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $subtotal = 0; ?>
                        @foreach(session('cart') as $produk => $row)
                        <?php $subtotal += $row['hargaproduk'] * $row['qty'] ?>
                        <tr>
                            <td>
                                <img src="{{ url('images/produk/display/' . $row['fotoproduk']) }}" width="120px" height="120px" alt="{{ $row['namaproduk'] }}">
                            </td>
                            <td>
                                <h5 class="mb-0">{{ $row['namaproduk'] }}</h5>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 80px;">Ukuran</p>
                                    <p class="m-0"><b>: {{ $row['ukuranproduk'] }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 80px;">P / L</p>
                                    <p class="m-0"><b>: {{ $row['panjang'] }} / {{ $row['lebar'] }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 80px;">Berat</p>
                                    <p class="m-0"><b>: {{ $row['berat'] }} <small>Gr</small> </b></p>
                                </div>
                            </td>
                            <td>Rp {{ number_format($row['hargaproduk']) }}</td>
                            <td>
                                <form action="/produk/updateorder" method="post">
                                    @csrf
                                    <!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary rounded-0" onclick="var result = document.getElementById('sst{{ $row['idproduk'] }}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;">
                                                <i class="fa fa-minus fa-lg" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="qty[]" id="sst{{ $row['idproduk'] }}" value="{{ $row['qty'] }}" title="Quantity:" class="input-text qty form-control" min="1" max="{{ $row['stok'] }}" readonly>
                                        <input type="hidden" name="idproduk[]" value="{{ $row['idproduk'] }}" class="form-control">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary rounded-0" onclick="var result = document.getElementById('sst{{ $row['idproduk'] }}'); var sst = result.value; if( !isNaN( sst )) result.value++;">
                                                <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td>Rp {{ number_format($row['hargaproduk'] * $row['qty']) }}</td>
                            <td>
                                <a href="/produk/deleteorder/{{ $row['idproduk'] }}" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12 mb-2">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="alert alert-warning py-3" role="alert">
                        <p class="alert-heading font-weight-bold mb-1">Info Belanja</p>
                        <p class="mb-0">Total belanja belum termasuk ongkos kirim yang akan dihitung setelah proses belanja selesai. Pastikan kembali barang belanjaan anda pastikan sudah benar dan sesuai</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="alert alert-success text-center py-4" role="alert">
                        <h4 class="alert-heading">TOTAL HARGA</h4>
                        <h5 class="mb-0">Rp {{ number_format($subtotal) }}</h5>
                    </div>
                </div>
            </div>
        </div>

        @endif

        <div class="col-12">
            <div class="d-block">
                @if(empty(session('cart')))
                <a href="/produk" class="btn btn-light btn-lg btn-xs border mb-3">Lanjutkan Belanja</a>
                <br class="soft d-block d-sm-none d-md-none d-lg-none">
                @elseif(Auth::guard('user')->check() and session('cart'))
                <a href="/produk" class="btn btn-light btn-lg btn-xs border mb-3">Lanjutkan Belanja</a>
                <br class="soft d-block d-sm-none d-md-none d-lg-none">
                <a href="/pemesanan/checkout" class="btn btn-primary btn-lg btn-xs ml-1 ml-md-3 float-right">CheckOut</a>
                @else
                <a href="/produk" class="btn btn-light btn-lg btn-xs border mb-3">Lanjutkan Belanja</a>
                <br class="soft d-block d-sm-none d-md-none d-lg-none">
                <a href="/login" class="btn btn-primary btn-lg btn-xs ml-1 ml-md-3 float-right">CheckOut</a>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection