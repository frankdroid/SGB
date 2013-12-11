<?php 
session_start();
include("classes/bd.php");

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$basedato = new Base_datos();
$basedato->Ver_mantto();

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
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
	
	$('#base_datos').dataTable( {
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
	} );
		
	$("#respaldar").click(function(){
		var aceptar = confirm("Desea realizar un nuevo backup de la base de datos?"); 
		if (aceptar) {
			$.post( "mantto_bd.php", {respaldar: "true"});
			alert("Se realizó el respaldo con éxito");
			window.location="mantto_.php";
		}
	});
	
	$("#optimizar").click(function(){
		var aceptar = confirm("Desea optimizar la base de datos?"); 
		if (aceptar) {
			$.post( "mantto_bd.php", {optimizar: "true"});
			alert("Se realizó la optimización de todas las tablas \n Base de Datos: SGB ");
		}
	});
		
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
	<h1 align="center">Mantenimiento de Base de Datos</h1>
	<p align="center">&nbsp;</p>
	<table width="50%" border="0" align="center" cellpadding="5">
	  <tr>
	    <td align="center">Presione para realizar backup </td>
	    <td align="center">Presione para optimización</td>
      </tr>
	  <tr>
	    <td align="center">
            <input type="button" name="respaldar" id="respaldar" value="Respaldar" ></td>
	    <td align="center"><input type="button" name="optimizar " id="optimizar" value="Optimizar"></td>
      </tr>
    </table>
	<p>&nbsp;</p>
    <div id="mantto" class="tablas">
    <table border="0" align="center" cellpadding="0" cellspacing="5" id="base_datos">
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Usuario</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Fecha</th>
	      <th scope="col">Ruta Archivo</th>
        </tr>
      </thead>
	  <tbody>
	    <?php 
          while ($row=$basedato->Fetch_array()) {?>
	    <tr>
	      <td><?php print $row[id]?></td>
	      <td><?php print $row[usuario]?></td>
	      <td><?php print $row[nombre]?></td>
	      <td><?php print $row[creado]?></td>
	      <td><a href="<?php print $row[ruta]?>" target="new"><strong><?php print $row[ruta]?></strong></a></td>
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