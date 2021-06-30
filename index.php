<?php
session_start();
//Configuración global
require_once 'config/configDefecto.php';

//Base para los controladores
require_once 'nucleo/controladorBase.php';

//Funciones para el controlador frontal
require_once 'nucleo/controladorFrontal.func.php';

//Cargamos controladores y acciones}
if (isset($_SESSION['rol'])) {
	if (isset($_GET["controlador"])) {

		$controllerObj = cargarControlador($_GET["controlador"]);
		lanzarAccion($controllerObj);
	} else {
		$controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
		lanzarAccion($controllerObj);
	}
} else {
	if (isset($_GET["controlador"])) {

		if ($_GET["controlador"] == "iniciar" && $_GET["action"] == "index") {
			$controllerObj = cargarControlador($_GET["controlador"]);
			lanzarAccion($controllerObj);
		} elseif ($_GET["controlador"] == "iniciar" && $_GET["action"] == "sesion") {

			$controllerObj = cargarControlador($_GET["controlador"]);
			lanzarAccion($controllerObj);
		} elseif ($_GET["controlador"] == "noLog") {
			$controllerObj = cargarControlador($_GET["controlador"]);
			lanzarAccion($controllerObj);
		} else {
			$controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
			lanzarAccion($controllerObj);
		}
		/*  
	}else{
		$controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
  	  	lanzarAccion($controllerObj);
	*/
	} else {
		$controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
		lanzarAccion($controllerObj);
	}
	/*
	
	*/
}
