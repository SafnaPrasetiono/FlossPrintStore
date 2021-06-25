@extends('layout.panel')

@section('title')
<title>FlossPrint - Profile</title>
<link rel="stylesheet" href="{{ url('/dist/css/profile.css') }}">
@endsection

@section('content')

<?php $x = 0; ?>
@foreach($pembelian as $notify)
@if($notify->status != 'pending' and $notify->status != 'sudah-bayar')
<?php $x++; ?>
@endif
@endforeach

<div class="container py-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-5 col-lg-4 mb-4">
            <div class="d-block bg-white rounded shadow overflow-hidden">
                <div class="bg-light d-block py-4">
                    <form action="/user/profile/updatefoto" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="d-block">
                                <div class="box-foto mx-auto">
                                    <label for="file-input" class="btn-foto">
                                        <i class="fa fa-upload text-primary fa-2x" aria-hidden="true"></i>
                                    </label>
                                    <img src="{{ url('/images/user/' . auth('user')->user()->foto) }}" alt="user_photos" class="Responsive image rounded-circle mx-auto d-block" height="200px" width="200px" id="displayGambar">
                                </div>
                            </div>
                            <input type="file" name="fotouser" onchange="displayImageUP(this)" id="file-input">
                            <button type="submit" id="postpic" class="d-none mx-auto">Udate Foto</button>
                        </div>
                        <div class="form-group text-center mt-4 mb-4">
                            <h3 class="text-dark text-capitalize mb-0">{{ auth('user')->user()->nama_lengkap }}</h3>
                            <p class="m-0 text-dark">{{ auth('user')->user()->email }}</p>
                        </div>
                    </form>
                </div>
                <div class="bg-white d-block">
                    <div class="list-group list-group-flush">
                        <a href="/user/profile" class="list-group-item list-group-item-action">PROFILE</a>
                        <a href="/user/riwayat-belanja" class="list-group-item list-group-item-action active">RIWAYAT BELANJA</a>
                        <a href="/user/notifikasi/" class="list-group-item list-group-item-action">
                            NOTIFIKASI
                            <span class="badge badge-light badge-pill float-right"><?php echo $x; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-7 col-lg-8">
            <div class="d-block bg-white rounded shadow p-3">
                <div class="row no-gutters">
                    <div class="col-12">
                        <h3 class="text-dark mb-1">Riwayat Belanja</h3>
                        <hr class="soft">
                    </div>
                    <div class="col-12 table-responsive">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe</th>
                                        <th>Tanggal</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($pembelian as $pbl)
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>{{ $pbl->tipe }}</td>
                                        <td>{{ $pbl->tanggal }}</td>
                                        <td>Rp. {{ number_format($pbl->harga) }}</td>
                                        <td>
                                            <p class="mb-1 text-capitalize font-weight-bold">{{ $pbl->status }}</p>
                                            @if($pbl->status === 'dikirim')
                                            <div class="d-flex">
                                                <p class="mb-0 mr-1">Layanan</p> : <span class="text-uppercase ml-1"> {{ $pbl->expedisi }}</span>
                                            </div>
                                            <div class="d-block">
                                                <p class="mb-0">Resi</p>
                                                {{ $pbl->resi }}
                                            </div>
                                            @elseif($pbl->status === 'proses-sablon')
                                            <div class="d-flex">
                                                <b class="m-0">Sablon sedang diproses</b>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/user/pembelian/nota/{{ $pbl->id_pembelian }}" class="btn btn-info">
                                                Nota
                                            </a>
                                            <br>
                                            @if($pbl->status === "pending")
                                            <a href="/user/pembayaran/nota/{{ $pbl->id_pembelian }}" class="btn btn-primary">
                                                Bayar
                                            </a>
                                            @elseif($pbl->status === "anjuran-bayar-lunas")
                                            <a href="/user/pembayaran/nota/{{ $pbl->id_pembelian }}" class="btn btn-warning">
                                                Bayar Tagihan
                                            </a>
                                            <a href="/user/pembayaran/detail/{{ $pbl->id_pembelian }}" class="btn btn-primary">
                                                Lihat Pembayaran DP
                                            </a>
                                            @else
                                            <a href="/user/pembayaran/detail/{{ $pbl->id_pembelian }}" class="btn btn-primary">
                                                Lihat Pembayaran
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection