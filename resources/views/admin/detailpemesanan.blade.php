@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Detail Data Pemesanan Pelanggan</title>
<link rel="stylesheet" href="{{ url('/sweetalert/dist/sweetalert2.min.css') }}">
<script src="{{ url('/sweetalert/dist/sweetalert2.min.js') }}"></script>
<link rel="stylesheet" href="{{ url('/dist/css/nota.css') }}">
@endsection

@section('content')

<?php $no = 1; ?>
<?php $subtotal = 0; ?>
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow p-3">
                <h3 class="m-0">Detail Pemesanan Pelanggan</h3>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow p-3">
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Nota</p>
                    <p class="mb-0">: {{ $pembelian->id_pembelian }}</p>
                </div>
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Tipe</p>
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
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="row no-gutters bg-white rounded p-3">

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <h4 class="font-weight-bold">Pelanggan</h4>
                    <div class="d-flex">
                        <p class="mb-0 wtext-2 font-weight-bold">Nama</p>
                        <p class="mb-0">: {{ $pelanggan->nama_lengkap }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="mb-0 wtext-2 font-weight-bold">Email</p>
                        <p class="mb-0">: {{ $pelanggan->email }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="mb-0 wtext-2 font-weight-bold">telepon</p>
                        <p class="mb-0">: {{ $pelanggan->telepon }}</p>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h4 class="font-weight-bold">Pengiriman</h4>
                    <div class="d-flex">
                        <p class="mb-0 wtext-2 font-weight-bold">Provinsi</p>
                        <p class="mb-0">: {{ $pengiriman->provinsi }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="mb-0 wtext-2 font-weight-bold">Kota</p>
                        <p class="mb-0">: {{ $pengiriman->kota }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="mb-0 wtext-2 font-weight-bold pr-5 pb-3 pb-sm-auto pb-md-auto pb-lg-0">Alamat</p>
                        <p class="mb-0">: {{ $pengiriman->alamat }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="mb-0 wtext-2 font-weight-bold">Ongkir</p>
                        <p class="mb-0">: Rp. {{ number_format($pengiriman->harga) }}</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 mb-3">
            @if($pembelian->tipe === 'pemesanan-produk')
            <div class="bg-white rounded shadow p-2">
                <div class="table-responsive d-flex rounded">
                    <table class="table table-striped">
                        <thead class="bg-secondary text-white">
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
                            @foreach($pembelian_p as $pp)
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
                            <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            @foreach($pembelian_p as $pp)
            <div class="bg-white d-block rounded shadow p-2 mb-3">
                <div class="row no-gutters">
                    <div class="col-6">
                        <img src="{{ url('/images/sablon/' . $pp['foto_depan']) }}" width="100%" alt="...">
                        <br>
                        <a href="{{ url('/images/sablon/' . $pp['foto_depan']) }}" class="d-block text-center" download="">Download</a>
                    </div>
                    <div class="col-6">
                        <img src="{{ url('/images/sablon/'. $pp['foto_belakang']) }}" width="100%" alt="...">
                        <a href="{{ url('/images/sablon/'. $pp['foto_belakang']) }}" class="d-block text-center" download="">Download</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="bg-white rounded shadow p-2">
                <table class="table table-striped">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Berat</th>
                            <th>harga</th>
                            <th>jumlah</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelian_p as $pp)
                        <?php $subtotal += $pp->totalharga; ?>
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 125px;">Bahan Pakaian</p>
                                    <p class="m-0"><b>: {{ $pp->bahan }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 125px;">Warna Pakaian</p>
                                    <p class="m-0"><b>: {{ $pp->warnapakaian }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <p class="mb-0" style="width: 125px;">Tipe Sablon</p>
                                    <p class="m-0"><b>: {{ $pp->tipesablon }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <small class="mb-0" style="width: 125px;">Ukuran</small>
                                    <small class="m-0"><b>: {{ $pp->ukuran }}</b></small>
                                </div>
                                <div class="d-flex">
                                    <small class="mb-0" style="width: 125px;">P / L</small>
                                    <small class="m-0"><b>: {{ $pp->panjang }} / {{ $pp->lebar }}</b></small>
                                </div>
                            </td>
                            <td>{{ $pp->berat }}<small>.Gr</small> </td>
                            <td>Rp. {{ number_format($pp->harga) }}</td>
                            <td>{{ $pp->jumlah }}</td>
                            <td>Rp. {{ number_format($pp->totalharga) }}</td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

</div>
</div>
@endsection