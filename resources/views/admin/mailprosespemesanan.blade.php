<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/css/nota.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="m-0"><span class="nb2 text-warning">Floss</span>Print</h1>
                <p class="m-0">Selamat data di layanan FlossPrint</p>
                <hr class="soft">
            </div>
            @if($pemesanan->tipe === 'belanja-produk')
            <div class="col-12 mb-3">
                <h5 class="text-dark">Pemesanan Anda</h5>
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Nota</p>
                    <p class="mb-0">: {{ $pemesanan->id_pembelian }}</p>
                </div>
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Tipe</p>
                    <p class="mb-0">: {{ $pemesanan->tipe }}</p>
                </div>
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Tanggal</p>
                    <p class="mb-0">: {{ $pemesanan->tanggal }}</p>
                </div>
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Harga</p>
                    <p class="mb-0">: Rp. {{ number_format($pemesanan->harga) }}</p>
                </div>
            </div>
            @else
            <div class="col-12 mb-3">
                <h5 class="text-dark">Pemesanan Anda</h5>
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Nota</p>
                    <p class="mb-0">: {{ $pemesanan->id_pembelian }}</p>
                </div>
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Nota</p>
                    <p class="mb-0">: {{ $pemesanan->tipe }}</p>
                </div>
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Tanggal</p>
                    <p class="mb-0">: {{ $pemesanan->tanggal }}</p>
                </div>
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Harga</p>
                    <p class="mb-0">: Rp. {{ number_format($pemesanan->harga) }}</p>
                </div>
                @foreach($pembayaran as $pbr)
                <div class="d-flex">
                    <p class="mb-0 wtext-2 font-weight-bold">Pembayaran Uang muka</p>
                    <p class="mb-0">: Rp. {{ number_format($pbr->harga) }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        @if(isset($info))
        <div class="col-12">
            <p>Proses pemesanan sablon anda sudah selesai silahkan bayar sisa tagihan dari pemesanan sablon anda, lihat informasi pemesanan anda di <a href="flossprint.co.id">FlossPrint.co.id</a>. Terimakasi atas perhatiannya telah berbelanja di toko flossprint. belanja hemat hanya di flossprint sekali klik barang sampai tujuan.</p>
        </div>
        @else
        <div class="col-12">
            <p>Pembayaran atas pemesanan anda sudah kami terima dan sedang dalam pemrosesan, lihat informasi detailnya di <a href="flossprint.co.id">FlossPrint.co.id</a>. Terimakasi atas perhatiannya telah berbelanja di toko flossprint. belanja hemat hanya di flossprint sekali klik barang sampai tujuan.</p>
        </div>
        @endif
    </div>
    </div>

    <div class="d-block text-center">
        <small class="d-block w-100">Anda menerima pesan ini sebagai pemberitahuan tentang penerimanaan pembayaran pada pesanan anda.</small>
        <small class="d-block w-100">© 2020 flossprint, jakarta.</small>
    </div>


    <script type="text/javascript" src="{{ url('/dist/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>