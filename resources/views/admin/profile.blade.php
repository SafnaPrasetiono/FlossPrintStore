@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Profile Admin</title>
@endsection

@section('content')
<div class="bg-secondary py-4 shadow mb-4">
    <div class="container py-0">
        <div class="text-center pt-2 pb-3">
            <form action="{{route('admin.profile.update.foto')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="d-block">
                        <div class="box-foto mx-auto">
                            <label for="file-input" class="btn-foto">
                                <i class="fa fa-upload text-light fa-2x" aria-hidden="true"></i>
                            </label>
                            <img src="{{ url('/images/admin/'. auth('admin')->user()->foto) }}" alt="user_photos" class="Responsive image rounded-circle mx-auto d-block" height="140px" width="140px" id="displayGambar">
                        </div>
                    </div>
                    <input type="file" name="fotoadmin" onchange="displayImage(this)" id="file-input">
                    <button type="submit" id="postpic" class="btn text-primary d-none mx-auto">Udate Foto</button>
                </div>
                <div class="form-group text-center mt-2 mb-0">
                    <h2 class="text-light text-capitalize">{{ auth('admin')->user()->nama_lengkap }}</h2>
                    <p class="m-0 text-white">{{ auth('admin')->user()->email }}</p>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form action="/admin/profile/update/data" method="POST" class="d-block bg-white px-2 py-2 rounded shadow">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="" class="lbl-input text-secondary">Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control input-profile" value="{{ auth('admin')->user()->nama_depan }}">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="" class="lbl-input text-secondary">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control input-profile" value="{{ auth('admin')->user()->nama_belakang }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="lbl-input text-secondary">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control input-profile" value="{{ auth('admin')->user()->nama_lengkap }}" readonly>
                </div>
                <div class="form-group">
                    <label for="" class="lbl-input text-secondary">Nomor Telepon</label>
                    <input type="text" name="telepon" class="form-control input-profile" value="{{ auth('admin')->user()->telepon }}">
                </div>
                <div class="form-group">
                    <label for="" class="lbl-input text-secondary">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control input-profile" value="{{ auth('admin')->user()->tgl_lahir }}">
                </div>
                <div class="form-gruop">
                    <button type="submit" class="btn btn-primary px-5">Ubah Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection