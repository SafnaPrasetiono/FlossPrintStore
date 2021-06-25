// tooltips bootstrap
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});


// pilihan warna
$(document).ready(function () {
    $(".color-pil").click(function () {
        var selectedcolor = $(this).attr("hex");
        $(".baju").css({
            "background-color": selectedcolor
        });

        if (selectedcolor === "#000000") {
            $(".editor").addClass('ubb');
        } else {
            $(".editor").removeClass('ubb');
        }
    });
});

// make coding to canvas front t-shirt
var frontCanvas = this.__canvas = new fabric.Canvas('front-canvas');
frontCanvas.setDimensions({
    height: 800.9,
    width: 200.9,
    cssOnly: true
});

// make coding to canvas back t-shirt
var backCanvas = this.__canvas = new fabric.Canvas('back-canvas');
backCanvas.setDimensions({
    height: 800.9,
    width: 200.9,
    cssOnly: true
});

var deleteIcon = "data:image/svg+xml,%3C%3Fxml version='1.0' encoding='utf-8'%3F%3E%3C!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'%3E%3Csvg version='1.1' id='Ebene_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='595.275px' height='595.275px' viewBox='200 215 230 470' xml:space='preserve'%3E%3Ccircle style='fill:%23F44336;' cx='299.76' cy='439.067' r='218.516'/%3E%3Cg%3E%3Crect x='267.162' y='307.978' transform='matrix(0.7071 -0.7071 0.7071 0.7071 -222.6202 340.6915)' style='fill:white;' width='65.545' height='262.18'/%3E%3Crect x='266.988' y='308.153' transform='matrix(0.7071 0.7071 -0.7071 0.7071 398.3889 -83.3116)' style='fill:white;' width='65.544' height='262.179'/%3E%3C/g%3E%3C/svg%3E";

var deleteImg = document.createElement('img');
deleteImg.src = deleteIcon;

fabric.Object.prototype.transparentCorners = false;
fabric.Object.prototype.cornerColor = 'blue';
fabric.Object.prototype.cornerStyle = 'circle';


$('#text-color').change(function () {
    if ($('#pill-front').hasClass('active')) {
        frontCanvas.getActiveObject().set({
            fill: this.value,
        });
        frontCanvas.renderAll();
    } else {
        backCanvas.getActiveObject().set({
            fill: this.value,
        });
        backCanvas.renderAll();
    }
    $('#text-color').val('0');
});
$('#text-stroke').change(function () {
    if ($('#pill-front').hasClass('active')) {
        frontCanvas.getActiveObject().set({
            stroke: this.value,
        });
        frontCanvas.renderAll();
    } else {
        backCanvas.getActiveObject().set({
            stroke: this.value,
        });
        backCanvas.renderAll();
    }
});

radios5 = $("[name=fonttype]"); // wijzig naar button
for (var i = 0, max = radios5.length; i < max; i++) {
    radios5[i].onclick = function () {
        if (document.getElementById(this.id).checked == true) {
            if (this.id == "text-cmd-bold") {
                frontCanvas.getActiveObject().set({ fontWeight: "bold" });
            }
            if (this.id == "text-cmd-italic") {
                frontCanvas.getActiveObject().set({ fontStyle: "italic" });
            }
            if (this.id == "text-cmd-underline") {
                frontCanvas.getActiveObject().set({ underline: true });
            }
            if (this.id == "text-cmd-linethrough") {
                frontCanvas.getActiveObject().set({ linethrough: true });
            }
            if (this.id == "text-cmd-overline") {
                frontCanvas.getActiveObject().set({ overline: true });
            }
        } else {
            if (this.id == "text-cmd-bold") {
                frontCanvas.getActiveObject().set({ fontWeight: "" });
            }
            if (this.id == "text-cmd-italic") {
                frontCanvas.getActiveObject().set({ fontStyle: "" });
            }
            if (this.id == "text-cmd-underline") {
                frontCanvas.getActiveObject().set({ underline: false });
            }
            if (this.id == "text-cmd-linethrough") {
                frontCanvas.getActiveObject().set({ linethrough: false });
            }
            if (this.id == "text-cmd-overline") {
                frontCanvas.getActiveObject().set({ overline: false });
            }
        }
        frontCanvas.renderAll();
    }
}
// font style in canvas baru di evaluasi
$(".text-style").click(function () {
    if ($('#pill-front').hasClass('active')) {
        frontCanvas.getActiveObject().set({
            fontFamily: $(this).attr('text'),
        });
        frontCanvas.renderAll();
    } else {
        backCanvas.getActiveObject().set({
            fontFamily: $(this).attr('text'),
        });
        backCanvas.renderAll();
    }
});
// $("[name=fontstyles]").change(function () {
//     if ($('#pill-front').hasClass('active')) {
//         frontCanvas.getActiveObject().set({
//             fontFamily: this.value,
//         });
//         frontCanvas.renderAll();
//     } else {
//         backCanvas.getActiveObject().set({
//             fontFamily: this.value,
//         });
//         backCanvas.renderAll();
//     }
// });
function deleteObject(eventData, target) {
    var frontCanvas = target.frontCanvas;
    frontCanvas.remove(target);
    frontCanvas.requestRenderAll();
}
// hapus depan canvas
$('#remove').click(function () {
    if ($('#pill-front').hasClass('active')) {
        var object = frontCanvas.getActiveObject();
        if (!object) {
            alert('Please select the element to remove');
            return '';
        }
        frontCanvas.remove(object);
    } else {
        var object = backCanvas.getActiveObject();
        if (!object) {
            alert('Please select the element to remove');
            return '';
        }
        backCanvas.remove(object);
    }
});
// memasukan logo ke canvas
function displayImage(e) {
    if ($('#pill-front').hasClass('active')) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var imgData = e.target.result;
                fabric.util.loadImage(imgData, function (img) {
                    var oImg = new fabric.Image(img);
                    oImg.scale(0.2).set({
                        left: 10,
                        top: 10,
                        objectCaching: false,
                    });
                    frontCanvas.add(oImg);
                    frontCanvas.setActiveObject(oImg);
                });
            }
            reader.readAsDataURL(e.files[0]);
        }
    } else {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var imgData = e.target.result;
                fabric.util.loadImage(imgData, function (img) {
                    var oImg = new fabric.Image(img);
                    oImg.scale(0.2).set({
                        left: 10,
                        top: 10,
                        objectCaching: false,
                    });
                    backCanvas.add(oImg);
                    backCanvas.setActiveObject(oImg);
                });
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    $('#remove').removeClass('d-none');
    $('#remove').addClass('d-block');
}

function textInputs() {
    if ($('#pill-front').hasClass('active')) {
        var text = $("#textInputs").val();

        if (text != 0) {
            var textbox = new fabric.Text(text, {
                left: 50,
                top: 50,
                width: 150,
                fontSize: 20
            });
            frontCanvas.add(textbox).setActiveObject(textbox);

            $("#textInputs").val("")
        }
    } else {
        var text = $("#textInputs").val();

        if (text != 0) {
            var textbox = new fabric.Text(text, {
                left: 50,
                top: 50,
                width: 150,
                fontSize: 20
            });
            backCanvas.add(textbox).setActiveObject(textbox);

            $("#textInputs").val("")
        }
    }
    $('#remove').removeClass('d-none');
    $('#remove').addClass('d-block');
}

if ($('#pill-front').hasClass('active')) {
    radios5 = $("[name=fonttype]"); // wijzig naar button
    for (var i = 0, max = radios5.length; i < max; i++) {
        radios5[i].onclick = function () {
            if (document.getElementById(this.id).checked == true) {
                if (this.id == "text-cmd-bold") {
                    frontCanvas.getActiveObject().set({ fontWeight: "bold" });
                }
                if (this.id == "text-cmd-italic") {
                    frontCanvas.getActiveObject().set({ fontStyle: "italic" });
                }
                if (this.id == "text-cmd-underline") {
                    frontCanvas.getActiveObject().set({ underline: true });
                }
                if (this.id == "text-cmd-linethrough") {
                    frontCanvas.getActiveObject().set({ linethrough: true });
                }
                if (this.id == "text-cmd-overline") {
                    frontCanvas.getActiveObject().set({ overline: true });
                }
            } else {
                if (this.id == "text-cmd-bold") {
                    frontCanvas.getActiveObject().set({ fontWeight: "" });
                }
                if (this.id == "text-cmd-italic") {
                    frontCanvas.getActiveObject().set({ fontStyle: "" });
                }
                if (this.id == "text-cmd-underline") {
                    frontCanvas.getActiveObject().set({ underline: false });
                }
                if (this.id == "text-cmd-linethrough") {
                    frontCanvas.getActiveObject().set({ linethrough: false });
                }
                if (this.id == "text-cmd-overline") {
                    frontCanvas.getActiveObject().set({ overline: false });
                }
            }
            frontCanvas.renderAll();
        }
    }
} else {
    radios5 = $("[name=fonttype]"); // wijzig naar button
    for (var i = 0, max = radios5.length; i < max; i++) {
        radios5[i].onclick = function () {
            if (document.getElementById(this.id).checked == true) {
                if (this.id == "text-cmd-bold") {
                    backCanvas.getActiveObject().set({ fontWeight: "bold" });
                }
                if (this.id == "text-cmd-italic") {
                    backCanvas.getActiveObject().set({ fontStyle: "italic" });
                }
                if (this.id == "text-cmd-underline") {
                    backCanvas.getActiveObject().set({ underline: true });
                }
                if (this.id == "text-cmd-linethrough") {
                    backCanvas.getActiveObject().set({ linethrough: true });
                }
                if (this.id == "text-cmd-overline") {
                    backCanvas.getActiveObject().set({ overline: true });
                }
            } else {
                if (this.id == "text-cmd-bold") {
                    backCanvas.getActiveObject().set({ fontWeight: "" });
                }
                if (this.id == "text-cmd-italic") {
                    backCanvas.getActiveObject().set({ fontStyle: "" });
                }
                if (this.id == "text-cmd-underline") {
                    backCanvas.getActiveObject().set({ underline: false });
                }
                if (this.id == "text-cmd-linethrough") {
                    backCanvas.getActiveObject().set({ linethrough: false });
                }
                if (this.id == "text-cmd-overline") {
                    backCanvas.getActiveObject().set({ overline: false });
                }
            }
            backCanvas.renderAll();
        }
    }
}


// printing or conver cavas
// $('#coverd').click(function () {
//     var imageSaver = $('#canvas-editor');
//     imageSaver.addEventListener('click', saveImage, false);

//     this.href = canvas.toDataURL({
//         format: 'png',
//         quality: 0.8
//     });
//     this.download = 'hasil.png';
// });



// proses canvas
$("#procesed").on("click", function () {

    $('#loading-render').addClass('d-block');
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    if ($('#pill-front').hasClass('active')) {
        html2canvas(document.querySelector("#canvasdesainerfront")).then(function (CF) {
            var datacanvasfront = CF.toDataURL("image/png", 1);
            var CSRF_TOKEN = $('meta[name="csrf-token-front"]').attr('content');
            $.ajax({
                url: '/pemesanan/sablon/render',
                data: { _token: CSRF_TOKEN, imgFront: datacanvasfront },
                type: 'POST',
                error: function () {
                    if ($('#loading-render').hasClass('d-block')) {
                        $('#loading-render').removeClass('d-block');
                        $('#loading-render').addClass('d-none');
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: 'Proses render tidak dapat dilakukan, Ulangi...',
                        showConfirmButton: true,
                    });
                }
            });
        });
        $('#pill-front').removeClass('show active');
        $('#pill-back').addClass('show active');
        html2canvas(document.querySelector("#canvasdesainerback")).then(function (CB) {
            var datacanvasback = CB.toDataURL("image/png", 1);
            var CSRF_TOKEN = $('meta[name="csrf-token-back"]').attr('content');
            $.ajax({
                url: '/pemesanan/sablon/render',
                data: { _token: CSRF_TOKEN, imgBack: datacanvasback, },
                type: 'POST',
                success: function () {
                    window.location.href = "/pemesanan/sablon";
                },
                error: function () {
                    if ($('#loading-render').hasClass('d-block')) {
                        $('#loading-render').removeClass('d-block');
                        $('#loading-render').addClass('d-none');
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: 'Proses render tidak dapat dilakukan, Ulangi...',
                        showConfirmButton: true,
                    });
                }
            });
        });
    } else {
        $('#pill-back').removeClass('show active');
        $('#pill-front').addClass('show active');
        html2canvas(document.querySelector("#canvasdesainerfront")).then(function (CF) {
            var datacanvasfront = CF.toDataURL("image/png", 1);
            var CSRF_TOKEN = $('meta[name="csrf-token-front"]').attr('content');
            $.ajax({
                url: '/pemesanan/sablon/render',
                data: { _token: CSRF_TOKEN, imgFront: datacanvasfront },
                type: 'POST',
                error: function () {
                    if ($('#loading-render').hasClass('d-block')) {
                        $('#loading-render').removeClass('d-block');
                        $('#loading-render').addClass('d-none');
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: 'Proses render tidak dapat dilakukan, Ulangi...',
                        showConfirmButton: true,
                    });
                }
            });
        });
        $('#pill-front').removeClass('show active');
        $('#pill-back').addClass('show active');
        html2canvas(document.querySelector("#canvasdesainerback")).then(function (CB) {
            var datacanvasback = CB.toDataURL("image/png", 1);
            var CSRF_TOKEN = $('meta[name="csrf-token-back"]').attr('content');
            $.ajax({
                url: '/pemesanan/sablon/render',
                data: { _token: CSRF_TOKEN, imgBack: datacanvasback, },
                type: 'POST',
                success: function () {
                    window.location.href = "/pemesanan/sablon";
                },
                error: function () {
                    if ($('#loading-render').hasClass('d-block')) {
                        $('#loading-render').removeClass('d-block');
                        $('#loading-render').addClass('d-none');
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: 'Proses render tidak dapat dilakukan, Ulangi...',
                        showConfirmButton: true,
                    });
                }
            });
        });
    }

});



function deleteObject(eventData, target) {
    var canvas = target.canvas;
    canvas.remove(target);
    canvas.requestRenderAll();
}
