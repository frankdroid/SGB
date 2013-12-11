<?php
include("classes/bd.php");
include("classes/ejemplares.php");
include("classes/prestamos.php");

$ejemplar = new Ejemplares();

// Verifica si se agregaron ejemplares temporales
if ($_POST[id_prestamotmp]) {
	$id_prestamotmp = $_POST[id_prestamotmp];
	$ejemplar->Ejemplartmp_cons($id_prestamotmp);
	$filas = $ejemplar->Num_rows();
	if ($filas > 0) {
		echo "true";
	} else {
		echo "false";	
	}
}
?>