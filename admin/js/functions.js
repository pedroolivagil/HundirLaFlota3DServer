/**
 * Created by Oliva on 09/08/2017.
 */

function ajax(url, data, div, func) {
    /* para cargar las paginas mediante ajax de jquery */
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (sms) {
            $('#' + div).html(sms);
            if (func !== null) {
                func();
            }
        },
        error: function (sms) {
            alert("Error");
        }
    });
}

function loadClassOptions() {
    var data = new FormData();
    data.append("clase", $('#entities').val());
    ajax('www/showForm.php', data, 'response', null);
}