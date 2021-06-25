@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Data Pemesanan Pelanggan</title>
<link rel="stylesheet" href="{{ url('/sweetalert/dist/sweetalert2.min.css') }}">
<script src="{{ url('/sweetalert/dist/sweetalert2.min.js') }}"></script>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">

        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow p-3">
                @if($tipe == "pemesanan-produk")
                <h3 class="mb-0 text-uppercase">pemesanan produk</h3>
                <p class="mb-0">Halaman data pemesanan produk</p>
                @elseif($tipe == "pemesanan-sablon")
                <h3 class="mb-0 text-uppercase">pemesanan sablon</h3>
                <p class="mb-0">Halaman data pemesanan sablon</p>
                @elseif($tipe == "pemesanan")
                <h3 class="mb-0 text-uppercase">pemesanan</h3>
                <p class="mb-0">Halaman data pemesanan</p>
                @else
                <h3 class="mb-0 text-uppercase">PEMESANAN</h3>
                <p class="mb-0">Halaman data pemesanan</p>
                @endif
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="d-block bg-white rounded shadow p-3">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 mb-4 mb-sm-0 mb-lg-0">
                        <p class="text-dark pt-2 mb-0 text-capitalize font-weight-bold">
                            <i class="fa fa-cubes mr-2" aria-hidden="true"></i>
                            Jumlah Data <span>{{ count($pemesanan) }}</span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 order-sm-2">
                        <form action="/admin/pemesanan/data" method="GET">
                            <div class="input-group">
                                @if(isset($_GET['tipe']))
                                <input type="hidden" name="tipe" value="{{$_GET['tipe']}}">
                                @endif
                                <input type="text" name="srcpemesanan" class="form-control" placeholder="search..." />
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/admin/pemesanan/data?tipe=pemesanan-produk">Pemesanan Produk</a>
                                        <a class="dropdown-item" href="/admin/pemesanan/data?tipe=pemesanan-sablon">Pemesanan Sablon</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/admin/pemesanan/data?tipe=pemesanan">Semua Pemesanan</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="bg-white rounded shadow p-2">
                <div class="table-responsive d-flex rounded">
                    <table class="table table-striped">
                        <thead class="bg-secondary text-white text-uppercase">
                            <tr>
                                <th>No</th>
                                <th>pelanggan</th>
                                <th>Tipe</th>
                                <th>Tanggal</th>
                                <th>Satatus</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            @foreach($pemesanan as $data)
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->tipe }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->status }}</td>
                                <td>Rp. {{ number_format($data->harga)}}</td>
                                <td>
                                    <a href="/admin/pemesanan/pelanggan/detail/{{ $data->id_pembelian }}" class="btn btn-light box-icon-2 border text-info border-info" type="button" data-toggle="tooltip" data-placement="top" title="detail">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    @if( $data->status === 'sudah-bayar' or $data->status === 'proses' or $data->status === 'dikirim' or $data->status === 'sudah-bayar-uang-muka' or $data->status === 'proses-sablon-tahap-awal' or $data->status === 'proses-sablon' or $data->status === 'anjuran-bayar-lunas' or $data->status === 'sudah-bayar-tagihan' or $data->status === 'selesai')
                                    <a href="/admin/pemesanan/pelanggan/pembayaran/{{ $data->id_pembelian }}" class="btn btn-light box-icon-2 border text-warning border-warning" type="button" data-toggle="tooltip" data-placement="top" title="proses">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            <?php $x++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if($pemesanan->links() !== 0)
        <div class="col-12 mt-3">
            <div class="d-block bg-white rounded shadow py-3 px-3">
                {{ $pemesanan->links() }}
            </div>
        </div>
        @endif

    </div>
</div>
@endsection