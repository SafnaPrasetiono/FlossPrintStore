@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Ulasan</title>
<style>
    .media{
        text-decoration: none!important;
    }
</style>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="bg-white rounded shadow p-3 mb-3">
                <h3 class="text-primary text-uppercase m-0">Ulasan</h3>
                <p class="m-0">Halaman Pesan Ulasan Produk</p>
            </div>
        </div>
        <div class="col-12">
            <div class="bg-white rounded shadow p-3 mb-3">
                @if(count($ulasan) > 0)
                @foreach($ulasan as $uls)
                <a href="/admin/message/{{$uls->id_ulasan}}" class="media rounded p-2 d-flex w-100 overflow-hidden text-truncate">
                    <img src="{{ url('/images/user/'. $uls->foto) }}" alt="user" class="rounded-circle mr-3" width="42px">
                    <div class="media-body <?php if($uls->balasan == null){echo 'text-primary';}else{echo 'text-dark';}?> text-truncate">
                        <h5 class="m-0"><span class="text-capitalize">{{$uls->nama_lengkap}}</span> - Ulasan produk</h5>
                        <p class="m-0 text-truncate">{{ $uls->tanggapan }}</p>
                    </div>
                </a>
                <div class="dropdown-divider m-0"></div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection