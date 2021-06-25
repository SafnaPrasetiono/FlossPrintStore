function ImgBajuDepan(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#displayDepan').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
function ImgBajuBelakang(x) {
    if (x.files[0]) {
        var reader = new FileReader();

        reader.onload = function (x) {
            $('#displayBelakang').attr('src', x.target.result);
        }
        reader.readAsDataURL(x.files[0]);
    }
}


// UKURAN
$('#ukuran').change(function () {
    var harga = 0;
    if ($(this).val() == "S") {
        if ($('#bahan').val() == "combed-20s") {
            harga = 75000;
        } else if ($('#bahan').val() == "combed-24s") {
            harga = 72000;
        } else if ($('#bahan').val() == "combed-30s") {
            harga = 70000;
        } else if ($('#bahan').val() == "cotton-bambo") {
            harga = 75000;
        }
    } else if ($(this).val() == "M") {
        if ($('#bahan').val() == "combed-20s") {
            harga = 75000;
        } else if ($('#bahan').val() == "combed-24s") {
            harga = 72000;
        } else if ($('#bahan').val() == "combed-30s") {
            harga = 70000;
        } else if ($('#bahan').val() == "cotton-bambo") {
            harga = 75000;
        }
    } else if ($(this).val() == "L") {
        if ($('#bahan').val() == "combed-20s") {
            harga = 80000;
        } else if ($('#bahan').val() == "combed-24s") {
            harga = 78000;
        } else if ($('#bahan').val() == "combed-30s") {
            harga = 75000;
        } else if ($('#bahan').val() == "cotton-bambo") {
            harga = 80000;
        }
    } else if ($(this).val() == "XL") {
        if ($('#bahan').val() == "combed-20s") {
            harga = 80000;
        } else if ($('#bahan').val() == "combed-24s") {
            harga = 78000;
        } else if ($('#bahan').val() == "combed-30s") {
            harga = 75000;
        } else if ($('#bahan').val() == "cotton-bambo") {
            harga = 80000;
        }
    } else if ($(this).val() == "XXL") {
        if ($('#bahan').val() == "combed-20s") {
            harga = 85000;
        } else if ($('#bahan').val() == "combed-24s") {
            harga = 82000;
        } else if ($('#bahan').val() == "combed-30s") {
            harga = 80000;
        } else if ($('#bahan').val() == "cotton-bambo") {
            harga = 85000;
        }
    }
    // konversi harga
    var number_string = harga.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    $("#total").val(harga);
    $("#hrg").html(rupiah);

    // jumlah total sementara
    var total = $("#jump").val() * harga;
    var number_string = total.toString(),
        sisa = number_string.length % 3,
        totalrupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        totalrupiah += separator + ribuan.join('.');
    }
    $("#valuetotal").html(totalrupiah);
});

// BAHAN
$('#bahan').change(function () {
    var harga = 0;
    if ($(this).val() === "combed-20s") {
        if ($('#ukuran').val() === 'S') {
            harga = 75000;
        } else if ($('#ukuran').val() == 'M') {
            harga = 75000;
        } else if ($('#ukuran').val() == 'L') {
            harga = 80000;
        } else if ($('#ukuran').val() == 'XL') {
            harga = 80000;
        } else if ($('#ukuran').val() == 'XXL') {
            harga = 85000;
        }
    } else if ($(this).val() === "combed-24s") {
        if ($('#ukuran').val() === 'S') {
            harga = 72000;
        } else if ($('#ukuran').val() == 'M') {
            harga = 72000;
        } else if ($('#ukuran').val() == 'L') {
            harga = 78000;
        } else if ($('#ukuran').val() == 'XL') {
            harga = 78000;
        } else if ($('#ukuran').val() == 'XXL') {
            harga = 82000;
        }
    } else if ($(this).val() === "combed-30s") {
        if ($('#ukuran').val() == 'S') {
            harga = 70000;
        } else if ($('#ukuran').val() == 'M') {
            harga = 70000;
        } else if ($('#ukuran').val() == 'L') {
            harga = 75000;
        } else if ($('#ukuran').val() == 'XL') {
            harga = 75000;
        } else if ($('#ukuran').val() == 'XXL') {
            harga = 80000;
        }
    } else if ($(this).val() === "cotton-bambo") {
        if ($('#ukuran').val() == 'S') {
            harga = 75000;
        } else if ($('#ukuran').val() == 'M') {
            harga = 75000;
        } else if ($('#ukuran').val() == 'L') {
            harga = 80000;
        } else if ($('#ukuran').val() == 'XL') {
            harga = 80000;
        } else if ($('#ukuran').val() == 'XXL') {
            harga = 85000;
        }
    }
    // konversi harga
    var number_string = harga.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    $("#total").val(harga);
    $("#hrg").html(rupiah);


    // jumlah total sementara
    var total = $("#jump").val() * harga;
    var number_string = total.toString(),
        sisa = number_string.length % 3,
        totalrupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        totalrupiah += separator + ribuan.join('.');
    }
    $("#valuetotal").html(totalrupiah);
});

// JUMLAH
$('#jump').change(function () {
    $("#qtyp").html($(this).val());
    var total = $(this).val() * $("#total").val();
    var number_string = total.toString(),
        sisa = number_string.length % 3,
        totalrupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        totalrupiah += separator + ribuan.join('.');
    }
    $("#valuetotal").html(totalrupiah);
});