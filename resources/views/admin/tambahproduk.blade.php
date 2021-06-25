@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Tambah Produk</title>
<script src="{{ url('/dist/css/form-upload.css') }}"></script>
<script src="{{ url('/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                <h2 class="text-primary mb-0">Tambah Produk</h2>
                <p class="m-0">Pages Tambah Produk Baju</p>
            </div>
        </div>
    </div>

    <form action="/admin/produk/tambah/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" name="namaProduk" class="form-control @error('namaProduk') is-invalid @enderror" required value="{{ old('namaProduk') }}" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="">Harga Produk</label>
                        <input type="number" name="hargaProduk" class="form-control @error('hargaProduk') is-invalid @enderror" required value="{{ old('hargaProduk') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" name="jumlahProduk" class="form-control @error('jumlahProduk') is-invalid @enderror" required value="{{ old('jumlahProduk') }}">
                    </div>
                    <div class="from-group mb-3">
                        <label for="ukuran">Jenis Pakaian</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="jaket">Jaket</option>
                            <option value="sweater">Sweter</option>
                            <option value="baju">Baju</option>
                            <option value="celana">Celana</option>
                            <option value="topi">Topi</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="from-group col-6 col-sm-6 col-md-6 col-lg-3">
                            <label for="ukuran">Ukuran</label>
                            <select name="ukuran" id="ukuran" class="form-control" required>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3">
                            <label for="p">Panjang</label>
                            <input type="number" name="panjang" id="p" class="form-control" required>
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3">
                            <label for="l">Lebar</label>
                            <input type="number" name="lebar" id="l" class="form-control" required>
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3">
                            <label for="l">Berat *gr</label>
                            <input type="number" name="berat" id="l" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                    <div class="form-group">
                        <label>Sample Foto</label>
                        <label for="file-input" class="form-upload form-control">
                            <img src="{{ url('/Images/brangkas/upload.png') }}" alt="" id="displayGambar">
                        </label>
                        <input type="file" name="samplefoto" onchange="optImages(this)" id="file-input" required>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                    <div class="form-group">
                        <div class="d-flex">
                            <label class="py-1">foto produk</label>
                            <label for="files" class="click-btn btn btn-primary py-1 ml-auto">
                                Upload Gambar <i class="fa fa-upload fa-lg" aria-hidden="true"></i>
                            </label>
                        </div>
                        <div class="form-group">
                            <nav class="nav justify-content-center" id="gallery">
                            </nav>
                        </div>
                        <input type="file" name="fotoproduk[]" class="d-none gallery-photo-add" multiple id="files">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" id="editor1" class="form-control" rows="10" cols="80">{{ old('deskripsi') }}</textarea>
                        <script>
                            CKEDITOR.replace('editor1', {
                                removePlugins: 'image'
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-block bg-white rounded shadow mt-4 py-3 px-3">
                    <button name="submit" class="btn btn-primary btn-lg btn-block">Save Produk</button>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection