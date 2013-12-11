<?php 
session_start();
include("classes/bd.php");

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$basedato = new Base_datos();

if($_POST[respaldar]) {
	$basedato->Backup();
}

if($_POST[optimizar]) {
	$basedato->Optimizar();
}


?>