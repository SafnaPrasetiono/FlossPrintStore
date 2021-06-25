@extends('layout.panel')

@section('title')
<title>FlossPrint - Desain Produk</title>
<meta name="csrf-token-front" content="{{ csrf_token() }}" />
<meta name="csrf-token-back" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{ url('/dist/css/desainer.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Gugi&family=Lobster&family=Open+Sans:wght@300&family=Russo+One&family=Srisakdi&display=swap" rel="stylesheet">
<style>
    .controls {
        display: inline-block;
    }
    .loading {
        display: none;
        position: fixed;
        z-index: 99999;
        width: 100%;
        height: 100vh;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        padding: auto;
        background-color: rgb(240, 240, 240);
    }
    .loading .loader{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="row no-gutters">

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
            <ul class="nav nav-pills justify-content-center" id="MyTab" role="tablist">
                <li class="nav-item ml-auto" role="presentation">
                    <a class="nav-item nav-link active" id="front-t-shirt" data-toggle="pill" href="#pill-front" role="tab">
                        <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item mr-auto" role="presentation">
                    <a class="nav-item nav-link" id="back-t-shirt" data-toggle="pill" href="#pill-back" role="tab">
                        <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
                    </a>
                </li>
                <li id="remove" class="nav-item d-none" style="margin-left: -54px;">
                    <a href="#" class="nav-item nav-link text-danger" role="button">
                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pill-front">
                    <div id="canvasdesainerfront" class="desainer-editor">
                        <div class="baju canvas-background" style="background-color:#ffffff;">
                            <img src="{{ url('/images/desain/baju-depan.png') }}" class="image-background">
                        </div>
                        <div class="editor">
                            <canvas class="canvas-front" id="front-canvas">
                            </canvas>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pill-back">
                    <div id="canvasdesainerback" class="desainer-editor">
                        <div class="baju canvas-background" style="background-color:#ffffff;">
                            <img src="{{ url('/images/desain/baju-belakang.png') }}" class="image-background">
                        </div>
                        <div class="editor">
                            <canvas class="canvas-back" id="back-canvas">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="row no-gutters">
                <!-- secondary menus -->
                <div class="col-12 d-block d-sm-none d-md-none d-lg-none">
                    <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-center rounded-0 active" id="v-pills-color-tab" data-toggle="pill" href="#v-pills-color">
                                <i class="fa fa-paint-brush fa-2x p-2" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-center rounded-0" id="v-pills-upload-tab" data-toggle="pill" href="#v-pills-upload">
                                <i class="fa fa-upload fa-2x p-2" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-center rounded-0" id="v-pills-text-tab" data-toggle="pill" href="#v-pills-text">
                                <i class="fa fa-text-width fa-2x p-2" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-center menu-icons" id="v-pills-font-tab" data-toggle="pill" href="#v-pills-font">
                                <i class="fa fa-font fa-2x p-2" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- main menus -->
                <div class="col-12 col-sm-10 col-md-9 col-lg-10 border">
                    <div class="tab-content d-block p-3" id="v-pills-tabContent">
                        <!-- tools color tshirt -->
                        <div class="tab-pane fade show active" id="v-pills-color" role="tabpanel">
                            <div class="d-block">
                                <h5 class="m-0">Warna Pakaian</h5>
                                <hr class="soft">
                            </div>
                            <div class="row no-gutters">
                                <div class="col-2 p-1">
                                    <button type="button" class="color-pil btn-coloring bg-white" data-toggle="tooltip" title="Putih" hex="#FFFFFF">
                                    </button>
                                </div>
                                <div class="col-2 p-1">
                                    <button type="button" class="color-pil btn-coloring bg-danger" data-toggle="tooltip" title="Merah" hex="#FF0000" onchange="coloring(this)">
                                    </button>
                                </div>
                                <div class="col-2 p-1">
                                    <button type="button" class="color-pil btn-coloring bg-primary" data-toggle="tooltip" title="Biru" hex="#0000FF">
                                    </button>
                                </div>
                                <div class="col-2 p-1">
                                    <button type="button" class="color-pil btn-coloring bg-warning" data-toggle="tooltip" title="Kuning" hex="yellow">
                                    </button>
                                </div>
                                <div class="col-2 p-1">
                                    <button type="button" class="color-pil btn-coloring bg-success" data-toggle="tooltip" title="Hijau" hex="#008000">
                                    </button>
                                </div>
                                <div class="col-2 p-1">
                                    <button type="button" class="color-pil btn-coloring bg-dark" data-toggle="tooltip" title="Hitam" hex="#000000">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- tools upload desain -->
                        <div class="tab-pane fade" id="v-pills-upload" role="tabpanel">
                            <h5 class="mb-0 px-1">Upload Icon Desain</h5>
                            <hr class="soft">
                            <form id="uploadImg" runat="server">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="fotobrg" onchange="displayImage(this)" id="file-input" required>
                                    <label class="custom-file-label" for="imgUpload">Choose file</label>
                                </div>
                            </form>
                            <hr class="soft">
                        </div>
                        <!-- tools text -->
                        <div class="tab-pane fade" id="v-pills-text" role="tabpanel">
                            <div class="d-block">
                                <h5 class="m-0">Masukan Teks</h5>
                                <hr class="soft">
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" name="textInputs" id="textInputs" required>
                                <span class="input-group-prepend">
                                    <button class="btn btn-primary rounded-right" id="btntextinput" onclick="textInputs()">Input Text</button>
                                </span>
                            </div>
                            <hr class="soft">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="">Text Color</label>
                                    <input type="color" value="" id="text-color" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Stroke Color</label>
                                    <input type="color" value="" id="text-stroke" class="form-control">
                                </div>
                            </div>
                            <hr class="sot">
                            <div class="text-controls-additional">
                                <div class="form-check">
                                    <input type='checkbox' name='fonttype' id="text-cmd-bold" class="form-check-input">
                                    <label class="form-check-label" for="text-cmd-bold">
                                        Bold
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type='checkbox' name='fonttype' id="text-cmd-italic" class="form-check-input">
                                    <label class="form-check-label" for="text-cmd-italic">
                                        Italic
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type='checkbox' name='fonttype' id="text-cmd-underline" class="form-check-input">
                                    <label class="form-check-label" for="text-cmd-underline">
                                        Underline
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type='checkbox' name='fonttype' id="text-cmd-linethrough" class="form-check-input">
                                    <label class="form-check-label" for="text-cmd-linethrough">
                                        Linethrough
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type='checkbox' name='fonttype' id="text-cmd-overline" class="form-check-input">
                                    <label class="form-check-label" for="text-cmd-overline">
                                        Overline
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- tools font -->
                        <div class="tab-pane fade" id="v-pills-font" role="tabpanel">
                            <div class="d-block">
                                <h5 class="m-0">Text Style</h5>
                                <hr class="soft">
                            </div>
                            <div class="row no-gutters">
                                <div class="col-4 px-1 mb-2">
                                    <button class="text-style btn btn-light btn-block rounded-0" text="'Open Sans', sans-serif" style="font-family: 'Open Sans', sans-serif;">Sample</button>
                                </div>
                                <div class="col-4 px-1 mb-2">
                                    <button class="text-style btn btn-light btn-block rounded-0" text="'Black Ops One', cursive" style="font-family:'Black Ops One', cursive;">Sample</button>
                                </div>
                                <div class="col-4 px-1 mb-2">
                                    <button class="text-style btn btn-light btn-block rounded-0" text="'Gugi', cursive" style="font-family: 'Gugi', cursive;">Sample</button>
                                </div>
                                <div class="col-4 px-1 mb-2">
                                    <button class="text-style btn btn-light btn-block rounded-0" text="'Lobster', cursive" style="font-family: 'Lobster', cursive;">Sample</button>
                                </div>
                                <div class="col-4 px-1 mb-2">
                                    <button class="text-style btn btn-light btn-block rounded-0" text="'Russo One', sans-serif" style="font-family: 'Russo One', sans-serif;">Sample</button>
                                </div>
                                <div class="col-4 px-1 mb-2">
                                    <button class="text-style btn btn-light btn-block rounded-0" text="'Srisakdi', cursive" style="font-family: 'Srisakdi', cursive;">Sample</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- menus utama -->
                <div class="col-4 col-sm-2 col-md-3 col-lg-2 border d-none d-sm-block d-md-block d-lg-block">
                    <div class="nav flex-column nav-pills d-block" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link text-center rounded-0 active" id="v-pills-color-tab" data-toggle="pill" href="#v-pills-color">
                            <i class="fa fa-paint-brush fa-2x py-3" aria-hidden="true"></i>
                        </a>
                        <a class="nav-link text-center rounded-0" id="v-pills-upload-tab" data-toggle="pill" href="#v-pills-upload">
                            <i class="fa fa-upload fa-2x py-3" aria-hidden="true"></i>
                        </a>
                        <a class="nav-link text-center rounded-0" id="v-pills-text-tab" data-toggle="pill" href="#v-pills-text">
                            <i class="fa fa-text-width fa-2x py-3" aria-hidden="true"></i>
                        </a>
                        <a class="nav-link text-center menu-icons" id="v-pills-font-tab" data-toggle="pill" href="#v-pills-font">
                            <i class="fa fa-font fa-2x py-3" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-12 border">
                    <div class="d-block p-2">
                        @if(session('cart'))
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#failed-proses">
                            PROSES
                        </button>
                        @else
                        <button class="btn btn-primary btn-lg btn-block" id="procesed">PROSES</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="bg-secondary">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center text-white d-block">
                    <h4 class="">Sudah Memiliki Desain Sendiri Proses Disini</h4>
                    @if(session('cart'))
                    <button type="button" class="btn btn-light btn-lg px-5 mt-3" data-toggle="modal" data-target="#failed-proses">
                        UPLOAD DESAIN
                    </button>
                    @else
                    <a href="/pemesanan/sablon" class="btn btn-light btn-lg px-5 mt-3">UPLOAD DESAIN</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white py-3">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                <h5 class="text-dark">Tips Desain Pakaian</h5>
                <p class="text-dark">Bentuk dari sebuah desain pakaian sangat mempengaruhi keindahan pakaian itu sendiri. Mendesainlah dengan cara yang unik, seperti mendesain yang mudah dibaca dari kejauhan. Hindari desain baju yang sangat monoton atau terlalu banyak desain dapat mempengaruhi keindahan pakaian itu sendiri. Jangan takut untuk bereksperimen mulailah desain sablon pakaian anda dengan klik menu desain.</p>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                <h5 class="text-dark">Tips Memilih Warna Pakaian</h5>
                <p class="text-dark">Dalam mendesain sablon baju pemilihan warna menjadi salah satu faktor utama seperti yang diketahui bahwa setiap warna menunjukkan kesan yang berbeda-beda. Gunakanlah warna yang sangat familiar seperti warna netral atau dengan meminimalisir pilihan warna pakaian anda. Jangan takut untuk bereksperimen mulailah desain sablon pakaian anda dengan klik menu desain.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="failed-proses">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-3">
            <div class="modal-body text-center">
                <i class="fa fa-exclamation-triangle fa-4x my-2 text-danger" aria-hidden="true"></i>
                <p class="mb-3 p-2">
                    Maff, desain tidak dapat di proses <br>
                    anda sedang dalam pemesanan produk
                </p>
                <button type="button" class="btn btn-primary px-5" data-dismiss="modal" aria-label="Close">
                    Oke
                </button>
            </div>
        </div>
    </div>
</div>

<div class="loading" id="loading-render">
    <div class="loader d-block text-center">
        <div class="spinner-border" role="status">
        </div>
        <p class="my-3">Tunggu sebentar...</p>
    </div>
</div>
@endsection