function Edad(value, campo){
    var hoy = new Date();
    var cumpleanos = new Date(value);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }


    $('#'+campo).val(edad + " Old year");
}