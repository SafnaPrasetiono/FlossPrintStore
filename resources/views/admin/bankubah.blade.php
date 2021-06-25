@extends('admin.layouts.panel')

@section('title')
<title>FlossPrint - Dashboard</title>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="row">

        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow py-3 px-3">
                <h2 class="text-primary mb-1">Ubah Bank</h2>
                <p class="m-0">Halaman Ubah Data Bankk</p>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="bg-white rounded shadow py-3 px-3">
                <form action="/admin/bank/ubah/update" method="post">
                    @csrf
                    <input type="hidden" name="idbank" value="{{ $bank->id_bank }}">
                    <div class="form-group">
                        <label for="bank">Jenis Bank</label>
                        <select name="namabank" id="bank" class="form-control @error('namabank') is-invalid @enderror">
                            <option value="BCA" @if($bank->nama_bank === 'BCA') selected @endif >BCA</option>
                            <option value="MANDIRI" @if($bank->nama_bank === 'MANDIRI') selected @endif >MANDIRI</option>
                            <option value="BNI" @if($bank->nama_bank === 'BNI') selected @endif >BNI</option>
                            <option value="BRI" @if($bank->nama_bank === 'BRI') selected @endif >BRI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rek">Nomor Rekening</label>
                        <input type="text" name="norekening" id="rek" class="form-control @error('norekening') is-invalid @enderror" minlength="1" maxlength="16" value="{{ $bank->nomor_rekening }}">
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