<?php
session_start();
include("classes/bd.php");
include("classes/autores.php");

$autor = new Autores();

if ($_POST[id_autor]) {
	$id_autor = $_POST[id_autor];
	$autor->Eliminar($id_autor);
	print "Se ha eliminado el registro del autor";
}
?>
