<?php 
session_start();
include("classes/bd.php");
include("classes/miembros.php"); 

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

if ($_GET[id]) {
	$id = $_GET[id];
	
	$miembro = new Miembros();
	$miembro->Buscar($id);
	$row = $miembro->Fetch_array();
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
		<h1 align="center">Detalles del Miembro </h1>
		<br />
<table width="700" border="0" align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td width="105">Cedula/Carnet</td>
            <td width="162" class="campos_ver" colspan="3"><?php print $row[cedula]?></td>
          </tr>
          <tr>
            <td>Nombre</td>
            <td class="campos_ver"><label for="nombre"><?php print $row[nombre]?></label></td>
            <td width="87">Fecha Nac.</td>
            <td width="152" class="campos_ver"><?php print date("d-m-Y", strtotime($row[fec_nac]))?></td>
          </tr>
          <tr>
            <td>Nacionalidad</td>
            <td class="campos_ver"><label for="nacion"><?php print $row[nacion]?></label></td>
            <td>Sexo</td>
            <td class="campos_ver"><label for="sexo"><?php print $row[sexo]?></label></td>
          </tr>
          <tr>
            <td>Telefono</td>
            <td class="campos_ver"><label for="telefono"></label>
              <label for="tipo"><?php print $row[telf]?></label></td>
            <td>Profesion</td>
            <td class="campos_ver"><label for="profesion"><?php print $row[profesion]?></label></td>
          </tr>
          <tr>
            <td>E-mail</td>
            <td class="campos_ver"><label for="email"><?php print $row[email]?></label></td>
            <td>Ciudad</td>
            <td class="campos_ver"><label for="ciudad"><?php print $row[ciudad]?></label></td>
          </tr>
          <tr>
            <td>Direccion</td>
            <td colspan="3" class="campos_ver"><label for="direccion"><?php print $row[direccion]?></label></td>
          </tr>
          <tr>
            <td>Tipo</td>
            <td class="campos_ver"><label for="tipo"><?php print $row[tipo]?></label></td>
            <td>Estado</td>
            <td class="campos_ver"><?php print $row[estado]?></td>
          </tr>
          <tr>
            <td>Observaciones</td>
            <td class="campos_ver"><?php print $row[obs]?></td>
            <td>Deudor</td>
            <td class="campos_ver"><?php print $row[deudor]?></td>
          </tr>
          <tr>
            <td>Creado</td>
            <td class="campos_ver"><?php print $row[creado]?></td>
            <td>Modificado</td>
            <td class="campos_ver"><?php print $row[modificado]?></td>
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