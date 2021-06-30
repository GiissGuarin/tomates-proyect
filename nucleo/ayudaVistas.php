<?php
class ayudaVistas{
     
    public function url($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        $urlString="index.php?controlador=".$controlador."&action=".$accion;
        return $urlString;
    }
     
    //para las vistas
}
?>
