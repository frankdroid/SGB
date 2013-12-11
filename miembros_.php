<?php 
session_start();
include('classes/bd.php');
include('classes/miembros.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$miembro = new Miembros();

if (!$_POST[consultar]) {
	$miembro->Todos();
} else {
	$where = "eliminado = 0";
	$cedula = $_POST[cedula];
	$nombre = $_POST[nombre];
	$tipo = $_POST[tipo];
	if ($cedula != "") { $where.=" AND cedula like '%$cedula%'"; }
	if ($nombre != "") { $where.=" AND nombre like '%$nombre%'"; }
	if ($tipo != "") { $where.=" AND tipo like '%$tipo%'"; }
	$miembro->Consultar($where);
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
	$('#miembros').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"});
		
	$(".colorbox").colorbox();
});

function Eliminar(id_miembro,nombre) {
		var aceptar = confirm("Desea eliminar el miembro : "+nombre+"? \n Esto no se puede deshacer!");
		if (aceptar){ 
			$.post( "miembro_del.php", {id_miembro: id_miembro, nombre: nombre} , function(data) {
						alert(data);
						window.location="miembros_.php"
			});
		}
}
</script>
<style>
.tables { width:95%; margin: 0 auto; }
</style>
<!-- InstanceEndEditable -->
</head>
<body bgcolor="#f2f2f2" onload="MM_preloadImages('img/menu_r1_c1_s2.jpg','img/menu_r1_c2_s2.jpg','img/menu_r1_c3_s2.jpg','img/menu_r1_c4_s2.jpg','img/menu_r1_c5_s2.jpg')">
<br />
<div id="header"><?php include("header.php");?></div>
<div id="fondo">
<?php  include("menu.html"); ?><p>&nbsp;</p>
	<!-- InstanceBeginEditable name="content" -->
	<h1 align="center">Consultar Miembros</h1>
	<p align="center">&nbsp;</p>
	<form id="form1" name="form1" method="post" action="">
	<table border="0" align="center" cellpadding="4" cellspacing="4">
	  <tr>
	    <th scope="col">Cedula</th>
	    <th scope="col">
	      <label for="cedula"></label>
	      <input type="text" name="cedula" id="cedula" />
        </th>
	    <th scope="col">Nombre</th>
	    <th scope="col"><label for="nombre"></label>
        <input type="text" name="nombre" id="nombre" /></th>
	    <th scope="col">Tipo</th>
	    <th scope="col"><label for="tipo"></label>
	      <select name="tipo" id="tipo">
	        <option value="" selected="selected">SELECCIONE</option>
	        <option value="ESTUDIANTE">ESTUDIANTE</option>
	        <option value="PROFESOR">PROFESOR</option>
	        <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
	        <option value="EXTERNO">EXTERNO</option>
        </select></th>
      </tr>
	  <tr>
	    <td colspan="6" align="center"><input type="submit" name="consultar" id="consultar" value="Consultar" />
	      <a href="miembro_add.php">
	      <input name="agregar" type="button" id="agregar" title="Agregar Préstamo" value="Agregar">
        </a></td>
      </tr>
    </table></form>
	<p>&nbsp;</p>
	<table border="0" align="center" cellpadding="4" cellspacing="4" id="miembros">
    	<thead>
          <tr>
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">email</th>
            <th scope="col">Tipo</th>
            <th scope="col">Estado</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
          </tr>
		</thead>
        <tbody>
		  <?php 
          while ($row=$miembro->Fetch_array()) {?>
          <tr>
            <td><?php print $row[cedula]?></td>
            <td><?php print $row[nombre]?></td>
            <td><?php print $row[telf]?></td>
            <td><?php print $row[email]?></td>
            <td><?php print $row[tipo]?></td>
            <td><?php print $row[estado]?></td>
            <td><a class="colorbox" href="miembro_see.php?id=<?php print $row[id_miembro]?>"><img src="icons/user_search.png" width="24" height="24" /></a></td>
            <td><a href="miembro_mod.php?id=<?php print $row[id_miembro]?>"><img src="icons/user_edit.png" width="24" height="24" /></a></td>
            <td><a class="eliminar" href="javascript:Eliminar(<?php print $row[id_miembro]?>,'<?php print $row[nombre]?>')"><img src="icons/user_delete.png" width="24" height="24" /></a></td>
          </tr>
          <?php } ?>
		</tbody>
    </table>
	<!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>