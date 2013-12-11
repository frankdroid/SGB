<?php 
session_start();
include('classes/bd.php');
include('classes/prestamos.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$prestamo = new Prestamos();

if (!$_POST[consultar]) {
	$prestamo->Todos();
} else {
	$cedula = $_POST[cedula];
	$nombre = $_POST[nombre];
	$estado = $_POST[estado];
	$where = "p.eliminado = 0";
	if ($cedula != "") { $where.=" AND m.cedula like '%$cedula%'"; }
	if ($nombre != "") { $where.=" AND m.nombre like '%$nombre%'"; }
	if ($estado != "") { $where.=" AND p.estado like '%$estado%'"; }
	$prestamo->Consultar($where);
}

// Cerrar prestamo
if ($_GET[dev]) {
	$id_prestamo = $_GET[dev];
	$prestamo->Devolver($id_prestamo);
	?><script>alert("Se ha devuelto el ejemplar coon éxito"); window.location = "prestamos_.php"</script><?php
}

?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/sgb.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sistema de Gestion Biblioteca - Bienvenido</title>
<!-- InstanceEndEditable -->
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/mm_css_menu.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- InstanceBeginEditable name="head" -->
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css"/>
<link rel="stylesheet" type="text/css" href="css/sgb/jquery-ui-1.10.3.sgb.min.css"/>
<link rel="stylesheet" type="text/css" href="css/colorbox.css"/>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>

<script>
$(document).ready(function() {
	$('#prestamos').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"});
		
	$(".iframe").colorbox();

});

function Eliminar(id_prestamo) {
		var aceptar = confirm("Desea eliminar el préstamo? \n Esto no se puede deshacer!"); 
		if (aceptar) {
			$.post( "prestamo_del.php", {id_prestamo: id_prestamo} , function(data) {
						alert(data);
						window.location="prestamos_.php"
			});
		}
}

function Devolver(id_prestamo) {
		var aceptar = confirm("Desea devolver el ejemplar?");
		if (aceptar) { 
			$.post( "prestamo_dev.php", {id_prestamo: id_prestamo} , function(data) {
						alert(data);
						window.location="prestamos_.php"
			});
		}
}
</script>
<!-- InstanceEndEditable -->
</head>
<body bgcolor="#f2f2f2" onload="MM_preloadImages('img/menu_r1_c1_s2.jpg','img/menu_r1_c2_s2.jpg','img/menu_r1_c3_s2.jpg','img/menu_r1_c4_s2.jpg','img/menu_r1_c5_s2.jpg')">
<br />
<div id="header"><?php include("header.php");?></div>
<div id="fondo">
<?php  include("menu.html"); ?><p>&nbsp;</p>
	<!-- InstanceBeginEditable name="content" -->
		<h1 align="center">Consultar Préstamos</h1>
	<p align="center">&nbsp;</p>
	<form id="form1" name="form1" method="post" action="">
	<table border="0" align="center" cellpadding="4" cellspacing="4">
	  <tr>
	    <th scope="col">Cedula</th>
	    <td scope="col">
	      <label for="cedula"></label>
	      <input type="text" name="cedula" id="cedula" />
        </td>
	    <th scope="col">Nombre</th>
	    <td scope="col"><label for="nombre"></label>
        <input type="text" name="nombre" id="nombre" /></td>
	    <th scope="col">Estado</th>
	    <th scope="col"><label for="cota">
	      <select name="estado" id="estado">
	        <option value="">SELECCIONE</option>
	        <option value="ABIERTO">ABIERTO</option>
	        <option value="CERRADO">CERRADO</option>
	        </select>
	    </label></th>
      </tr>
	  <tr>
	    <td colspan="6" align="center"><input type="submit" name="consultar" id="consultar" value="Consultar" />&nbsp;
        <a href="prestamo_add.php">
        <input name="agregar" type="button" id="agregar" title="Agregar Préstamo" value="Agregar"></a></td>
      </tr>
    </table></form>
	<p>&nbsp;</p>
    <div class="tablas">
	<table border="0" align="center" cellpadding="4" cellspacing="4" id="prestamos">
    	<thead>
          <tr>
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha</th>
            <th scope="col">Vence</th>
            <th scope="col">Estado</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
          </tr>
		</thead>
        <tbody>
		  <?php 
          while ($row=$prestamo->Fetch_array()) {?>
          <tr>
            <td><?php print $row[cedula]?></td>
            <td><?php print $row[nombre]?></td>
            <td><?php print $row[creado]?></td>
            <td><?php print date("d-m-Y", strtotime($row[fec_dev]))?></td>
            <td><?php print $row[estado]?></td>
            <?php if ($row[estado] == 'ABIERTO') { ?>
            <td><a class="iframe" href="prestamo_see.php?id=<?php print $row[id_prestamo]?>"><img src="icons/page_search.png" width="24" height="24" /></a></td>
            <td><a href="prestamo_mod.php?id=<?php print $row[id_prestamo]?>"><img src="icons/page_edit.png" width="24" height="24" /></a></td>
            <td><a class="eliminar" href="javascript:Eliminar(<?php print $row[id_prestamo]?>)"><img src="icons/page_delete.png" width="24" height="24" /></a></td>
            <td><a class="devolver" href="javascript:Devolver(<?php print $row[id_prestamo]?>)"><img src="icons/page_undo.png" width="24" height="24" /></a></td>
            <?php } else { ?>
            <td><a class="iframe" href="prestamo_see.php?id=<?php print $row[id_prestamo]?>"><img src="icons/page_search.png" width="24" height="24" /></a></td>
            <td><img src="icons/page_edit2.png" width="24" height="24" /></td>
            <td><img src="icons/page_delete2.png" width="24" height="24" /></td>
            <td><img src="icons/page_undo2.png" width="24" height="24" /></td>
            <?php } ?>
          </tr>
          <?php } ?>
		</tbody>
    </table>
    </div>
  <!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>