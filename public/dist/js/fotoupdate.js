function displayImageUP(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.querySelector('#displayGambar').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        $("#postpic").click();
    }
}