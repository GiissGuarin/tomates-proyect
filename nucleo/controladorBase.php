<?php
class ControladorBase{
 
    public function __construct() {
        require_once 'conectar.php';
        require_once 'entidadBase.php';
        require_once 'modeloBase.php';
         
        //Incluir todos los modelos
        foreach(glob("modelo/*.php") as $file){
            require_once $file;
        }
    }

    public function PantallaVista($vista){
        require_once 'nucleo/ayudaVistas.php';
        $helper = new ayudaVistas();
        require_once 'vistas/'.$vista.'Vista.php';
    }
     
/* */
    public function vistas($vista,$datos){
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc}=$valor;
        }
         
        require_once 'nucleo/ayudaVistas.php';
        $helper=new ayudaVistas();
     
        require_once 'vistas/'.$vista.'Vista.php';
    }
     
    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        header("Location:index.php?controlador=".$controlador."&action=".$accion);
    }
     
    //Métodos para los controladores
 
}
?>
