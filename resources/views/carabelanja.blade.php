@extends('layout.panel')

@section('title')
<title>FlossPrint - Cara belanja</title>
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

<div class="container py-5">
    <div class="row">

        <div class="col-12 mb-5 text-center">
            <h3 class="">Cara Berbelanja</h3>
            <p class="m-0">Layanan cara belanja pada website flossprint studio</p>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
            <ul class="" style="list-style-type:square">
                <li>
                    Pilih menu produk pada bagian navbar diatas, maka akan ditampilkan halaman produk
                </li>
                <li>
                    Setelah dialihkan ke-halaman produk, pilih salah satu produk untuk melihat detail produk tersebut.
                </li>
            </ul>
            <div class="d-flex">
                <img src="{{url('/images/cara/gambar1.png')}}" class="w-75 rounded mx-auto mb-2">
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
            <ul class="" style="list-style-type:square">
                <li>
                    Setelah dialihkan pada halaman detail produk, ada dapat menambahkan produk ke-keranjang. Sebelumnya pastikan informasi produk lengkap.
                </li>
                <li>
                    jika sudah yakin dengan pilihan maka masukan jumlah yang akan dibeli pada kolom jumlah, jika suda yakin klik tambahkan ke-keranjang.
                </li>
            </ul>
            <div class="d-flex">
                <img src="{{url('/images/cara/gambar2.png')}}" class="w-75 rounded mx-auto mb-2">
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
            <ul style="list-style-type:square">
                <li>
                    Produk yang akan dipesan masuk ke keranjang silahkan cek keranjang pada bagian atas navbar.
                </li>
                <li>
                    Pada bagin cart anda juga dapat menghapus pemesanan produk anda dengan klik button hapus
                </li>
                <li>
                    Anda dapat melihat keranjang dengan memilih button lihat keranjang, anda akan dialihkan ke-halaman keranjang
                </li>
            </ul>
            <div class="d-flex">
                <img src="{{url('/images/cara/gambar3.png')}}" class="w-75 rounded mx-auto mb-2">
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
            <ul class="" style="list-style-type:square">
                <li>
                    Pada halaman keranjang akan ditampilkan infromasi mengenai produk yang dipilih atau produk yang akan dibeli
                </li>
                <li>
                    Jika ingin batal beli adan bisa memilih tombol hapus pada keranjang, jika ingin menambah jumlah anda dapat memilih button plus dan minus.
                </li>
                <li>
                    Anda dapat melanjutkan belanja, jika ingin melanjutkan belanja silahkan klik tombol checkout,
                    anda akan diahlikan ke halaman login, apabila anda sudah melakukan login maka anda akan langsung
                    dialihkan ke halaman checkout untuk melanjutkan pembelian
                </li>
            </ul>
            <div class="d-flex">
                <img src="{{url('/images/cara/gambar4.png')}}" class="w-75 rounded mx-auto mb-2">
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
            <ul class="" style="list-style-type:square">
                <li>
                    Pada halaman checkout ini anda harus mengisi data dengan lengkap, dan pastikan kembali produk belanjaan anda.
                </li>
                <li>
                    Pastikan mengisi data alamat pengiriman anda dengan menggunakan Rt, Rw, dan No rumah. jika anda sudah yakin anda dapat memilih button checkout untuk proses pembayaran
                </li>
            </ul>
            <div class="d-flex">
                <img src="{{url('/images/cara/gambar5.png')}}" class="w-75 rounded mx-auto mb-2">
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
            <ul class="" style="list-style-type:square">
                <li>
                    Jika anda sudah mendapatkan nota terhadap pesanan anda tahap selanjutnya anda dapat melakukan proses pembayaran terhadap pemesanan anda.
                </li>
                <li>
                    Anda dapat memilih button proses bayar untuk melakukan proses pembayaran terhadap pemesanan anda.
                </li>
            </ul>
            <div class="d-flex">
                <img src="{{url('/images/cara/gambar6.png')}}" class="w-75 rounded mx-auto mb-2">
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
            <ul style="list-style-type:square">
                <li>
                    pada form pembayaran isi data anda dengan lengkap pastikan anda mengupload bukti pembayaran anda, untuk mengisi <i>field</i> harga tidak perlu menggunakan "." atau ",".
                </li>
                <li>
                    Setelah anda memproses pembayaran atas pemesanan anda tahap selanjutnya anda akan diberikan konfirmasi selanjutnya oleh admin.
                </li>
            </ul>
            <div class="d-flex">
                <img src="{{url('/images/cara/gambar7.png')}}" class="w-75 rounded mx-auto mb-2">
            </div>
        </div>

    </div>
</div>
@endsection