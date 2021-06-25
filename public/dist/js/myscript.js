
$(document).ready(function () {
    //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
    //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
    $('select[name="province_id"]').on('change', function () {
        // kita buat variable provincedid untk menampung data id select province
        let provinceid = $(this).val();
        //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
        if (provinceid) {
            // jika di temukan id nya kita buat eksekusi ajax GET
            jQuery.ajax({
                // url yg di root yang kita buat tadi
                url: "/kota/" + provinceid,
                // aksion GET, karena kita mau mengambil data
                type: 'GET',
                // type data json
                dataType: 'json',
                // jika data berhasil di dapat maka kita mau apain nih
                success: function (data) {
                    // jika tidak ada select dr provinsi maka select kota kososng / empty
                    $('select[name="kota_id"]').empty();
                    // jika ada kita looping dengan each
                    $.each(data, function (key, value) {
                        // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                        $('select[name="kota_id"]').append('<option value="' + value.city_id + '" namakota="' + value.type + ' ' + value.city_name + '">' + value.type + ' ' + value.city_name + '</option>');
                    });
                }
            });
        } else {
            $('select[name="kota_id"]').empty();
        }
    });
});

$('select[name="kurir"]').on('change', function () {
    // kita buat variable untuk menampung data data dari  inputan
    // name city_origin di dapat dari input text name city_origin
    // let origin = 6;
    // name kota_id di dapat dari select text name kota_id
    let destination = $("select[name=kota_id]").val();
    // name kurir di dapat dari select text name kurir
    let courier = $("select[name=kurir]").val();
    // name weight di dapat dari select text name weight
    let weight = $("input[name=weight]").val();
    // alert(courier);
    if (courier) {
        jQuery.ajax({
            url: "/pemesanan/" + destination + "/" + weight + "/" + courier,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('select[name="layanan"]').empty();
                // ini untuk looping data result nya
                $('select[name="layanan"]').append('<option value="">-- Pilih Layanan --</option>');
                $.each(data, function (key, value) {
                    // ini looping data layanan misal jne reg, jne oke, jne yes
                    $.each(value.costs, function (key1, value1) {
                        // ini untuk looping cost nya masing masing
                        // silahkan pelajari cara menampilkan data json agar lebi paham
                        $.each(value1.cost, function (key2, value2) {
                            $('select[name="layanan"]').append('<option value="' + key1 + '" harga="' + value2.value + '">' + value1.service + ' / ' + value1.description + ' / ' + value2.etd + 'Hari Pengiriman /' + value2.value + '</option>');
                        });
                    });
                });
            }
        });

        // $("input[name=nmlayanan]").val();
        // $("input[name=deslayanan]").val();
        // $("input[name=ketlayanan]").val();
        // $("input[name=hrglayanan]").val();
    } else {
        $('select[name="layanan"]').empty();
    }

});


$("#layanan").change(function () {

    // ambil nilai
    // var harga = $("#benih option:selected").attr("harga");
    var harga = $("#layanan option:selected").attr("harga");

    var number_string = harga.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    // pindahkan nilai ke html
    $("#ipongkir").val(harga);
    $("#isiHrgOngkir").remove();
    $("#listongkir").append('<b id="isiHrgOngkir" class="ml-2">' + rupiah + '</b>');


    var subtotal = $("#iptotal").val();
    var gharga = parseInt(subtotal) + parseInt(harga);

    var number_string = gharga.toString(),
        sisa = number_string.length % 3,
        grandharga = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        separator = sisa ? '.' : '';
        grandharga += separator + ribuan.join('.');
    }

    // pindahkan nilai ke html
    $("#grandtotal").remove();
    $("#grandharga").append('<b id="grandtotal" class="ml-2">' + grandharga + '</b>');
});












function getPos() {
    var Pos = $(window).scrollTop();
    return Pos;
}

$(window).scroll(function () {
    if (getPos() > 55) {
        $(".navbar").addClass(" navstyle");
        $(".main").addClass(" mainMargin");
    } else {
        $(".navbar").removeClass(" navstyle");
        $(".main").removeClass(" mainMargin");
    }
});

$(document).ready(function () {
    $('#qty-field').prop('disabled', true);
    $('#plus').click(function () {
        $('#qty-field').val(parseInt($('#qty-field').val()) + 1);
    });
    $('#minus').click(function () {
        $('#qty-field').val(parseInt($('#qty-field').val()) - 1);
        if ($('#qty-field').val() == 0) {
            $('#qty-field').val(1);
        }

    });

});



// scripte read more atau selengkapnya ada di detail produk
$(document).ready(function () {
    var readmore = $(".selengkapnya").html();
    var lessText = readmore.substr(0, 100);

    if (readmore.length > 100) {
        $(".selengkapnya").html(lessText).append("<a href='' class='more-link text-dark'>... <span class='text-success'>Selengkapnya</span></a>");
    } else {
        $("#selengkapnya").html(readmore);
    }

    $("body").on("click", ".more-link", function (event) {
        event.preventDefault();
        $(this).parent(".selengkapnya").html(readmore);
    });

    // $("body").on("click", ".less-link", function(){
    //     event.preventDefault();
    //     $(this).parent("#selengkapnya").html(readmore.substr(0,100)).append("<a href='#more-link' class='more-link'>Selengkapnya...</a>");
    // });
});


// plus minus button order produk
jQuery(function () {
    var j = jQuery; //Just a variable for using jQuery without conflicts
    var addInput = '#qty'; //This is the id of the input you are changing
    var n = 1; //n is equal to 1

    //Set default value to n (n = 1)
    j(addInput).val(n);

    //On click add 1 to n
    j('#plus').on('click', function () {
        j(addInput).val(++n);
    })

    j('#min').on('click', function () {
        //If n is bigger or equal to 1 subtract 1 from n
        if (n >= 1) {
            j(addInput).val(--n);
        } else {
            //Otherwise do nothing
        }
    });
});



// upload bukti pembayaran
function buktiImages(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.buktiImages').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}



// make button rating script
$(document).ready(function () {
    $('.idproduk').click(function () {
        var $idproduk = $(this).attr('produk');
        $('#idprodukvalues').val($idproduk);
    });

    $('#range-1').click(function () {
        $('#range-1').addClass('text-warning');
        if ($('#range-2').hasClass('text-warning')) {
            $('#range-2').removeClass('text-warning');
        }
        if ($('#range-3').hasClass('text-warning')) {
            $('#range-3').removeClass('text-warning');
        }
        if ($('#range-4').hasClass('text-warning')) {
            $('#range-4').removeClass('text-warning');
        }
        if ($('#range-4').hasClass('text-warning')) {
            $('#range-4').removeClass('text-warning');
        }
        if ($('#range-5').hasClass('text-warning')) {
            $('#range-5').removeClass('text-warning');
        }
        $('#range-values').val(20);
    });
    $('#range-2').click(function () {
        $('#range-1').addClass('text-warning');
        $('#range-2').addClass('text-warning');
        if ($('#range-3').hasClass('text-warning')) {
            $('#range-3').removeClass('text-warning');
        }
        if ($('#range-4').hasClass('text-warning')) {
            $('#range-4').removeClass('text-warning');
        }
        if ($('#range-5').hasClass('text-warning')) {
            $('#range-5').removeClass('text-warning');
        }
        $('#range-values').val(40);
    });
    $('#range-3').click(function () {
        $('#range-1').addClass('text-warning');
        $('#range-2').addClass('text-warning');
        $('#range-3').addClass('text-warning');
        if ($('#range-4').hasClass('text-warning')) {
            $('#range-4').removeClass('text-warning');
        }
        if ($('#range-5').hasClass('text-warning')) {
            $('#range-5').removeClass('text-warning');
        }
        $('#range-values').val(60);
    });
    $('#range-4').click(function () {
        $('#range-1').addClass('text-warning');
        $('#range-2').addClass('text-warning');
        $('#range-3').addClass('text-warning');
        $('#range-4').addClass('text-warning');
        if ($('#range-5').hasClass('text-warning')) {
            $('#range-5').removeClass('text-warning');
        }
        $('#range-values').val(80);
    });
    $('#range-5').click(function () {
        $('#range-1').addClass('text-warning');
        $('#range-2').addClass('text-warning');
        $('#range-3').addClass('text-warning');
        $('#range-4').addClass('text-warning');
        $('#range-5').addClass('text-warning');
        $('#range-values').val(100);
    });
});
