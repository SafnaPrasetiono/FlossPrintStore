@extends('layout.panel')

@section('title')
<title>FlossPrint - Nota pemesanan</title>
<link rel="stylesheet" href="{{ url('/dist/css/nota.css') }}">
@endsection

@section('content')
<?php $no = 1; ?>
<?php $subtotal = 0; ?>
<div class="container mt-4">
    <div class="row">

        <div class="col-12">
            <h2 class="m-0">Nota Pelanggan</h2>
            <hr class="soft">
        </div>

        <div class="col-12">
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Nota</p>
                <p class="mb-0">: {{ $pembelian->id_pembelian }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Tipe Nota</p>
                <p class="mb-0">: {{ $pembelian->tipe }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Tanggal</p>
                <p class="mb-0">: {{ $pembelian->tanggal }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Harga</p>
                <p class="mb-0">: Rp. {{ number_format($pembelian->harga) }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Status</p>
                <p class="mb-0">: {{ $pembelian->status }}</p>
            </div>
            <hr class="soft">
        </div>


        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
            <h4>Pelanggan</h4>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Nama</p>
                <p class="mb-0">: {{ auth('user')->user()->nama_lengkap }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Email</p>
                <p class="mb-0">: {{ auth('user')->user()->email }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">telepon</p>
                <p class="mb-0">: {{ auth('user')->user()->telepon }}</p>
            </div>
        </div>

        @foreach($pengiriman as $kirim)
        <?php $ongkir = $kirim->harga; ?>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <h4>Pengiriman</h4>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Provinsi</p>
                <p class="mb-0">: {{ $kirim->provinsi }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Kota</p>
                <p class="mb-0">: {{ $kirim->kota }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold pr-5 pb-3 pb-sm-auto pb-md-auto pb-lg-0">Alamat</p>
                <p class="mb-0">: {{ $kirim->alamat }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Ongkir</p>
                <p class="mb-0">: Rp. {{ number_format($kirim->harga) }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Expedisi</p>
                <p class="mb-0">: {{ $kirim->expedisi }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Layanan</p>
                <p class="mb-0">: {{ $kirim->layanan }}</p>
            </div>
            @if($kirim->resi != null)
            <div class="d-flex">
                <p class="mb-0 wtext-2 font-weight-bold">Resi</p>
                <p class="mb-0">: {{ $kirim->resi }}</p>
            </div>
            @endif
        </div>
        @endforeach

        @if($pembelian->tipe === 'pemesanan-produk')
        <div class="col-12">
            <hr class="soft">
            <div class="d-flex table-responsive">
                <table class="table table-striped table-inverse">
                    <thead class="table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Berat</th>
                            <th>harga</th>
                            <th>jumlah</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelianproduk as $pp)
                        <?php $subtotal += $pp->totalharga; ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>
                                <p class="mb-0">{{ $pp->namaproduk }}</p>
                                <div class="d-flex">
                                    <small class="mb-0" style="width: 80px;">Ukuran</small>
                                    <small class="m-0"><b>: {{ $pp->ukuranproduk }}</b></small>
                                </div>
                                <div class="d-flex">
                                    <small class="mb-0" style="width: 80px;">P / L</small>
                                    <small class="m-0"><b>: {{ $pp->panjang }} / {{ $pp->lebar }}</b></small>
                                </div>
                            </td>
                            <td>{{ $pp->beratproduk }}<small>.Gr</small> </td>
                            <td>Rp. {{ number_format($pp->hargaproduk) }}</td>
                            <td>{{ $pp->jumlah }}</td>
                            <td>Rp. {{ number_format($pp->totalharga) }}</td>
                        </tr>
                        @if($pembelian->status === "selesai")
                        @if($pp->id_ulasan == 0)
                        <tr>
                            <td colspan="6">
                                <div class="d-flex">
                                    <button type="button" class="idproduk btn btn-primary ml-auto" data-toggle="modal" data-target="#exampleModal" produk="{{ $pp->id_pembelian_produk }}">
                                        Berikan Tanggapan produk
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="6">
                                <div class="d-flex">
                                    <a href="/produk/detail/{{ $pp->id_produk }}" class="btn btn-info ml-auto">Lihat Tanggapan Produk</a>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endif
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr class="soft">
        </div>
        @elseif($pembelian->tipe === 'pemesanan-sablon')
        @if($waktuproses)
        <div class="col-12 mt-4">
            <hr class="soft">
            <strong>Proses Pengerjaan Sablon</strong>
            <div class="d-flex">
                <p class="mb-0" style="width: 160px;">Proses dimulai</p>
                <p class="mb-0">: {{ $waktuproses->mulai }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0" style="width: 160px;">Perkiraan selesai</p>
                <p class="mb-0">: {{ $waktuproses->perkiraan }}</p>
            </div>
            <div class="d-flex">
                <p class="mb-0" style="width: 160px;">Proses selesai</p>
                <p class="mb-0">: {{ $waktuproses->selesai }}</p>
            </div>
        </div>
        @endif
        <div class="col-12">
            <hr class="soft">
            <div class="d-flex table-responsive">
                <table class="table table-striped table-inverse">
                    <thead class="table-bordered">
                        <tr>
                            <th>No</th>
                            <th colspan="2">Desain Sablon</th>
                            <th>Deskripsi</th>
                            <th>Berat</th>
                            <th>harga</th>
                            <th>jumlah</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelianproduk as $pp)
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>
                                <img src="{{ url('/images/sablon/' . $pp->foto_depan) }}" width="120px" alt="...">
                            </td>
                            <td>
                                <img src="{{ url('/images/sablon/' . $pp->foto_belakang) }}" width="120px" alt="...">
                            </td>
                            <td>
                                <h5 class="font-weight-bold">Sablon Pakaian</h5>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 80px;">Bahan</p>
                                    <p class="m-0"><b>: {{ $pp->bahan }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 80px;">Warna</p>
                                    <p class="m-0"><b>: {{ $pp->warnapakaian }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 80px;">Sablon</p>
                                    <p class="m-0"><b>: {{ $pp->tipesablon }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <small class="mb-0" style="width: 80px;">Ukuran</small>
                                    <small class="m-0"><b>: {{ $pp->ukuran }}</b></small>
                                </div>
                                <div class="d-flex">
                                    <small class="mb-0" style="width: 80px;">P / L</small>
                                    <small class="m-0"><b>: {{ $pp->panjang }} / {{ $pp->lebar }}</b></small>
                                </div>
                            </td>
                            <td>{{ $pp->berat }}<small>.Gr</small> </td>
                            <td>Rp. {{ number_format($pp->harga) }}</td>
                            <td>{{ $pp->jumlah }}</td>
                            <td>Rp. {{ number_format($pp->totalharga) }}</td>
                        </tr>
                        <?php $subtotal += $pp->totalharga; ?>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr class="soft">
        </div>
        @endif

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
            <div class="alert alert-warning" role="alert" style="min-height: 230px;">
                <h4 class="alert-heading font-weight-bold">Info Pembayaran</h4>
                <p>Silahkan melakukan pembayaran melalui rekening, sebleum membayar pastika data benar dan sesuai dengan pesanan anda.</p>
                @foreach($bank as $dtbank)
                <div class="d-flex">
                    <p class="m-0 font-weight-bold wtext-2">BANK</p>
                    <p class="m-0 font-weight-bold">: {{ $dtbank->nama_bank }} ({{ $dtbank->deskripsi }})</p>
                </div>
                <div class="d-flex">
                    <p class="m-0 font-weight-bold wtext-2">No Rek</p>
                    <p class="m-0 font-weight-bold">: {{ $dtbank->nomor_rekening }}</p>
                </div>
                <div class="d-flex">
                    <p class="m-0 font-weight-bold">ATAS NAMA FLOSSPRINT.STORE</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
            <div class="alert alert-success" role="alert" style="min-height: 230px;">
                <h4 class="alert-heading">Princian Harga</h4>
                <div class="d-flex w-100">
                    <div class="d-block">
                        <h6 class="my-0 mb-0">Sub Harga</h6>
                        <small class="text-muted">Jumlah total harga Barang</small>
                    </div>
                    <p class="text-muted ml-auto mt-2 mb-0">Rp. <b class="ml-2"><?php echo number_format($subtotal); ?></b></p>
                </div>
                <div class="dropdown-divider"></div>
                <div class="d-flex w-100">
                    <div class="d-block">
                        <h6 class="my-0 mb-0">Ongkir</h6>
                        <small class="text-muted">Harga biaya pengiriman</small>
                    </div>
                    <p class="text-muted ml-auto mt-2 mb-0">Rp. <b class="ml-2"><?php echo number_format($ongkir); ?></b></p>
                </div>
                <div class="dropdown-divider"></div>
                <div class="d-flex w-100">
                    <div class="d-block">
                        <h6 class="my-0 mb-0">Grand Total</h6>
                        <small class="text-muted">Jumlah total harga</small>
                    </div>
                    <p class="text-muted ml-auto mt-2 mb-0">Rp. <b class="ml-2"><?php echo number_format($subtotal + $ongkir); ?></b></p>
                </div>
            </div>
        </div>

        <div class="col-12 mb-3">
            @if($pembelian->status === "pending")
            <a href="/user/pembayaran/nota/{{$pembelian->id_pembelian}}" class="btn btn-primary btn-lg">Proses Pembayaran</a>
            @else
            <a href="/user/pembayaran/detail/{{$pembelian->id_pembelian}}" class="btn btn-info btn-lg">Lihat Pembayaran</a>
            @endif
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="/user/tanggapan/produk" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tanggapan Produk</h5>
            </div>
            <div class="modal-body">
                <div class="d-block mb-3 text-center">
                    <button type="button" id="range-1" class="btn"><i class="fa fa-star" aria-hidden="true"></i></button>
                    <button type="button" id="range-2" class="btn"><i class="fa fa-star" aria-hidden="true"></i></button>
                    <button type="button" id="range-3" class="btn"><i class="fa fa-star" aria-hidden="true"></i></button>
                    <button type="button" id="range-4" class="btn"><i class="fa fa-star" aria-hidden="true"></i></button>
                    <button type="button" id="range-5" class="btn"><i class="fa fa-star" aria-hidden="true"></i></button>
                </div>
                <div class="d-block">
                    <input type="hidden" name="iduser" value="{{ auth('user')->user()->id }}">
                    <input type="hidden" name="rating" id="range-values" value="">
                    <input type="hidden" name="idproduk" id="idprodukvalues" value="">
                    <div class="form-group">
                        <textarea name="tanggapan" id="" rows="3" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Batalkan</button>
                <button type="submit" class="btn btn-primary">Yes, Tanggapi</button>
            </div>
        </form>
    </div>
</div>

@endsection