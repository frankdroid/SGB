<?php 
session_start();
include("classes/bd.php");
include('classes/auditoria.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$auditor = new Auditoria();
$auditor->Todos();
	
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/sgb.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sistema de Gestion Biblioteca - Auditoría</title>
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
	
	$('#auditoria').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"});
		
	$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});

});
</script>
<!-- InstanceEndEditable -->
</head>
<body bgcolor="#f2f2f2" onload="MM_preloadImages('img/menu_r1_c1_s2.jpg','img/menu_r1_c2_s2.jpg','img/menu_r1_c3_s2.jpg','img/menu_r1_c4_s2.jpg','img/menu_r1_c5_s2.jpg')">
<br />
<div id="header"><?php include("header.php");?></div>
<div id="fondo">
<?php  include("menu.html"); ?><p>&nbsp;</p>
	<!-- InstanceBeginEditable name="content" -->
	<h1 align="center">Registro de Auditoría</h1>
	<p align="center">&nbsp;</p>
	<form id="form1" name="form1" method="post" action="" style="display:none">
	<table border="0" align="center" cellpadding="4" cellspacing="0">
	  <tr>
	    <th scope="col">Desde</th>
	    <th scope="col"><input type="text" name="desde" id="desde" /></th>
	    <th scope="col">Hasta</th>
	    <th scope="col"><input type="text" name="hasta" id="hasta" /></th>
	    <th scope="col">Descripción</th>
	    <th scope="col"><input type="text" name="descripcion" id="descripcion" /></th>
      </tr>
	  <tr>
	    <td colspan="6" align="center"><input type="submit" name="consultar" id="consultar" value="Consultar" />
        <input type="reset" name="button2" id="button2" value="Borrar" /></td>
      </tr>
    </table></form>
	<p>&nbsp;</p>
    <div class="tablas">
	<table border="0" align="center" cellpadding="0" cellspacing="0" id="auditoria">
    	<thead>
          <tr>
            <th scope="col">ID Log</th>
            <th scope="col">Fecha</th>
            <th scope="col">Usuario</th>
            <th scope="col">Descripción</th>
            <th scope="col">Módulo/Tabla</th>
          </tr>
		</thead>
        <tbody>
		  <?php 
          while ($row=$auditor->Fetch_array()) {?>
          <tr>
            <td><?php print $row[id_log]?></td>
            <td><?php print $row[modificado]?></td>
            <td><?php print $row[nombre]?></td>
            <td><?php print $row[descripcion]?></td>
            <td><?php print $row[nombre_tabla]?></td>
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
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>