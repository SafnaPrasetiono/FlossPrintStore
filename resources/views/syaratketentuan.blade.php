@extends('layout.panel')

@section('title')
<title>FlossPrint - Syarat dan Ketentuan FlossPrint</title>
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
            <h3 class="">Syarat & Ketentuan</h3>
            <p class="m-0">Persyaratan serta ketentuan pada website flossprint</p>
        </div>

        <div class="col-12 mb-3">
            <div class="d-flex">
                <i class="fa fa-shopping-bag fa-2x mr-3" aria-hidden="true"></i>
                <h4 class="my-1">Berbelanja</h4>
            </div>
            <hr class="soft">
            <p class="m-0">
                <ol>
                    <li>
                        pastikan produk yang hendak dibeli memiliki infomasi yang lengkap, cek kembali produk yang
                        hendak akan diorder.
                    </li>
                    <li>
                        Berbelanja di FlossPrint tidak dibatasi dengan jumlah, pelanggan bebas dalam berbelanja produk pakaian.
                    </li>
                    <li>
                        Produk yang telah dibeli dapat ditukar kembali apabila terjadi kesalahan teknis baik dalam pengiriman atau kondisi barang yang memang rusak, dengan cara menghubungi pada kontak yang telah disediakan.
                    </li>
                    <li>
                        Penukaran produk dapat dilakukan selama satu hari proses pengiriman, apabila lebih dari satu hari maka proses penukaran produk tidak dapat dilakukan. Terkecuali terdapat perjanjian yang disahkan pada admin.
                    </li>
                    <li>
                        Kami telah menyediakan layanan bantuan yang dapat dihubungi, jika terdapat kesalahan teknis pada saat mengorder barang silahkan hubungi kami melalui kontak yang telah disediakan.
                    </li>
                </ol>
            </p>
        </div>

        <div class="col-12 mb-3">
            <div class="d-flex">
                <i class="fa fa-paint-brush fa-2x mr-3" aria-hidden="true"></i>
                <h4 class="my-1">Pemesanan Sablon</h4>
            </div>
            <hr>
            <div>
                <ol>
                    <li>
                        Pelanggan dapat mendesain sablon pakaian melalui halaman desain yang telah disediakan oleh flossprint studio.
                    </li>
                    <li>
                        Jika pelanggan sudah mempunyai desain, pelanggan dapat mengupload desain pakaian melalui halaman desain yang telah disediakan oleh flossprint studio.
                    </li>
                    <li>
                        Desain sablon akan dikenakan biaya sebesar Rp. 75.000 per pakaian baik berwarna maupun tidak berwarna.
                    </li>
                    <li>
                        Pemesanan jasa sablon kurang dari 50 pakaian akan diproses selama 5hari. kurang dari 150 akan diproses selama 10hari. jika lebih dari 150 pakaian akan diinfokan melalui email.
                    </li>
                    <li>
                        Pembayaran pada pemesanan jasa sablon dapat dilakukan 2kali yaitu uang muka dan sisa tagihan. jika harga pemesanan kurang dari Rp. 1.000.000 maka uang muka akan dikenakan sebesar 75% hari harga pemesanan jika lebih maka uang muka akan dikenakan sebesar 80% dari harga pemesanan.
                    </li>
                    <li>
                        Jika pelanggan ingin membatalakan pemesanan pada saat pemrosesan jasa sablon maka uang muka tidak dapat dikembalikan dan tidak perlu membayar uang sisa tagihan.
                    </li>
                </ol>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="d-flex">
                <i class="fa fa-user fa-2x mr-3" aria-hidden="true"></i>
                <h4 class="my-1">Member Akun</h4>
            </div>
            <hr>
            <div>
                <ol>
                    <li>
                        Pelanggan dapat memiliki akun dengan mendaftarkan diri pada halaman register yang tersedia.
                    </li>
                    <li>
                        Pelanggan harus memiliki email aktif untuk indentifikasi sebagai member di flossprint.
                    </li>
                    <li>
                        untuk melakukan aktivasi telah dikirim melalui email dengan akun email yang telah anda daftarkan di flossprint. batas waktu aktivasi selama 12 jam.
                    </li>
                    <li>
                        Kami telah menyediakan layanan bantuan, jika terdapat kesalahan pada password atau lupa password silahkan lakukan verifikasi lupas password pada halaman login maupun register.
                    </li>
                    <li>
                        Jika sudah daftar, silahkan lengkapi biodata pada halaman profile. Proses ini sanggat dibutuhkan pada saat melakukan checkout blanja. Lengkapi alamat rumah beserta RT, RW, dan NO rumah.
                    </li>
                    <li>
                        Jika pelanggan tidak melengkapi profile maka, data yang diambil berdasarkan pada saat checkout belanja. Pastikan alamat tujuan benar dan lengkap beserta RT, RW, dan NO rumah.
                    </li>
                </ol>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="d-flex">
                <i class="fa fa-money fa-2x mr-3" aria-hidden="true"></i>
                <h4 class="my-1">Pembayaran</h4>
            </div>
            <hr class="soft">
            <div class="d-block">
                <ol>
                    <li>
                        Pembayaran yang dilakukan pada website ini menggunakan pembayaran manual dengan mengupload
                        bukti pembayaran berupa foto pada halaman pembayaran.
                    </li>
                    <li>
                        Pada saat pembayaran dimohon untuk melengkapi form yang ada pada pembayaran, jika tidak maka
                        proses pembayaran tidak dapat dilakukan.
                    </li>
                    <li>
                        Metode pembayaran yang dilakukan pada flossprint studio dapat dilakukan dengan cara transfer bank.
                    </li>
                    <li>
                        Pembayaran teransfer bank yang digunakan yaitu dengan teransfer bank tersedia pada saat checkout jika pembayaran teransfer dilakukan pada bank lain kami dapat menerimannya dengan syarat telah mengupload bukti pembayaran.
                    </li>
                </ol>
            </div>
        </div>

    </div>
</div>
@endsection