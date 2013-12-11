<?php 
session_start();
include("classes/bd.php");
include("classes/ejemplares.php"); 

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

if ($_GET[id]) {
	$id = $_GET[id];
	
	$ejemplar = new Ejemplares();
	$ejemplar->Buscar2($id);
	$row = $ejemplar->Fetch_array();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Gestion Biblioteca - Bienvenido</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
$(document).ready(function() {
		
});
</script>
</head>

<body class="fondo_view">
		<h1 align="center">Detalles del Ejemplar </h1>
		<br />
<table border="0" align="center" cellpadding="8" cellspacing="2">
          <tr>
            <td scope="col">Cota</td>
            <td class="campos_ver" scope="col"><?php print $row[cota]?>&nbsp;</td>
            <td scope="col">Cota Libro              </td>
            <td class="campos_ver" scope="col"><?php print $row[cota_l]?>&nbsp;</td>
          </tr>
          <tr>
            <td scope="col">Título</td>
            <td class="campos_ver" scope="col"><?php print $row[titulo]?></td>
            <td scope="col">Edición</td>
            <td class="campos_ver" scope="col"><?php print $row[edicion]?></td>
          </tr>
          <tr>
            <td scope="col">Editorial</td>
            <td class="campos_ver" scope="col"><?php print $row[editorial]?></td>
            <td scope="col">ISBN</td>
            <td class="campos_ver" scope="col"><?php print $row[isbn]?></td>
          </tr>
          <tr>
            <td>Condicion</td>
            <td class="campos_ver"><?php print $row[condicion]?></td>
            <td>Prestamo</td>
            <td class="campos_ver"><?php print $row[prestamo]?></td>
          </tr>
          <tr>
            <td>Estado</td>
            <td class="campos_ver"><?php print $row[estado]?></td>
            <td colspan="2" >&nbsp;</td>
          </tr>
          <tr>
            <td>Creado Por</td>
            <td class="campos_ver"><?php print $row[creado_por]?></td>
            <td>Modificado Por</td>
            <td class="campos_ver"><?php print $row[modificado_por]?></td>
          </tr>
</table>
</body>
</html>