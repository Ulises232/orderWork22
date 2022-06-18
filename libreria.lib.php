<?php


function ejecuta_consulta($sql){
    include 'db_connect.php';

    return $conn->query($sql);
}


function select_sql($nombre, $validacion, $sql, $valor, $texto, $parametros_select = "")
{

    include 'db_connect.php';

    $select = "<select " . $parametros_select . " class='form-control form-control-sm select2' name='" . $nombre . "'>";
    $select .= "<option></option>";
    $consulta = $conn->query($sql);
    while ($row = $consulta->fetch_assoc()) :
        if ($validacion == $row[$valor]) {
            $seleccionado = "selected";
        } else {
            $seleccionado = "";
        }
        $select .= "<option  " . $seleccionado . " value='" . $row[$valor] . "'>" . ($row[$texto]) . "</option>";
    endwhile;
    $select .= "</select>";
    return $select;
}

function select_varios($nombre, $validacion, $parametros)
{

    $values = explode("|", $parametros);
    $numero = count($values);
    $select = "<select class='form-control form-control-sm select2' name='" . $nombre . "'>";
    $select .= "<option></option>";

    for ($i = 0; $i < $numero; $i++) {
        $val = explode("=", $values[$i]);
        if ($validacion == $val[0]) {
            $seleccionado = "selected";
        } else {
            $seleccionado = "";
        }
        $select .= "<option " . $seleccionado . " value='" . $val[0] . "'>" . ($val[1]) . "</option>";
    }
    $select .= "</select>";
    return $select;
}

function calculaedad($fechanacimiento)
{
    $hoy = date("Ymd");
    $diff = date_diff(date_create($fechanacimiento), date_create($hoy));


    return $diff->format('%y') . " Old Year";
}

function mysqli_este($sql,$campo){
    include 'db_connect.php';
    $qry = ejecuta_consulta($sql);

    while ($row = $qry->fetch_assoc()) :
        if ($row[$campo]) {
            return $row[$campo];
        }

    endwhile;
    
}

function actualizaFolio($campo,$cantidad){
    $retorna = ejecuta_consulta("UPDATE renum_parametros SET $campo = $cantidad + $campo WHERE 1");
}

function calculaFolio($sql, $campo){
    return mysqli_este($sql,$campo);
}

function ejecutaJS($js){
    ?>
        <script><?php echo $js; ?></script>
    <?php
}