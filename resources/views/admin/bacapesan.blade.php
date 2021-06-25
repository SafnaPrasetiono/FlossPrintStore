@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Baca Pesan</title>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-white rounded p-3 mb-3">
                <div class="media mb-3">
                    <img src="{{ url('/images/user/'. $ulasan->foto) }}" alt="user" class="rounded-circle mr-3" width="46px">
                    <div class="media-body">
                        <h5 class="mb-0">{{ $ulasan->nama_lengkap}}</h5>
                        <small>
                            <?php $rating = $ulasan->rating / 20; ?>
                            <?php $sisa = 5 % $rating; ?>
                            <?php for ($r = 1; $r <= $rating; $r++) : ?>
                                <i class="fa fa-star text-warning"></i>
                            <?php endfor; ?>
                            <?php for ($s = 1; $s <= $sisa; $s++) : ?>
                                <i class="fa fa-star text-secondary"></i>
                            <?php endfor; ?>
                        </small>
                    </div>
                </div>
                <div class="d-block">
                    <p>{{$ulasan->tanggapan}}</p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="bg-white rounded p-3 mb-3">
                <p class="font-weight-bold">Produk yang ditanggapi</p>
                <hr class="soft">
                <div class="d-flex">
                    <img src="{{url('/images/produk/display/' . $produk->samplefoto)}}" alt="" class="mr-3" width="100px">
                    <div class="d-block">
                        <p class="m-0">{{$produk->namaproduk}}</p>
                        <div class="d-flex">
                            <p class="m-0" style="width: 75px;">Harga</p>: Rp. {{number_format($produk->harga)}}
                        </div>
                        <div class="d-flex">
                            <p class="m-0" style="width: 75px;">Ukuran</p>: {{$produk->ukuran}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($ulasan->balasan === null)
        <div class="col-12">
            <div class="bg-white rounded p-3">
                <div class="d-block">
                    <strong>Balas ulasan Produk</strong>
                    <hr class="soft">
                </div>
                <form action="{{route('admin.message.send')}}" method="post" class="d-block">
                    @csrf
                    <input type="hidden" name="idulasan" value="{{$ulasan->id_ulasan}}">
                    <div class="form-group">
                        <textarea name="balasan" class="form-control" rows="6"></textarea>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-primary px-5"> Balas Pesan <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
        @else
        <div class="col-12">
            <div class="bg-white rounded p-3">
                <div class="d-block">
                    <strong>Balasan ulasan Produk</strong>
                    <hr class="soft">
                </div>
                <form action="{{route('admin.message.send')}}" method="post" class="d-block">
                    @csrf
                    <input type="hidden" name="idulasan" value="{{$ulasan->id_ulasan}}">
                    <div class="form-group">
                        <textarea name="balasan" class="form-control" rows="6">{{$ulasan->balasan}}</textarea>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-primary px-5"> Update Balas Pesan <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection