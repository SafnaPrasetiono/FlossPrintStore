$('#btn-slider').click(function () {
    $('#slider-panel').addClass(' slider-active');
    $('#slider-back').addClass(' slider-active-back');
});

$('#slider-back').click(function () {
    $('#slider-panel').removeClass('slider-active');
    $('#slider-back').removeClass(' slider-active-back');
    $('#slider-panel').addClass(' slider-deactive');
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});


// ini adalah fungsi pada ubah produk
// lihat pada tombol menambahakan foto produk
function proceseduploadfoto(e){
    if(e.files[0]){
        $('#prosesuploadfoto').click();   
    }
}


function displayImage(e){
    if(e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            $('#displayGambar').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        $("#postpic").click();
    }
}