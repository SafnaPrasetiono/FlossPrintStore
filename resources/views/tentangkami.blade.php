@extends('layout.panel')

@section('title')
<title>FlossPrint - About FlossPrint</title>
<style>
    .img-pass {
        width: 100%;
        margin-top: -134px;
        margin-bottom: -80px;
    }

    @media(max-width: 992px) {
        .img-pass {
            width: 100%;
            margin-top: -40px !important;
            margin-left: auto;
            margin-right: auto;
        }
    }

    @media(max-width: 767px) {
        .img-pass {
            width: 75%;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>
@endsection

@section('content')
<div class="bg-warning py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 pt-3 pb-4">
                <div class="text-center">
                    <div class="d-block mb-3 py-0">
                        <img src="{{ url('/images/logo/LOGO.png') }}" alt="logo" width="140px" class="rounded-circle">
                    </div>
                    <h2 class="text-dark logos">FlossPrint</h2>
                    <p class="m-0">Toko FlossPrint Studio Sablon Indonesia</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 mb-4">
    <div class="row">
        <div class="col-12">
            <div class="text-center mb-4">
                <h2 class="text-dark">Tentang Kami</h2>
                <p>Penjelasan singkat tentang toko flossprint studio</p>
            </div>
        </div>
        <div class="col-12">
            <p>FlossPrint Studio merupakan sebuah usaha yang bergerak dibidang konveksi khususnya dalam penjualan dan pembuatan kaos sablon. Proses pembuatan kaos yaitu dengan membuat kaos sesuai dengan pemesanan konsumen yang dapat diberikan label produk sesuai dengan pemesanan konsumen. Tidak hanya itu konsumen juga dapat berbelanja kaos yang telah disediakan dalam toko FlossPrint Studio.</p>
        </div>
        <div class="col-12">
            <p>Toko FlossPrint Studio berdiri sejak tahun 2016, pada saat itu masih merupakan toko sablon biasa. seiring dengan berjalannya waktu kini toko flossprint menjadi lebih dikenal banyak pelanggan. Meskipun toko flossprint masih menggunakan teknik manual dalam pembuatan sablon baju namun memiliki kualitas yang sangat tinggi.</p>
        </div>
        <div class="col-12">
            <p>Hingga kini perusahaan kami berkembang sangat pesat, olehkarnanya kami membuat website flossprint ini untuk mempermudah dalam pemesanan jasa sablon pakaian serta berbelanja pakaian. semoga dengan adanya website ini dapat membantu para pelanggan di toko kami.</p>
        </div>
    </div>
</div>

<div class="bg-secondary">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-4 text-center mb-3">
                <img src="{{ url('/images/wallpaper/director.png') }}" alt="Director" class="img-pass">
            </div>
            <div class="col-12 col-md-7 col-lg-8 text-white">
                <h5>Yudi, FlossPrint</h5>
                <p>Yudi merupakan pendiri toko flossprint studio. awal karir iya memiliki sebuah ide untuk membuat toko jasa pembuatan sablon baju. iya memulai pada tahun 2016, pada saat itu iya masih belajar bagaimana cara membuat sablon. seiring dengan pengetahuan yang iya miliki membuat iya mahir dalam profesi yang iya jalani. hingga kini iya membuat toko flossprint menjadi lebih dikenal banyak orang.</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <h2 class="text-center">Foto Toko FlossPrint</h2>
                <p>Berikut ini merupakan foto-foto toko flossprint studio</p>
            </div>
        </div>
        <div class="col-12">
            <div class="row no-gutters">
                <?php for ($x = 1; $x <= 6; $x++) : ?>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 px-2 mb-2">
                        <img src="{{ url('/images/about/images-' . $x . '.jpg') }}" alt="fotos-thumbnail-{{$x}}" class="img-thumbnail">
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <h2 class="text-dark">Lokasi Toko Flossprint</h2>
                <p>Berikut ini merupakan peta atau alamat toko flossprint studio</p>
            </div>
        </div>
        <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.601263374766!2d106.8631339147689!3d-6.1840853955229855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4f80c950f83%3A0xe7bd107a157980e8!2sFlossprint%20studio%20sablon!5e0!3m2!1sid!2sid!4v1585316854360!5m2!1sid!2sid" class="d-block w-100 rounded border-0 shadow" height="480" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</div>
@endsection