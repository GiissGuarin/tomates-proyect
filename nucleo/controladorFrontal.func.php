<?php
//FUNCIONES PARA EL CONTROLADOR FRONTAL
 
function cargarControlador($controller){
    $controlador= $controller.'Controller';
    $strFileController='controladores/'.$controlador.'.php';
     
    if(!is_file($strFileController)){
        $strFileController='controladores/'.CONTROLADOR_DEFECTO.'Controller.php';  
    }
     
    require_once $strFileController;
    $controllerObj = new $controlador();
    return $controllerObj;
}
 
function cargarAccion($controllerObj,$action){
    $accion=$action;
    $controllerObj->$accion();
}
 
function lanzarAccion($controllerObj){
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        cargarAccion($controllerObj, $_GET["action"]);
    }else{
        cargarAccion($controllerObj, ACCION_DEFECTO);
    }
}
 
?>
