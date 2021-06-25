@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Proses Pembayaran Pelanggan</title>
@endsection

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow p-3">
                <h3 class="text-primary m-0">Pembayaran</h3>
                <p class="m-0">Halaman Pembayaran Produk</p>
            </div>
        </div>
        <!-- pembyaran tipe pemesanan produk -->
        @if($pembelian->tipe === 'pemesanan-produk')

        <div class="col-12 col-sm-12 col-md-7 col-lg-8 mb-3">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h5 class="text-dark">Info Pembayaran</h5>
                    <hr class="soft">
                </div>
                <div class="form-group">
                    <label for="p">Penyetor</label>
                    <input type="text" id="p" class="form-control" readonly value="{{ $pembayaran['penyetor'] }}">
                </div>
                <div class="form-group">
                    <label for="T">Tanggal</label>
                    <input type="text" id="T" class="form-control" readonly value="{{ $pembayaran['tanggal'] }}">
                </div>
                <div class="form-group">
                    <label for="B">Transfer Bank</label>
                    <input type="text" id="B" class="form-control" readonly value="{{ $pembayaran['bank'] }}">
                </div>
                <div class="form-group">
                    <label for="i">Info Bayar</label>
                    <input type="text" class="form-control" readonly value="Rp. {{ number_format($pembayaran['harga']) }}">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-4">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h5 class="text-dark">Bukti Pembayaran</h5>
                    <hr class="soft">
                </div>
                <div class="d-block">
                    <img src="{{ url('/images/pembayaran/' . $pembayaran['bukti']) }}" alt="pembayaran" class="rounded" width="100%">
                </div>
            </div>
        </div>
        @if($pembelian->status === 'sudah-bayar')
        <div class="col-12 my-3">
            <div class="bg-white rounded shadow p-3">
                <div class="border rounded p-2">
                    <a href="/admin/pemesanan/pelanggan/produk/pembayaran/{{ $pembelian->id_pembelian }}" class="btn btn-primary btn-block btn-lg">Terima & Proses</a>
                </div>
            </div>
        </div>
        <!-- untuk memproses pemesanan belanja -->
        @elseif($pembelian->status === 'proses')
        <div class="col-12 my-3">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h4 class="m-0">Proses Pengiriman</h4>
                    <hr class="soft">
                </div>
                <form action="/admin/pemesanan/pelanggan/produk/pengiriman" method="post">
                    @csrf
                    <input type="hidden" name="idpembelian" value="{{ $pembelian->id_pembelian }}">
                    <div class="form-group">
                        <label for="s">Proses Status</label>
                        <select name="status" id="s" class="form-control">
                            <option value="dikirim">Dikirim</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="r">Resi Pengiriman</label>
                        <input type="text" name="resi" class="form-control" placeholder="Input Resi Pengiriman" required>
                    </div>
                    <div class="form-group">
                        <div class="p-2 border">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @elseif($pembelian->status === 'dikirim')
        <div class="col-12 my-3">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h4 class="m-0">Proses Pengiriman</h4>
                    <hr class="soft">
                </div>
                <form action="/admin/pemesanan/pelanggan/produk/selesai" method="post">
                    @csrf
                    <input type="hidden" name="idpembelian" value="{{ $pembelian->id_pembelian }}">
                    <div class="form-group">
                        <label for="s">Proses Status</label>
                        <select name="status" id="s" class="form-control">
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="p-2 border">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif

        <!-- pembayaraan tipe pemesanan sablon -->
        @else

        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h5 class="text-dark">Info Harga Pemesanan Sablon</h5>
                    <hr class="soft">
                </div>
                <div class="d-block">
                    <p>Harga Pemesanan Sablon : Rp. {{number_format($pembelian->harga)}}</p>
                </div>
            </div>
        </div>
        <?php $info = 0; ?>
        @foreach($pembayaran as $pbl)
        <?php $info += 1; ?>
        <div class="col-12 col-sm-12 col-md-7 col-lg-8 mb-3">
            <div class="d-block bg-white shadow rounded p-3">
                @if($info === 1)
                <div class="d-block">
                    <h5 class="text-dark">Info Pembayara Uang Muka</h5>
                    <hr class="soft">
                </div>
                @else
                <div class="d-block">
                    <h5 class="text-dark">Info Pembayara Tagihan</h5>
                    <hr class="soft">
                </div>
                @endif
                <div class="form-group">
                    <label for="p">Penyetor</label>
                    <input type="text" id="p" class="form-control" readonly value="{{ $pbl['penyetor'] }}">
                </div>
                <div class="form-group">
                    <label for="T">Tanggal</label>
                    <input type="text" id="T" class="form-control" readonly value="{{ $pbl['tanggal'] }}">
                </div>
                <div class="form-group">
                    <label for="B">Transfer Bank</label>
                    <input type="text" id="B" class="form-control" readonly value="{{ $pbl['bank'] }}">
                </div>
                <div class="form-group">
                    <label for="i">Info Bayar</label>
                    <input type="text" class="form-control" readonly value="Rp. {{ number_format($pbl['harga']) }}">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-4">
            <div class="d-block bg-white rounded p-3 shadow">
                <img src="{{ url('/images/pembayaran/' . $pbl['bukti']) }}" alt="pembayaran" width="100%">
            </div>
        </div>
        <?php $info++; ?>
        @endforeach

        @if($pembelian->status === "sudah-bayar-uang-muka")
        <!-- sudah bayar uang muka -->
        <div class="col-12 mt-4">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h4 class="m-0">Proses Pemesanan Sablon</h4>
                    <hr class="soft">
                </div>
                <form action="/admin/pemesanan/pelanggan/sablon/uangmuka" method="post">
                    @csrf
                    <input type="hidden" name="idpembelian" value="{{ $pembelian->id_pembelian }}">
                    <div class="form-group">
                        <label for="">Perkiraan Waktu Selesai</label>
                        <input type="date" name="waktuperkiraan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="s">Proses Status</label>
                        <select name="status" id="s" class="form-control">
                            <option value="proses-sablon-tahap-awal">proses sablon tahap awal</option>
                            <option value="anjuran-bayar-lunas">Anjuran bayar lunas</option>
                            <option value="dikirim">dikirim</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="p-2 border">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @elseif($pembelian->status === "proses-sablon-tahap-awal")
        <!-- proses sablon tahap satu -->
        <div class="col-12 mt-4">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h4 class="m-0">Proses Pemesanan Sablon - anjurkan bayar lunas</h4>
                    <hr class="soft">
                </div>
                <form action="/admin/pemesanan/pelanggan/sablon/tagihan" method="post">
                    @csrf
                    <input type="hidden" name="idpembelian" value="{{ $pembelian->id_pembelian }}">
                    <div class="form-group">
                        <label for="s">Proses Status</label>
                        <select name="status" id="s" class="form-control">
                            <option value="anjuran-bayar-lunas">Anjuran bayar lunas</option>
                            <option value="dikirim">dikirim</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="p-2 border">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @elseif($pembelian->status === "sudah-bayar-tagihan")
        <!-- memproses sablon yang sudah bayar tagihan -->
        <div class="col-12 my-3">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h4 class="m-0">Proses Pengiriman</h4>
                    <hr class="soft">
                </div>
                <form action="/admin/pemesanan/pelanggan/sablon/prosestagihan" method="post">
                    @csrf
                    <input type="hidden" name="idpembelian" value="{{ $pembelian->id_pembelian }}">
                    <div class="form-group">
                        <label for="waktuakhir">Perkiraan Waktu Selesai</label>
                        <input type="date" name="waktuselesai" id="waktuakhir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="s">Proses Status</label>
                        <select name="status" id="s" class="form-control">
                            <option value="proses-sablon">proses sablon</option>
                            <option value="dikirim">Dikirim</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="p-2 border">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @elseif($pembelian->status === "bayar-lunas")
        <!-- bila sudah bayar lunas -->
        <div class="col-12 mt-4">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h4 class="m-0">Proses Pemesanan Sablon #Lunas</h4>
                    <hr class="soft">
                </div>
                <form action="/admin/pemesanan/pelanggan/sablon/lunas" method="post">
                    @csrf
                    <input type="hidden" name="idpembelian" value="{{ $pembelian->id_pembelian }}">
                    <div class="form-group">
                        <label for="perkiraan">Perkiraan Waktu Selesai</label>
                        <input type="date" name="waktuselesai" id="perkiraan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="s">Proses Status</label>
                        <select name="status" id="s" class="form-control">
                            <option value="proses-sablon">proses sablon</option>
                            <option value="dikirim">dikirim</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="p-2 border">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @elseif($pembelian->status === "proses-sablon")
        <!-- proses sablon tahap akhir -->
        <div class="col-12 my-3">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h4 class="m-0">Proses Pengiriman</h4>
                    <hr class="soft">
                </div>
                <form action="/admin/pemesanan/pelanggan/sablon/pengiriman" method="post">
                    @csrf
                    <input type="hidden" name="idpembelian" value="{{ $pembelian->id_pembelian }}">
                    <div class="form-group">
                        <label for="s">Proses Status</label>
                        <select name="status" id="s" class="form-control">
                            <option value="dikirim">Dikirim</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="r">Resi Pengiriman</label>
                        <input type="text" name="resi" class="form-control" placeholder="Input Resi Pengiriman" required>
                    </div>
                    <div class="form-group">
                        <div class="p-2 border">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @elseif($pembelian->status === "dikirim")
        <!-- selesaikan pengiriman sablon -->
        <div class="col-12 my-3">
            <div class="bg-white rounded shadow p-3">
                <div class="d-block">
                    <h4 class="m-0">Proses Pengiriman</h4>
                    <hr class="soft">
                </div>
                <form action="/admin/pemesanan/pelanggan/sablon/selesai" method="post">
                    @csrf
                    <input type="hidden" name="idpembelian" value="{{ $pembelian->id_pembelian }}">
                    <div class="form-group">
                        <label for="s">Proses Status</label>
                        <select name="status" id="s" class="form-control">
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="p-2 border">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif

        @endif

    </div>
</div>
@endsection