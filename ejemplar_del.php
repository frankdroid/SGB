<?php
session_start();
include("classes/bd.php");
include("classes/ejemplares.php");

$ejemplar = new Ejemplares();

if ($_POST[id_ejemplar]) {
	
	$id_miembro = $_POST[id_ejemplar];
	$id_usuario = $_SESSION[id_usuario];
	$ejemplar->Eliminar($id_miembro,$id_usuario);
	print "Se ha eliminado con éxito";
}
?>
