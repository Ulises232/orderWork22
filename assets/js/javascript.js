function Edad(value, campo) {
    var hoy = new Date();
    var cumpleanos = new Date(value);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }


    $('#' + campo).val(edad + " Old year");
}


function modalEdicion(titulo, url, tamaño) {
    uni_modal("<i class='fa fa-plus'></i>" + titulo, url, tamaño)
}

function accionPaginas(mensaje, funcion, parametros) {
    _confArchivar(mensaje, funcion, parametros)
}


function archivar($url,$id,$accion) {
    console.log($id);
    start_load()
    $.ajax({
        url: $url+'ajax.php?action=' + $accion + '_archivar',
        method: 'POST',
        data: {
            id: $id
        },
        success: function (resp) {
            if (resp == 1) {
                alert_toast("Data successfully deleted", 'success')
                setTimeout(function () {
                    location.reload()
                }, 1500)

            }
        }
    })
}