<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="text-center"><span class="nb2 text-warning">Floss</span>Print</h1>
    <p>Aktifkan email kamu sekarang juga, desain pakaianmu dan belanja lah di flossprint.co.id. belanja cepat hanya di flossprint sekali klik produk sampai dirumah.</p>
    <hr class="soft">

    @if(session('ver'))
    @foreach(session('ver') as $row)
    <h3><b>Your Account : <span class="ml-2">{{ $row['email'] }}</span></b></h3>
    <h3><b>kode Verifikasi : <span class="ml-2">{{ $row['vkey'] }}</span></b></h3>
    @endforeach
    @endif

    <div class="d-block text-center">
        <small class="d-block w-100">Anda menerima email ini sebagai pemberitahuan tentang aktivasi akun pada layanan akun flossprint anda.</small>
        <small class="d-block w-100">© 2020 flossprint, jakarta.</small>
    </div>

</body>

</html>