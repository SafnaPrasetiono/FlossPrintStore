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
                        <a href="/user/profile/" class="list-group-item list-group-item-action active">PROFILE</a>
                        <a href="/user/riwayat-belanja/" class="list-group-item list-group-item-action">RIWAYAT BELANJA</a>
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
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="d-block">
                            <h4 class="m-0">PROFILE</h4>
                            <hr class="soft">
                        </div>
                        <form action="/user/profile/updatedata" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="text-primary lbl-input">Nama Depan</label>
                                        <input type="text" name="nama_depan" class="form-control input-profile" value="{{ auth('user')->user()->nama_depan }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="text-primary lbl-input">Nama Belakang</label>
                                        <input type="text" name="nama_belakang" class="form-control input-profile" value="{{ auth('user')->user()->nama_belakang }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-primary lbl-input">Nama Lengkap</label>
                                <input type="text" class="form-control input-profile" value="{{ auth('user')->user()->nama_lengkap }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-primary lbl-input">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control input-profile" value="{{ auth('user')->user()->tgl_lahir }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-primary lbl-input">Nomor Telepon</label>
                                <input type="text" name="tlp" class="form-control input-profile" value="{{ auth('user')->user()->telepon }}">
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary ml-auto px-5">Update Profile</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <div class="d-block">
                            <h4 class="m-0">ALAMAT USER</h4>
                            <hr class="soft">
                        </div>
                        <form action="">
                            <div class="form-group">
                                <label for="" class="text-primary lbl-input">Alamat</label>
                                <textarea name="alamat" id="" class="form-control" cols="30" rows="4">{{ auth('user')->user()->alamat }}</textarea>
                                <div class="invalid-feedback d-block">
                                    Alamat harus menggunakan Rt & Rw berserta nomor rumah
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-warning text-white ml-auto px-5">Ubah Alamat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection