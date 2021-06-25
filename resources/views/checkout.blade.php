@extends('layout.panel')

@section('title')
<title>FlossPrint - Keranjang Belanja Produk</title>
<link rel="stylesheet" href="{{ url('/dist/css/pemesanan.css') }}">
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex">
                <h3 class="text-dark mb-0">Checkout</h3>
                @if(session('cartsablon'))
                <a href="/pemesanan/sablon/proses/batal" class="btn btn-danger ml-auto">Batalkan</a>
                @endif
            </div>
            <hr class="soft">
        </div>

        @if(session('cart'))
        <div class="col-12 mb-4">
            <div class="table-responsive">
                <table class="table table-bordered rounded overflow-hidden">
                    <thead>
                        <tr class="table-active">
                            <th>Foto</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $subtotal = 0; ?>
                        <?php $beratproduk = 0; ?>
                        @foreach(session('cart') as $produk => $row)
                        <?php $subtotal += $row['hargaproduk'] * $row['qty']; ?>
                        <?php $beratproduk += $row['berat'] * $row['qty']; ?>
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
                            </td>
                            <td>Rp {{ number_format($row['hargaproduk']) }}</td>
                            <td>
                                {{ $row['qty'] }}
                            </td>
                            <td>Rp {{ number_format($row['hargaproduk'] * $row['qty']) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="table-active"><b>Total Harga</b></td>
                            <td>Rp. {{ number_format($subtotal) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        @elseif(session('cartsablon'))
        <div class="col-12 mb-4">
            <div class="table-responsive">
                <table class="table table-bordered rounded overflow-hidden">
                    <thead>
                        <tr class="table-active">
                            <th colspan="2">Foto Sablon</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $subtotal = 0; ?>
                        <?php $beratproduk = 0; ?>
                        @foreach(session('cartsablon') as $row)
                        <?php $subtotal += $row['hargaproduk'] * $row['qty']; ?>
                        <?php $beratproduk += $row['berat'] * $row['qty']; ?>
                        <tr>
                            <td>
                                <img src="{{ $row['fotodepan'] }}" width="120px" alt="...">
                            </td>
                            <td>
                                <img src="{{ $row['fotobelakang'] }}" width="120px" alt="...">
                            </td>
                            <td>
                                <h5 class="font-weight-bold">Sablon Pakaian</h5>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 120px;">Bahan Pakaian</p>
                                    <p class="m-0"><b>: {{ $row['bahan'] }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 120px;">Warna Pakaian</p>
                                    <p class="m-0"><b>: {{ $row['warnapakaian'] }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 120px;">Tipe Sablon</p>
                                    <p class="m-0"><b>: {{ $row['tipesablon'] }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 120px;">Ukuran</p>
                                    <p class="m-0"><b>: {{ $row['ukuranproduk'] }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 120px;">P / L</p>
                                    <p class="m-0"><b>: {{ $row['panjang'] }} / {{ $row['lebar'] }}</b></p>
                                </div>
                            </td>
                            <td>Rp {{ number_format($row['hargaproduk']) }}</td>
                            <td>
                                {{ $row['qty'] }}
                            </td>
                            <td>Rp {{ number_format($row['hargaproduk'] * $row['qty']) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="table-active"><b>Total Harga</b></td>
                            <td>Rp. {{ number_format($subtotal) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        @endif


        <div class="col-12 mb-4">
            <form action="/pemesanan/checkout/proses" method="post" class="row">
                @csrf
                <input type="hidden" name="weight" value="<?php echo $beratproduk; ?>">
                <div class="col-12 col-md-7 col-ld-7 order-sm-1 mb-4">
                    <h4 class="">Biodata Pembeli</h4>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ auth('user')->user()->nama_lengkap }}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ auth('user')->user()->email }}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Telepon</label>
                        <input type="text" name="telepon" class="form-control" value="{{ auth('user')->user()->telepon }}" required>
                    </div>
                    <hr class="soft">
                    <h4>Alamat Tujuan</h4>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <div class="form-group form-group--inline">
                                <label for="provinsi">Provinsi Tujuan</label>
                                <select name="province_id" id="province_id" class="form-control" required>
                                    <option value="">Provinsi Tujuan</option>
                                    @foreach ($provinsi as $row)
                                    <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="kota">Kota</label>
                            <select name="kota_id" id="kota_id" class="form-control" required>
                                <option value="">Kota Tujuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" class="form-control" rows="4" required>{{ auth('user')->user()->alamat }}</textarea>
                        <div class="invalid-feedback d-block">
                            Alamat harus menggunakan Rt & Rw berserta nomor rumah
                        </div>
                    </div>
                    <hr class="soft">
                    <h4>Layanan Pengiriman</h4>
                    <div class="form-group ">
                        <label>Pilih Ekspedisi</label>
                        <select name="kurir" id="kurir" class="form-control" required>
                            <option value="">Pilih kurir</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS INDONESIA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pilih Layanan</label>
                        <select name="layanan" id="layanan" class="form-control" required>
                            <option value="">Pilih layanan</option>
                        </select>
                    </div>
                    <hr class="soft">
                    <h4 class="mb-0">Pembayaran</h4>
                    <div class="d-block my-3">
                        @foreach($bank as $bk)
                        <div class="custom-control custom-radio">
                            <input id="{{ $bk->nama_bank }}" name="id_bank" type="radio" class="custom-control-input" checked="" required="" value="{{ $bk->id_bank }}">
                            <label class="custom-control-label" for="{{ $bk->nama_bank }}">
                                {{ $bk->nama_bank }} ({{ $bk->deskripsi }})
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-5 order-sm-2">
                    <div class="text-left mb-3">
                        <h4 class="mb-0">Estimasi Harga</h4>
                    </div>
                    <ul class="list-estimasi list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Sub Harga</h6>
                                <small class="text-muted">Jumlah harga Barang</small>
                            </div>
                            <p class="text-muted d-flex mt-2 mb-0">Rp. <b class="ml-2">{{ number_format($subtotal) }}</b></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Ongkos Kirim</h6>
                                <small class="text-muted">Biaya Pengiriman</small>
                            </div>
                            <p class="text-muted d-flex mt-2 mb-0" id="listongkir">Rp. <b class="ml-2" id="isiHrgOngkir">-</b></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed py-4">
                            <div>
                                <h5 class="my-0 text-dark">Total Harga</h5>
                            </div>
                            <p class="text-muted d-flex mb-0" id="grandharga">Rp. <b class="ml-2" id="grandtotal">-</b></p>
                        </li>
                        <input type="hidden" name="grandstotal" id="iptotal" value="<?php echo $subtotal; ?>">
                    </ul>
                    <div class="form-group border rounded p-3">
                        <button type="submit" class="btn btn-lg btn-block btn-primary">Proses Pembayaran</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection