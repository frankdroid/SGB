<?php
session_start();
include("classes/bd.php");
include("classes/miembros.php");

$miembro = new Miembros();

if ($_POST[id_miembro]) {
	
	$id_miembro = $_POST[id_miembro];
	$miembro->Eliminar($id_miembro);
	print "Se ha eliminado con éxito";
}
?>
