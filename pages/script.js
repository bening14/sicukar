//ambil data
var keyword = document.getElementById('keyword');

keyword.addEventListener('keyup', function () {
    //ajax
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            namas.innerHTML = xhr.responseText;
            $("#namas").show();
        }
    }

    //eksekusi ajax
    xhr.open('GET', 'ajax/data.php?keyword=' + keyword.value, true);
    xhr.send();
});
