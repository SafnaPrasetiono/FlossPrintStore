function optImages(opt){
    if(opt.files[0]){
        var reader = new FileReader();

        reader.onload = function(opt){
            document.querySelector('#displayGambar').setAttribute('src', opt.target.result);
        }
        reader.readAsDataURL(opt.files[0]);
    }
}

$(document).ready(function () {
    if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function (e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function (e) {
                    var file = e.target;
                    var data = $("<li class=\"pip nav-link\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<span class=\"remove fa fa-trash btn btn-danger px-2 py-1\" onchange=\"hapus("+i+")\"></span>" +
                        "</li>");
                        $('#gallery').append(data);
                    $(".remove").click(function () {
                        $(this).parent(".pip").remove();
                        function hapus(dl) {
                            $(this).unset(files[dl]);
                        }
                    });

                    // Old code here
                    /*$("<img></img>", {
                      class: "imageThumb",
                      src: e.target.result,
                      title: file.name + " | Click to remove"
                    }).insertAfter("#files").click(function(){$(this).remove();});*/

                });
                fileReader.readAsDataURL(f);
            }
        });
    } else {
        alert("Web Browser kamu tidak suport API!")
    }
});


// $(function () {
//     // Multiple images preview in browser
//     var imagesPreview = function (i, placeToInsertImagePreview) {

//         if (i.files) {
//             var filesAmount = i.files.length;

//             for ($i = 0; $i < filesAmount; $i++) {
//                 var reader = new FileReader();

//                 reader.onload = function (event) {
//                     $($.parseHTML('<img class="gambar-' + $i + '">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
//                     $($.parseHTML('<span class="fa fa-trash remove' + $i + '"></span>')).appendTo(placeToInsertImagePreview);
//                 }

//                 reader.readAsDataURL(i.files[$i]);
//             }
//         }

//     };

//     $('.gallery-photo-add').on('change', function () {
//         imagesPreview(this, 'div.gallery');
//         $('.click-btn').addClass('d-none');
//     });
// });


function displayImagesUpdate(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.querySelector('#displayGambar').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}



// di pemesanan
$('#data-p').change(function(){
    if($(this).val() != null){
        $('#proses-tipe').click();
    }
});