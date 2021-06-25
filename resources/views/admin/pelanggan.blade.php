@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Costumers</title>
@endsection

@section('content')
<div class="container-fluid pt-3">
    <div class="row">

        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow p-3">
                <h3 class="text-primary text-uppercase mb-1">Pelanggan</h3>
                <p class="m-0">Halaman Data pelanggan flossprint Studio</p>
            </div>
        </div>
        <div class="col-12">
            <div class="d-block bg-white rounded shadow p-3">
                <div class="row no-gutters">
                    <div class="col-12 col-md-4 col-lg-4 order-sm-2">
                        <form action="/admin/pelanggan" method="GET" class="input-group">
                            <input type="text" name="srcuser" class="form-control border border-secondary border-right-0" placeholder="search..." />
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
                            Jumlah Data <span></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-white d-block rounded shadow p-2">
                <div class="table-responsive d-flex rounded">
                    <table class="table table-striped">
                        <thead class="bg-secondary text-white text-uppercase">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($pelanggan as $p)
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>{{ $p->nama_lengkap }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->telepon }}</td>
                                <td>{{ $p->alamat }}</td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-block">
                    {{ $pelanggan->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection