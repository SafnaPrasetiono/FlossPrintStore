<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <title>Laporan Data Pemesanan FlossPrint Studio</title>
</head>

<body>
    <div class="d-block text-center w-100 mb-4">
        <h3 class="text-dark d-block">Laporan Data Pemesanan FlossPrint Studio</h3>
        <h5 class="d-block"><a href="www.flossprint.store">www.flossprint.store</a></h5>
        <hr class="soft">
    </div>
    <div class="d-block w-100 mb-3">
        <div class="d-flex">
            <strong>Jenis Pemesanan : {{$jenis}}</strong>
        </div>
        <div class="d-flex">
            <strong>Tanggal Awal    : {{$tglmulai}}</strong>
        </div>
        <div class="d-flex">
            <strong>Tanggal Akhir   : {{$tglakhir}}</strong>
        </div>
        <div class="d-flex">
            <strong>Jumlah Data     : {{ count($datalaporan) }}</strong>
        </div>
    </div>

    <div class="d-block w-100">
        <table class="table table-bordered">
            <thead class="text-uppercase font-weight-bold">
                <tr>
                    <th>No</th>
                    <th>pelanggan</th>
                    <th>Tipe</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $x = 1; ?>
                <?php $total = 0; ?>
                @foreach($datalaporan as $data)
                <?php $total += $data->harga; ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td>{{ $data->nama_lengkap }}</td>
                    <td>{{ $data->tipe }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->status }}</td>
                    <td>Rp. {{ number_format($data->harga)}}</td>
                </tr>
                <?php $x++; ?>
                @endforeach
                <tr class="">
                    <td colspan="5" class="text-uppercase">Total Pendapatan</td>
                    <td>Rp. <?php echo number_format($total); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script type="text/javascript" src="{{ url('/dist/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('/dist/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>