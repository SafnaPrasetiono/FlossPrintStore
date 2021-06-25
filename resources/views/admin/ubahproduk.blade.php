@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Ubah Produk</title>
<!-- messages -->
<link rel="stylesheet" href="{{ url('/sweetalert/dist/sweetalert2.min.css') }}">
<script src="{{ url('/sweetalert/dist/sweetalert2.min.js') }}"></script>
<script src="{{ url('/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')


<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <div class="d-block bg-white rounded shadow p-3">
                <h2 class="text-primary mb-0">Ubah Produk</h2>
                <p class="m-0">Halaman Ubah Data Produk</p>
            </div>
        </div>
    </div>
    @foreach($produk as $pk)
    <form action="/admin/produk/ubah/update" method="POST" enctype="multipart/form-data">
        <div class="row">

            @csrf
            <input type="hidden" name="idproduk" value="{{ $pk->id_produk }}">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" name="namaProduk" class="form-control @error('namaProduk') is-invalid @enderror" required value="{{ $pk->namaproduk }}">
                    </div>
                    <div class="form-group">
                        <label for="">Harga Produk</label>
                        <input type="number" name="hargaProduk" class="form-control @error('hargaProduk') is-invalid @enderror" required value="{{ $pk->harga }}">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" name="jumlahProduk" class="form-control @error('jumlahProduk') is-invalid @enderror" required value="{{ $pk->stok }}">
                    </div>
                    <div class="from-group mb-3">
                        <label for="jenis">Jenis Pakaian</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="jaket" @if($pk->jenis == 'jaket') selected @endif >Jaket</option>
                            <option value="sweter" @if($pk->jenis == 'sweter') selected @endif >Sweter</option>
                            <option value="baju" @if($pk->jenis == 'baju') selected @endif >Baju</option>
                            <option value="celana" @if($pk->jenis == 'celana') selected @endif >Celana</option>
                            <option value="topi" @if($pk->jenis == 'topi') selected @endif >Topi</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="from-group col-6 col-sm-6 col-md-3 col-lg-3">
                            <label for="ukuran">Ukuran</label>
                            <select name="ukuran" id="ukuran" class="form-control" required>
                                <option value="S" @if($pk->ukuran == 'S') selected @endif >S</option>
                                <option value="M" @if($pk->ukuran == 'M') selected @endif >M</option>
                                <option value="L" @if($pk->ukuran == 'L') selected @endif >L</option>
                                <option value="XL" @if($pk->ukuran == 'XL') selected @endif >XL</option>
                                <option value="XXL" @if($pk->ukuran == 'XXL') selected @endif >XXL</option>
                            </select>
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-3 col-lg-3">
                            <label for="p">Panjang</label>
                            <input type="number" name="panjang" id="p" class="form-control @error('panjang') is-invalid @enderror" required value="{{ $pk->panjang }}">
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-3 col-lg-3">
                            <label for="l">Lebar</label>
                            <input type="number" name="lebar" id="l" class="form-control @error('lebar') is-invalid @enderror" required value="{{ $pk->lebar }}">
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-3 col-lg-3">
                            <label for="b">Berat</label>
                            <input type="number" name="berat" id="b" class="form-control @error('berat') is-invalid @enderror" required value="{{ $pk->berat }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                    <div class="form-group">
                        <label>Sample Foto</label>
                        <label for="file-input" class="form-upload form-control">
                            <img src="{{ url('/images/produk/display/'. $pk->samplefoto ) }}" alt="" id="displayGambar">
                        </label>
                        <input type="file" name="samplefoto" onchange="displayImagesUpdate(this)" id="file-input">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" id="editor1" class="form-control" rows="10" cols="80">
                        {{ $pk->deskripsi }}
                        </textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            CKEDITOR.replace('editor1', {
                                removePlugins: 'image'
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Update Produk</button>
                </div>
            </div>

        </div>
    </form>
    @endforeach


    <div class="row">
        <div class="col-12">
            <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                <div class="form-group">
                    <form action="/admin/produk/ubah/fotoproduk/tambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="idproduk" class="d-none" value="{{ $pk->id_produk }}">
                        <div class="d-flex">
                            <label class="py-1">foto produk</label>
                            <label for="files-foto" class="click-btn btn btn-primary py-1 ml-auto">
                                <i class="fa fa-upload fa-lg" aria-hidden="true"></i>
                            </label>
                            <input type="file" name="fotoprodukmultiple[]" class="d-none gallery-photo-add" multiple id="files-foto" onchange="proceseduploadfoto(this)">
                            <input type="submit" name="uploadfoto" id="prosesuploadfoto" class="d-none">
                        </div>
                    </form>
                    <div class="form-group">
                        <nav class="nav justify-content-center" id="gallery">
                            @foreach( $fotoproduk as $ftpk )
                            <li class="pip nav-link">
                                <img src="{{ url('/images/produk/'. $ftpk->lokasi ) }}" alt="..." class="imageThumb">
                                <a href="/admin/produk/ubah/fotoproduk/hapus/{{ $ftpk->id_fotoproduk }}" class="remove btn btn-danger px-2 py-1">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </li>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- pesan gagal bila upload bukan foto -->
<!-- messages for success or failed processed -->
@if(Session::has('tambahfoto'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ Session::get("tambahfoto") }}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@elseif(Session::has('deletefoto'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ Session::get("deletefoto") }}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@elseif(Session::has('faildeletefoto'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Upload Gagal!',
        text: '{{ Session::get("faildeletefoto") }}',
        showConfirmButton: true,
    });
</script>
@elseif(Session::has('images'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Upload Gagal!',
        text: '{{ Session::get("images") }}',
        showConfirmButton: true,
    });
</script>
@elseif(Session::has('successupdate'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ Session::get("successupdate") }}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@endsection