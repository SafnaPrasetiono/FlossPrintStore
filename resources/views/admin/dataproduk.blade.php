@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Data Produk</title>
<!-- messages -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-12 mt-3">
            <div class="d-block bg-white rounded shadow py-3 px-3">
                <h2 class="text-primary mb-0">Data Produk</h2>
                <p class="m-0">Halaman Data Produk</p>
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="d-block bg-white rounded shadow p-3">
                <div class="row">

                    <div class="col-12 col-md-4 col-lg-4 order-sm-2">
                        <form action="/admin/produk/data" method="GET" class="input-group">
                            <input type="text" name="srcproduk" class="form-control border border-secondary border-right-0" placeholder="search..." />
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary border-left-0" type="submit" id="button-addon2">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8 order-sm-1">
                        <p class="text-dark pt-2 mb-0 text-capitalize font-weight-bold">
                            <i class="fa fa-cubes mr-2" aria-hidden="true"></i>
                            Jumlah Data <span>{{ $jumlah_data }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="d-block bg-white rounded shadow p-2">
                <div class="table-responsive d-flex rounded">
                    <table class="table table-striped">
                        <thead class="bg-secondary text-white text-uppercase">
                            <tr>
                                <th>No</th>
                                <th>Nama produk</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Size</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; ?>
                            @foreach($produk as $pk)
                            <tr>
                                <td><?php echo $number; ?></td>
                                <td>{{ $pk->namaproduk }}</td>
                                <td>{{ $pk->stok }}</td>
                                <td>Rp. {{ number_format($pk->harga) }}</td>
                                <td class="text-capitalize">{{ $pk->ukuran }}</td>
                                <td>
                                    <img src="{{ url('/images/produk/display/' . $pk->samplefoto) }}" alt="..." class="rounded" width="82px">
                                </td>
                                <td>
                                    <!-- <a href="#" class="btn btn-primary text-white" type="button" data-toggle="tooltip" data-placement="top" title="Detail Produk">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a> -->
                                    <a href="/admin/produk/ubah/{{ $pk->id_produk }}" class="btn btn-light box-icon-2 text-warning border border-warning" type="button" data-toggle="tooltip" data-placement="top" title="Update Produk">
                                        <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <a href="/admin/produk/hapus/{{ $pk->id_produk }}" class="btn btn-light box-icon-2 text-danger border border-danger" type="button" data-toggle="tooltip" data-placement="top" title="Hapus Produk">
                                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $number++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="d-block bg-white rounded shadow py-3 px-3">
                {{ $produk->links() }}
            </div>
        </div>

    </div>
</div>

@endsection