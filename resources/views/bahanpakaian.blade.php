@extends('layout.panel')

@section('title')
<title>FlossPrint - bahan pakaian</title>
@endsection

@section('content')
<div class="bg-light">
    <div class="container py-4" id="sablon">
        <div class="row">
            <div class="col-12 mb-3">
                <h2 class="m-0 text-center">Sablon Pakaian</h2>
            </div>
            <div class="col-12">
                <div class="row no-gutters bg-light position-relative">
                    <div class="col-md-4 mb-md-0 p-md-4">
                        <img src="{{ url('/images/ExpSablon/sablon.jpg') }}" class="w-100" alt="sablon">
                    </div>
                    <div class="col-md-8 position-static p-4 pl-md-0">
                        <h5 class="mt-0">Sablon Pakaian</h5>
                        <p class="text-justify">Teknik sablon yang di pergunakan pada toko flossprint studio sablon yaitu dengan teknik manual dengan tingkat kedetailan warna yang sangat baik. Penggunakan canvas pada sablon ini sesuai dengan dasain pakaian yang akan di cetak kedalam bentuk apapun dengan maksimal ukuran pencetakan sablon adalah A3.</p>
                        <p class="text-justify">Tingkat warna pencetakan yang dihasilkan pada toko kami sangat baik dengan pilihan sejuta warna. toko kami juga dapat mencetak sablon dalam bentuk hitam dan putih atau dapat dikatakan tanpa warna.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-4" id="bahan">
    <div class="row">
        <div class="col-12 mb-3">
            <h2 class="m-0 text-center">Bahan-bahan Pakaian</h2>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
            <div class="card">
                <img src="{{ url('/images/ExpSablon/Cotton-Combad-20s.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bahan Combed 20s</h5>
                    <p class="card-text text-justify">Bahan Cotton Combed 20s merupakan bahan kaos 100% serat cotton dengan ketebalan 20s dan gramasi nya adalah 190-200gsm, 20s adalah tingkat keteblan kain yang paling tebal yang ada di toko flossprint.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
            <div class="card">
                <img src="{{ url('/images/ExpSablon/Cotton-Combad-24s.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bahan Combed 24s</h5>
                    <p class="card-text text-justify">Bahan Cotton Combed 24s merupakan bahan kaos 100% serat cotton dengan ketebalan yang sedang atau 24s dan gramasi nya adalah 175-185gsm, kain ini merupakan kain single knitt.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
            <div class="card">
                <img src="{{ url('/images/ExpSablon/Cotton-Combad-30s.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bahan Combed 30s</h5>
                    <p class="card-text text-justify">Bahan Combed 30s adalah kain untuk kaos standar distro. Ketebalannya adalah 30s dan lebih tipis dibandingkan dengan Combed 24s atau Combed 20s. Gramasi nya adalah 140-150gsm dan merupakan single knit.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
            <div class="card">
                <img src="{{ url('/images/ExpSablon/Cotton-Bamboo.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bahan Cotton Bambo</h5>
                    <p class="card-text text-justify">Cotton Bamboo adalah jenis kain yang terbuat dari campuran katun dan serat bambu. Cotton Bamboo ini sangat ringan, sangat lembut, elastis dan tahan lama karna mengandung serat bambu 20% lebih rendah dibandingkan dengan kain jenis lain.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-light">
    <div class="container py-4" id="size">
        <div class="row">
            <div class="col-12 mb-3">
                <h2 class="m-0 text-center">Ukuran Pakaian</h2>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-5 mb-3">
                <img src="{{ url('/images/ExpSablon/pakaian.png') }}" alt="" width="100%" class="rounded">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-7 py-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Size</th>
                            <th>Panjang</th>
                            <th>Lebar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>S</td>
                            <td>58</td>
                            <td>53</td>
                        </tr>
                        <tr>
                            <td>M</td>
                            <td>60</td>
                            <td>55</td>
                        </tr>
                        <tr>
                            <td>L</td>
                            <td>62</td>
                            <td>56</td>
                        </tr>
                        <tr>
                            <td>XL</td>
                            <td>64</td>
                            <td>57</td>
                        </tr>
                        <tr>
                            <td>XXL</td>
                            <td>67</td>
                            <td>58</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container py-4" id="harga">
    <div class="row">
        <div class="col-12 mb-3">
            <h2 class="m-0 text-center">Estimasi Biaya Sablon</h2>
        </div>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jenis Pakaian</th>
                        <th>S & M</th>
                        <th>L & XL</th>
                        <th>XXL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Bahan Combed 20s</td>
                        <td>Rp. 75.000</td>
                        <td>Rp. 80.000</td>
                        <td>Rp. 85.000</td>
                    </tr>
                    <tr>
                        <td scope="row">Bahan Combed 24s</td>
                        <td>Rp. 72.000</td>
                        <td>Rp. 78.000</td>
                        <td>Rp. 82.000</td>
                    </tr>
                    <tr>
                        <td scope="row">Bahan Combed 30s</td>
                        <td>Rp. 70.000</td>
                        <td>Rp. 75.000</td>
                        <td>Rp. 80.000</td>
                    </tr>
                    <tr>
                        <td scope="row">Bahan Cotton Bambo</td>
                        <td>Rp. 75.000</td>
                        <td>Rp. 80.000</td>
                        <td>Rp. 85.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection