<?php
session_start();
include("classes/bd.php");
include("classes/prestamos.php");

$prestamo = new Prestamos();

if ($_POST[id_prestamo]) {	
	$id_prestamo = $_POST[id_prestamo];
	$prestamo->Devolver($id_prestamo);
	print "Se ha devuelto el préstamo con éxito";
}
?>
