<?php

    


    function select_sql($nombre,$validacion,$sql,$parametros){

        include 'db_connect.php';  
        
        $val = explode("|",$parametros);
        $select ="<select class='form-control form-control-sm select2' name='".$nombre."'>";
        $select.= "<option></option>";
        $consulta = $conn->query($sql);
        while($row= $consulta->fetch_assoc()):
            if ($validacion == $row[$val[0]]) {
            $seleccionado = "selected";
            }else{
                $seleccionado = "";
            }
            $select .= "<option ".$seleccionado." value='".$row[$val[0]]."'>".($row[$val[1]])."</option>";
        endwhile;
        $select.="</select>";
        return $select;
    }

    function select_varios($nombre,$validacion,$parametros){

        $values = explode("|",$parametros);
        $numero = count($values);
        $select ="<select class='form-control form-control-sm select2' name='".$nombre."'>";
        $select.= "<option></option>";
        
        for ($i=0; $i < $numero ; $i++) { 
            $val = explode("=", $values[$i]);
            if ($validacion == $val[0]) {
                $seleccionado = "selected";
                }else{
                    $seleccionado = "";
                }
                $select .= "<option ".$seleccionado." value='".$val[0]."'>".($val[1])."</option>";
        }
        $select.="</select>";
        return $select;
    }

    function calculaedad($fechanacimiento){
        $hoy = date( "Ymd" ) ;
        $diff = date_diff ( date_create ( $fechanacimiento ) , date_create ( $hoy )) ;
        
          
        return $diff->format('%y')." Old Year";
      }

?>