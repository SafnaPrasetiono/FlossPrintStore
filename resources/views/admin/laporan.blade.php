@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Laporan</title>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow p-3">
                <h3 class="text-uppercase m-0">Laporan</h3>
                <p class="m-0">Halaman Laporan Flossprint</p>
            </div>
        </div>
        <div class="col-12 mb-3">
            <form action="/admin/laporan/data" method="GET" class="bg-white rounded shadow p-3">
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="mulai">Tanggal Mulai</label>
                        <input type="date" name="tglmulai" id="mulai" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="akhir">Tanggal Akhir</label>
                        <input type="date" name="tglakhir" id="akhir" class="form-control">
                    </div>
                    <div class="form-group col-12">
                        <label for="pms">Jenis Pemesanan</label>
                        <select name="jenis" id="pms" class="form-control" required>
                            <option value="belanja-produk">PEMESANAN PRODUK</option>
                            <option value="pemesanan-sablon">PEMESANAN SABLON</option>
                            <option value="pemesanan-semua">SEMUA PEMESANAN</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <button class="btn btn-primary form-control">PROSES DATA</button>
                    </div>
                </div>
            </form>
        </div>
        @if(isset($datalaporan))
        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow p-3">
                <div class="table-responsive d-block w-100 rounded">
                    <table class="table table-striped m-0 p-0">
                        <thead class="bg-secondary text-white text-uppercase">
                            <tr>
                                <th>No</th>
                                <th>pelanggan</th>
                                <th>Tipe</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            <?php $total = 0; ?>
                            @foreach($datalaporan as $data)
                            <?php $total += $data->harga; ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->tipe }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->status }}</td>
                                <td>Rp. {{ number_format($data->harga)}}</td>
                            </tr>
                            <?php $x++; ?>
                            @endforeach
                            <tr class="bg-secondary text-white">
                                <td colspan="5" class="text-uppercase">Total Pendapatan</td>
                                <td>Rp. <?php echo number_format($total); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="d-flex bg-white rounded shadow p-3">
                <a href="/admin/laporan/cetak/pdf/data?tglmulai=<?php echo $_GET['tglmulai'] ?>&tglakhir=<?php echo $_GET['tglakhir'] ?>&jenis=<?php echo $_GET['jenis'] ?>" class="btn btn-danger ml-1"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Save to PDF</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection