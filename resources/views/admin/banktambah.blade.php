@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Dashboard</title>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">

        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow py-3 px-3">
                <h2 class="text-primary mb-1">Tambah Bank</h2>
                <p class="m-0">Halaman tambah bank</p>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow py-3 px-3">
                <form action="/admin/bank/tambah/insert" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="bank">Jenis Bank</label>
                        <select name="namabank" id="bank" class="form-control @error('namabank') is-invalid @enderror">
                            <option value="BCA">BCA</option>
                            <option value="MANDIRI">MANDIRI</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rek">Nomor Rekening</label>
                        <input type="text" name="norekening" id="rek" class="form-control @error('norekening') is-invalid @enderror" minlength="1" maxlength="16">
                        @error('norekening')
                        <div class="invalid-feedback">
                            Nomor rekening harus di inputkan
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection