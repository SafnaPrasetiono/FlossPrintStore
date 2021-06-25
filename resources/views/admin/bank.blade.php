@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Data Bank</title>
<link rel="stylesheet" href="{{ url('/sweetalert/dist/sweetalert2.min.css') }}">
<script src="{{ url('/sweetalert/dist/sweetalert2.min.js') }}"></script>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">

        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow py-3 px-3">
                <h2 class="text-primary mb-1">Data Bank</h2>
                <p class="m-0">Halaman Data Bank</p>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow py-3 px-3">
                <div class="d-flex">
                    <a href="/admin/bank/tambah" class="btn btn-primary ml-auto mr-2">Tambah Daya</a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="bg-white rounded shadow p-2">
                <div class="table-responsive d-flex rounded">
                    <table class="table table-striped m-0">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Rekening</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bank as $bk)
                            <tr>
                                <td scope="row">{{ $bk->nama_bank }}</td>
                                <td>{{ $bk->deskripsi }}</td>
                                <td>{{ $bk->nomor_rekening }}</td>
                                <td>
                                    <a href="/admin/bank/ubah/{{ $bk->id_bank }}" class="btn btn-light text-warning box-icon-2 border border-warning" type="button" data-toggle="tooltip" data-placement="top" title="Update">
                                        <i class="fa fa-pencil-square-o fa-lg p-0 m-0" aria-hidden="true"></i>
                                    </a>
                                    <a href="/admin/bank/hapus/{{ $bk->id_bank }}" class="btn btn-light text-danger box-icon-2 border border-danger" type="button" data-toggle="tooltip" data-placement="top" title="delete">
                                        <i class="fa fa-trash fa-lg p-0 m-0" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


@if(Session::has('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ Session::get("success") }}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@elseif(Session::has('failed'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ Session::get("failed") }}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@endsection