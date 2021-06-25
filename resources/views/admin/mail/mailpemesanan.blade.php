<!DOCTYPE html>
<html lang="en" style="box-sizing: border-box;font-family: sans-serif;line-height: 1.15;-webkit-text-size-adjust: 100%;-webkit-tap-highlight-color: transparent;">

<head style="box-sizing: border-box;">
    <meta charset="utf-8" style="box-sizing: border-box;">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" style="box-sizing: border-box;">
    <title style="box-sizing: border-box;">FlossPrint</title>
    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}" style="box-sizing: border-box;">
    <link rel="stylesheet" href="{{ url('/fontawesome/css/all.css') }}" style="box-sizing: border-box;">

    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" style="box-sizing: border-box;">
    <style style="box-sizing: border-box;">
        .w-text {
            width: 190px !important;
            display: inline-block;
        }

        .text-style {
            font-family: 'Pacifico', cursive;
        }
    </style>
</head>

<body style="box-sizing: border-box;margin: 0;font-family: -apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,&quot;Noto Sans&quot;,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;,&quot;Noto Color Emoji&quot;;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;min-width: 992px!important;">
  
    <div class="container-fluid py-2" style="background-color: rgb(60,121,132);box-sizing: border-box;width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;padding-top: .5rem!important;padding-bottom: .5rem!important;">

        <div class=" text-center py-4 mb-2 d-block w-100" style="box-sizing: border-box;display: block!important;width: 100%!important;margin-bottom: .5rem!important;padding-top: 1.5rem!important;padding-bottom: 1.5rem!important;text-align: center!important;">
            <h2 class="m-0 text-warning text-style font-weight-bold" style="box-sizing: border-box;margin-top: 0;margin-bottom: .5rem;font-weight: 700!important;line-height: 1.2;font-size: 2rem;orphans: 3;widows: 3;page-break-after: avoid;font-family: 'Pacifico', cursive;margin: 0!important;color: #ffc107!important;">Floss<span class="text-white" style="box-sizing: border-box;color: #fff!important;">Print</span></h2>
        </div>

        @if($pemesanan->tipe === 'pemesanan-produk')
        <div class="mb-3 d-block w-100 p-1" style="box-sizing: border-box;display: block!important;width: 100%!important;margin-bottom: 1rem!important;padding: .15rem!important;">
            <div class="d-block bg-white p-4" style="box-sizing: border-box;background-color: #fff!important;display: block!important;padding: 1.5rem!important;">
                <div class="d-flex" style="box-sizing: border-box;display: flex!important;">
                    <strong style="box-sizing: border-box;font-weight: bolder;">INFO PEMESANAN PRODUK</strong>
                </div>
                <hr class="soft" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0,0,0,.1);">
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 130px !important;">Nota <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p> <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">{{ $pemesanan->id_pembelian }}</span>
                </div>
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 130px !important;">Tanggal <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p> <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">{{ $pemesanan->tanggal }}</span>
                </div>
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 130px !important;">Harga <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p> <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">Rp. {{ number_format($pemesanan->harga)}}</span>
                </div>
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 130px !important;">Pembayaran <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p> <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">Rp. {{ number_format($pembayaran->harga) }}</span>
                </div>
                <hr class="soft" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0,0,0,.1);">
                <div class="d-block mb-5" style="box-sizing: border-box;display: block!important;margin-bottom: 3rem!important;">
                    <p style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;">
                        Pembayaran atas pemesanan anda sudah kami terima dan sedang dalam pemrosesan, lihat informasi detailnya di <a href="flossprint.co.id">FlossPrint.co.id</a>.
                        Terimakasi atas perhatiannya telah berbelanja di toko flossprint. belanja hemat hanya di flossprint sekali klik barang sampai tujuan.
                    </p>
                </div>
                <div class="d-block" style="box-sizing: border-box;display: block!important;">
                    <p class="m-0 d-block" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: block!important;margin: 0!important;">Toko FlossPrint Studio</p>
                    <a href="flossprint.store" style="box-sizing: border-box;color: #007bff;text-decoration: underline;background-color: transparent;">flossporint.store</a>
                </div>
            </div>
        </div>


        @else
        <div class="mb-3 d-block w-100 p-1" style="box-sizing: border-box;display: block!important;width: 100%!important;margin-bottom: 1rem!important;padding: .15rem!important;">
            <div class="d-block bg-white p-4" style="box-sizing: border-box;background-color: #fff!important;display: block!important;padding: 1.5rem!important;">
                <div class="d-flex" style="box-sizing: border-box;display: flex!important;">
                    <strong style="box-sizing: border-box;font-weight: bolder;">INFO PEMESANAN PRODUK</strong>
                </div>
                <hr class="soft" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0,0,0,.1);">
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 200px !important;">Nota <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p> <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">{{ $pemesanan->id_pembelian}}</span>
                </div>
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 200px !important;">Tanggal <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p> <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">{{ $pemesanan->tanggal }}</span>
                </div>
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 200px !important;">Harga <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p> <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">Rp. {{ number_format($pemesanan->harga) }}</span>
                </div>
                <?php $pb = 1; ?>
                @foreach($pembayaran as $pbr)
                @if($pb == 1)
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 200px !important;">Pembayaran Uang Muka <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p> <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">Rp. {{ number_format($pbr->harga) }}</span>
                </div>
                @else
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 200px !important;">Pembayaran Lunas <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p> <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">Rp. {{ number_format($pbr->harga) }}</span>
                </div>
                @endif
                <?php $pb++; ?>
                @endforeach
                <hr class="soft" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0,0,0,.1);">
                <div class="d-block mb-5" style="box-sizing: border-box;display: block!important;margin-bottom: 3rem!important;">
                    @if(isset($info))
                    <p style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;">
                        Proses pemesanan sablon anda sudah selesai silahkan bayar sisa tagihan dari pemesanan sablon anda, lihat informasi pemesanan anda di <a href="flossprint.co.id">FlossPrint.co.id</a>. Terimakasi atas perhatiannya telah berbelanja di toko flossprint. belanja hemat hanya di flossprint sekali klik barang sampai tujuan.
                    </p>
                    @else
                    <p style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;">
                        Pembayaran atas pemesanan anda sudah kami terima dan sedang dalam pemrosesan, lihat informasi detailnya di <a href="flossprint.co.id">FlossPrint.co.id</a>. Terimakasi atas perhatiannya telah berbelanja di toko flossprint. belanja hemat hanya di flossprint sekali klik barang sampai tujuan.
                    </p>
                    @endif
                </div>
                <div class="d-block" style="box-sizing: border-box;display: block!important;">
                    <p class="m-0 d-block" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: block!important;margin: 0!important;">Toko FlossPrint Studio</p>
                    <a href="flossprint.store" style="box-sizing: border-box;color: #007bff;text-decoration: underline;background-color: transparent;">flossporint.store</a>
                </div>
            </div>
        </div>

        @endif


        <div class="py-3 d-block w-100" style="box-sizing: border-box;display: block!important;width: 100%!important;padding-top: 1rem!important;padding-bottom: 1rem!important;">
            <div class="d-block text-white text-center" style="box-sizing: border-box;display: block!important;text-align: center!important;color: #fff!important;">
                <small class="" style="box-sizing: border-box;font-size: 80%;font-weight: 400;">Anda menerima pesan ini sebagai pemberitahuan tentang penerimanaan pembayaran pada pesanananda.</small>
            </div>
            <div class="d-block text-white text-center" style="box-sizing: border-box;display: block!important;text-align: center!important;color: #fff!important;">
                <small class="" style="box-sizing: border-box;font-size: 80%;font-weight: 400;">© 2020 flossprint, jakarta. </small>
            </div>
        </div>


    </div>


    <script type="text/javascript" src="{{ url('/dist/js/jquery.js') }}" style="box-sizing: border-box;"></script>
    <script type="text/javascript" src="{{ url('/dist/js/popper.js') }}" style="box-sizing: border-box;"></script>
    <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js') }}" style="box-sizing: border-box;"></script>
</body>

</html>