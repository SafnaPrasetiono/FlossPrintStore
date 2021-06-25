<!doctype html>
<html lang="en" style="box-sizing: border-box;font-family: sans-serif;line-height: 1.15;-webkit-text-size-adjust: 100%;-webkit-tap-highlight-color: transparent;">

<head style="box-sizing: border-box;">
    <!-- Required meta tags -->
    <meta charset="utf-8" style="box-sizing: border-box;">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" style="box-sizing: border-box;">
    <title style="box-sizing: border-box;">FlossPrint</title>
</head>

<body style="box-sizing: border-box;margin: 0;font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;min-width: 992px!important;">

    <!-- main page -->
    <div class="container-fluid py-2" style="background-color: rgb(60,121,132);box-sizing: border-box;width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;padding-top: .5rem!important;padding-bottom: .5rem!important;">
        <!-- header -->
        <div class="d-block" style="box-sizing: border-box;display: block!important;">
            <h2 class="m-0 pt-4 text-warning text-style font-weight-bold" style="box-sizing: border-box;margin-top: 0;margin-bottom: .5rem;font-weight: 700!important;line-height: 1.2;font-size: 2rem;orphans: 3;widows: 3;page-break-after: avoid;font-family: 'Pacifico', cursive;margin: 0!important;padding-top: 1.5rem!important;color: #ffc107!important;">
                Floss<span class="text-white" style="box-sizing: border-box;color: #fff!important;">Print</span>
            </h2>
            <p class="d-block m-0 text-white" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: block!important;margin: 0!important;color: #fff!important;">
                Selamat data di toko flossprint studio!</p>
            <hr class="soft mb-2 bg-white" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: .5rem!important;border: 0;border-top: 1px solid rgba(0,0,0,.1);background-color: #fff!important;">
        </div>

        <!-- content -->
        <div class="d-block bg-white p-3" style="box-sizing: border-box;background-color: #fff!important;display: block!important;padding: 1rem!important;">
            <!-- messager -->
            <div class="d-block" style="box-sizing: border-box;display: block!important;">
                <p class="d-block mb-3" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem!important;orphans: 3;widows: 3;display: block!important;">
                    Halo {{$nama}},
                </p>
                <p class="d-block" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: block!important;">
                    Terima kasih telah bergabung dengan FlossPrint. Berikut adalah detail akun Anda, pastikan Anda menyimpannya dengan aman.
                </p>
            </div>
            <!-- info users -->
            <div class="d-block" style="box-sizing: border-box;display: block!important;">
                <hr class="soft" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0,0,0,.1);">
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 120px !important;">
                        Username <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p>
                    <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">{{ $username }}</span>
                </div>
                <div class="d-flex mb-2" style="box-sizing: border-box;display: flex!important;margin-bottom: .5rem!important;">
                    <p class="m-0 w-text" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: inline-block;margin: 0!important;width: 120px !important;">
                        Alamat Email <span class="float-right" style="box-sizing: border-box;float: right!important;">:</span></p>
                    <span class="ml-1" style="box-sizing: border-box;margin-left: .25rem!important;">{{ $email }}</span>
                </div>
                <hr class="soft" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0,0,0,.1);">
            </div>
            <div class="d-block" style="box-sizing: border-box;display: block!important;">
                Namun, sebelum Anda menggunakan akun tersebut, harap lakukan aktivasi dengan mengklik tombol di bawah ini:
            </div>
            <!-- action -->
            <div class="d-block text-center my-5" style="box-sizing: border-box;display: block!important;margin-top: 3rem!important;margin-bottom: 3rem!important;text-align: center!important;">
                <a href="http://127.0.0.1:8000/register/aktivasi/akun/vkey={{$key}}" class="btn-aktivasi" style="box-sizing: border-box;color: white;text-decoration: none!important;background-color: rgb(60, 121, 132);padding-top: 16px;padding-bottom: 16px;padding-left: 24px;padding-right: 24px;font-size: 20px;border-radius: 4px;cursor: pointer;">Aktivasi Akun</a>
            </div>
            <div class="d-block mb-4" style="box-sizing: border-box;display: block!important;margin-bottom: 1.5rem!important;">
                <div class="card mb-3" style="border: 1px solid rgb(60, 121, 132);box-sizing: border-box;position: relative;display: flex;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border-radius: .25rem;margin-bottom: 1rem!important;">
                    <div class="card-body text-dark" style="box-sizing: border-box;-ms-flex: 1 1 auto;flex: 1 1 auto;min-height: 1px;padding: 1.25rem;color: #343a40!important;">
                        <strong style="box-sizing: border-box;font-weight: bolder;">Jika tombol tidak berfungsi, salin tautan berikut ini</strong>
                        <br style="box-sizing: border-box;">
                        <a href="http://127.0.0.1:8000/register/aktivasi/akun/vkey={{$key}}" class="cart-text" style="box-sizing: border-box;color: #007bff;text-decoration: underline;background-color: transparent;">
                            http://127.0.0.1:8000/register/aktivasi/akun/vkey={{$key}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-block" style="box-sizing: border-box;display: block!important;">
                <p class="mb-2 d-block" style="box-sizing: border-box;margin-top: 0;margin-bottom: .5rem!important;orphans: 3;widows: 3;display: block!important;">
                    Harap lakukan aktivasi akun anda dalam tempo 12 jam, jika tidak melakukan aktivasi maka pendaftaran akan dibatalkan dan Anda harus mendaftar lagi.
                </p>
                <p class="d-block" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: block!important;">
                    <strong style="box-sizing: border-box;font-weight: bolder;">Catatan :</strong> Jika email ini masuk di folder Spam, harap tandai sebagai bukan Spam dan tambahkan alamat email ini ke kontak Anda.
                </p>
            </div>
        </div>

        <!-- footer -->
        <div class="d-block" style="box-sizing: border-box;display: block!important;">
            <hr class="soft mt-2 bg-white" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: .5rem!important;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0,0,0,.1);background-color: #fff!important;">
            <div class="d-block text-white text-center pt-2" style="box-sizing: border-box;display: block!important;padding-top: .5rem!important;text-align: center!important;color: #fff!important;">
                <small style="box-sizing: border-box;font-size: 80%;font-weight: 400;">Anda menerima pesan ini sebagai pemberitahuan tentang penerimanaan pembayaran pada pesanan anda.</small>
            </div>
            <div class="d-block text-white text-center pb-4" style="box-sizing: border-box;display: block!important;padding-bottom: 1.5rem!important;text-align: center!important;color: #fff!important;">
                <small class="" style="box-sizing: border-box;font-size: 80%;font-weight: 400;">© 2020 flossprint, jakarta. </small>
            </div>
        </div>

    </div>


</body>

</html>
