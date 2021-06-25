<!doctype html>
<html lang="en" style="box-sizing: border-box;font-family: sans-serif;line-height: 1.15;-webkit-text-size-adjust: 100%;-webkit-tap-highlight-color: transparent;">

<head style="box-sizing: border-box;">
    <!-- Required meta tags -->
    <meta charset="utf-8" style="box-sizing: border-box;">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" style="box-sizing: border-box;">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" style="box-sizing: border-box;">

    <title style="box-sizing: border-box;">FlossPrint</title>
    <style style="box-sizing: border-box;">
        .w-text {
            width: 120px !important;
            display: inline-block;
        }

        .text-style {
            font-family: 'Pacifico', cursive;
        }

        .d-head {
            display: block;
            z-index: 9;
            height: 100px;
        }

        .box {
            margin-top: -60px;
            margin-bottom: -40px;
            margin-left: 70%;
            width: 100px;
            height: 100px;
            background-color: rgb(60, 121, 132);
            transform: rotate(45deg);
        }

        .btn-aktivasi,
        .btn-aktivasi:hover {
            padding-top: 16px;
            padding-bottom: 16px;
            padding-left: 24px;
            padding-right: 24px;
            font-size: 20px;
            border-radius: 4px;
            color: white;
            background-color: rgb(60, 121, 132);
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body style="box-sizing: border-box;margin: 0;font-family: -apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,&quot;Noto Sans&quot;,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;,&quot;Noto Color Emoji&quot;;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;min-width: 992px!important;">

    <!-- header -->
    <div class="d-block p-2" style="background-color: rgb(60,121,132);box-sizing: border-box;display: block!important;padding: .5rem!important;">
            <h2 class="m-0 pt-4 text-warning text-style font-weight-bold" style="box-sizing: border-box;margin-top: 0;margin-bottom: .5rem;font-weight: 700!important;line-height: 1.2;font-size: 2rem;orphans: 3;widows: 3;page-break-after: avoid;font-family: 'Pacifico', cursive;margin: 0!important;padding-top: 1.5rem!important;color: #ffc107!important;">Floss<span class="text-white" style="box-sizing: border-box;color: #fff!important;">Print</span></h2>
            <p class="d-block m-0 text-white" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: block!important;margin: 0!important;color: #fff!important;">Selamat data di toko flossprint studio!</p>
            <hr class="soft mb-1 bg-white" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: .25rem!important;border: 0;border-top: 1px solid rgba(0,0,0,.1);background-color: #fff!important;">
    </div>

    <!-- kontent -->
    <div class="d-block p-2" style="background-color: rgb(60,121,132);box-sizing: border-box;display: block!important;padding: .5rem!important;">
        <div class="d-block bg-white p-2" style="box-sizing: border-box;background-color: #fff!important;display: block!important;padding: .5rem!important;">
          <p class="d-block mb-3" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem!important;orphans: 3;widows: 3;display: block!important;">
              Halo {{$nama}},
          </p>
          <p class="d-block" style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;display: block!important;">
          Terima kasih telah menggunakan layanan lupa password. Pastikan email ini milik anda silahkan melakukan ubah password pada akun email anda, dengan cara mengklik tombol di bawah ini:
          </p>
          <div class="d-block text-center my-5" style="box-sizing: border-box;display: block!important;margin-top: 3rem!important;margin-bottom: 3rem!important;text-align: center!important;">
              <a href="http://127.0.0.1:8000/ubahpassword/akun/user/key={{ $key }}" class="btn-aktivasi" style="box-sizing: border-box;color: white;text-decoration: underline;background-color: rgb(60, 121, 132);padding-top: 16px;padding-bottom: 16px;padding-left: 24px;padding-right: 24px;font-size: 20px;border-radius: 4px;cursor: pointer;">Aktivasi Akun</a>
          </div>
          <div class="d-block mb-4" style="box-sizing: border-box;display: block!important;margin-bottom: 1.5rem!important;">
              <div class="card mb-3" style="border: 1px solid rgb(60, 121, 132);box-sizing: border-box;position: relative;display: flex;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border-radius: .25rem;margin-bottom: 1rem!important;">
                  <div class="card-body text-dark" style="box-sizing: border-box;-ms-flex: 1 1 auto;flex: 1 1 auto;min-height: 1px;padding: 1.25rem;color: #343a40!important;">
                      <strong style="box-sizing: border-box;font-weight: bolder;">Jika tombol tidak berfungsi, salin tautan berikut ini</strong>
                      <br style="box-sizing: border-box;">
                      <a href="http://127.0.0.1:8000/ubahpassword/akun/user/key={{ $key }}" class="cart-text" style="box-sizing: border-box;color: #007bff;text-decoration: underline;background-color: transparent;">http://127.0.0.1:8000/ubahpassword/akun/user/key={{ $key }}</a>
                  </div>
              </div>
          </div>

          <div class="d-block" style="box-sizing: border-box;display: block!important;">
              <p style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;">
                  <strong style="box-sizing: border-box;font-weight: bolder;">Catatan :</strong> Jika email ini masuk di folder Spam, harap tandai sebagai bukan Spam dan
                  tambahkan alamat email ini ke kontak Anda.
              </p>
          </div>
        </div>
    </div>

    <!-- footer -->
    <div class="d-block p-2" style="background-color: rgb(60,121,132);box-sizing: border-box;display: block!important;padding: .5rem!important;">
        <hr class="soft mt-1 bg-white" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: .25rem!important;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0,0,0,.1);background-color: #fff!important;">
        <div class="d-block text-white text-center pt-2" style="box-sizing: border-box;display: block!important;padding-top: .5rem!important;text-align: center!important;color: #fff!important;">
            <small style="box-sizing: border-box;font-size: 80%;font-weight: 400;">Anda menerima pesan ini sebagai pemberitahuan tentang penerimanaan pembayaran pada pesanan anda.</small>
        </div>
        <div class="d-block text-white text-center pb-4" style="box-sizing: border-box;display: block!important;padding-bottom: 1.5rem!important;text-align: center!important;color: #fff!important;">
            <small class="" style="box-sizing: border-box;font-size: 80%;font-weight: 400;">© 2020 flossprint, jakarta. </small>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous" style="box-sizing: border-box;"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous" style="box-sizing: border-box;"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous" style="box-sizing: border-box;"></script>
</body>

</html>
