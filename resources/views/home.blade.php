@extends('layout.panel')

@section('title')
<title>FlossPrint - Home</title>
@endsection

@section('content')
<div id="carouselId" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1"></li>
        <li data-target="#carouselId" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img src="{{ url('/images/wallpaper/Flossprint_satu.jpg') }}" alt="First slide" width="100%" height="auto">
            <div class="carousel-caption d-none d-md-block">
                <h3>FlossPrint</h3>
                <p>Para pegawai profesional pada toko flossprint studio</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ url('/images/wallpaper/Flossprint_dua.jpg') }}" alt="Second slide" width="100%" height="auto">
            <div class="carousel-caption d-none d-md-block">
                <h3>FlossPrint</h3>
                <p>Toko penjualan pakaian terbaik indonesia</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ url('/images/wallpaper/Flossprint_tiga.jpg') }}" alt="Third slide" width="100%" height="auto">
            <div class="carousel-caption d-none d-md-block">
                <h3>FlossPrint</h3>
                <p>Toko pemesanan sablon terbaik indonesia</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container mt-3 py-3 py-sm-4 py-md-5 py-lg-5">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="text-dark text-uppercase mb-1">Belanja Baju</h2>
            <p class="text-secundary">FlossPrint menyediakan berbagai macam baju untuk keperluan anda sehari-hari.</p>
        </div>
    </div>
    <div class="row no-gutters mt-2">
        @foreach($dataproduk as $dp)
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3 px-2">
            <div class="card">
                <img class="card-img-top" src="{{ url('/images/produk/display/' . $dp->samplefoto) }}" alt="">
                <div class="card-body px-2 pt-2 pb-3">
                    <h5 class="card-title font-weight-bold text-capitalize text-truncate mb-1">
                        {{ $dp->namaproduk }}
                    </h5>
                    <p class="card-text text-danger m-0">Rp. {{ number_format($dp->harga) }}</p>
                </div>
                <a href="/produk/detail/{{ $dp->id_produk }}" class="stretched-link m-0"></a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="bg-secondary">
    <div class="container py-4">
        <div class="text-center">
            <h3 class="text-white text-uppercase">Login sekarang kembangkan kreatifitasmu dalam mendesain Pakaian</h3>
            <a href="/login" class="btn btn-light text-secondary px-5 py-2 mt-2">Login</a>
        </div>
    </div>
</div>

<div class="container mt-3 py-5">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="text-dark text-uppercase mb-1">Sablon Baju</h2>
            <p class="text-secundary">FlossPrint Studio menyediakan pelayanan terbaik untuk sablon pakaian.</p>
        </div>
    </div>
    <div class="row no-gutters">

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 px-2">
            <div class="card mb-3 overflow-hidden">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ url('/images/ExpSablon/bahan-pakaian.png') }}" class="card-img rounded-0" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body py-2 pl-3 pr-2">
                            <h5 class="card-title font-weight-bold">Bahan Pakaian</h5>
                            <p class="card-text">Bahan yang digunakan untuk pemesanan jasa sablon yaitu dengan menggunakan bahan katun.</p>
                            <a href="/sablon#bahan" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 px-2">
            <div class="card mb-3 overflow-hidden">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ url('/images/ExpSablon/sablon.jpg') }}" class="card-img rounded-0" alt="sablon">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body py-2 pl-3 pr-2">
                            <h5 class="card-title font-weight-bold">Sablon Pakaian</h5>
                            <p class="card-text">Teknik sablon yang digunakan dengan cara manual dengan tingkat kedetailan warna yang baik.</p>
                            <a href="/sablon#sablon" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 px-2">
            <div class="card mb-3 overflow-hidden">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ url('/images/ExpSablon/pakaian.png') }}" class="card-img rounded-0" alt="sablon">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body py-2 pl-3 pr-2">
                            <h5 class="card-title font-weight-bold">Ukuran Pakaian</h5>
                            <p class="card-text">Ukuran Pakaian yang digunakan berdasarkan panjang dan lebar pakaian dengan tingkatan ukuran yaitu S, M, XL, dan XLL.</p>
                            <a href="/sablon#size" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 px-2">
            <div class="card mb-3 overflow-hidden">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ url('/images/ExpSablon/harga.png') }}" class="card-img rounded-0" alt="sablon">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body py-2 pl-3 pr-2">
                            <h5 class="card-title font-weight-bold">Estimasi Harga Sablon</h5>
                            <p class="card-text">Estimasi harga pemesana jasa sablon ditentukan pada pemilihan bahan serta ukuran pakaian yang dipilih.</p>
                            <a href="/sablon#harga" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="d-block" style="background-color: rgb(230, 230, 230);">
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
@endsection