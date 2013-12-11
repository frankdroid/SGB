<?php 
session_start();
include("classes/bd.php");
include('classes/ejemplares.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$ejemplar = new Ejemplares();

if (!$_POST[consultar]) {
	$ejemplar->Todos();
} else {
	$cota = $_POST[cota];
	$titulo = $_POST[titulo];
	$estado = $_POST[estado];
	$prestamo = $_POST[prestamo];
	$where = "1=1";
	if ($cota != "") { $where.=" AND e.cota like '%$cota%'"; }
	if ($titulo != "") { $where.=" AND l.titulo like '%$titulo%'"; }
	if ($estado != "SELECCIONE") { $where.=" AND e.estado like '%$estado%'"; }
	if ($prestamo != "SELECCIONE") { $where.=" AND e.prestamo like '%$prestamo%'"; }
	$ejemplar->Consultar($where);
}

//Eliminar libro
if ($_GET[id]) {
	$libro = new Libros();
	$id_libro = $_GET[id];
	$libro->Eliminar($id_libro);
	?><script>alert("Se ha eliminado el libro con éxito"); window.location = "libros_.php"</script><?php
}

?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/sgb.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sistema de Gestion Biblioteca - Usuarios</title>
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
	
	$('#ejemplares').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"});
		
	$(".colorbox").colorbox();

});

function Eliminar(id_ejemplar) {
	$(".eliminar").click(function(){
		var aceptar = confirm("Desea eliminar el ejemplar? \n Esto no se puede deshacer!"); 
		$.post( "ejemplar_del.php", {id_ejemplar: id_ejemplar} , function(data) {
					alert(data);
					window.location="ejemplares_.php"
		});
	});	
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
	<h1 align="center">Consultar Ejemplares</h1>
	<p align="center">&nbsp;</p>
	<form id="form1" name="form1" method="post">
	  <table border="0" align="center" cellpadding="4" cellspacing="4">
	    <tr>
	      <th scope="col">Cota</th>
	      <td scope="col"><label for="titulo"></label>
	        <input type="text" name="cota" id="textfield2" /></td>
	      <th scope="col">Libro</th>
	      <td scope="col"><label for="textfield3"></label>
	        <input type="text" name="titulo" id="textfield3" /></td>
        </tr>
	    <tr>
	      <th scope="col">Estado</th>
	      <td scope="col"><select name="estado" id="estado">
	        <option value="SELECCIONE">SELECCIONE</option>
	        <option value="PRESTADO">PRESTADO</option>
	        <option value="DISPONIBLE">DISPONIBLE</option>
	        <option value="PERDIDO">PERDIDO</option>
          </select></td>
	      <th scope="col">Préstamo</th>
	      <td scope="col"><select name="prestamo" id="prestamo">
	        <option value="SELECCIONE">SELECCIONE</option>
	        <option value="INTERNO">INTERNO</option>
	        <option value="EXTERNO">EXTERNO</option>
          </select></td>
        </tr>
	    <tr>
	      <td colspan="4" align="center"><input type="submit" name="consultar" id="consultar" value="Consultar" /><a href="ejemplar_add.php"><input name="agregar" type="button" id="agregar" title="Agregar Préstamo" value="Agregar">
	          </a></td>
        </tr>
      </table>
    </form>
	<p align="center">&nbsp;</p>
	<div class="tablas">
	<table border="0" align="center" cellpadding="0" cellspacing="5" id="ejemplares">
    	<thead>
          <tr>
            <th scope="col">Cota</th>
            <th scope="col">Libro</th>
            <th scope="col">Condición</th>
            <th scope="col">Préstamo</th>
            <th scope="col">Estado</th>
            <th scope="col">Fecha</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
          </tr>
		</thead>
        <tbody>
		  <?php 
          while ($row=$ejemplar->Fetch_array()) {?>
          <tr>
            <td><?php print $row[cota]?></td>
            <td><?php print $row[titulo]?></td>
            <td><?php print $row[condicion]?></td>
            <td><?php print $row[prestamo]?></td>
            <td><?php print $row[estado]?></td>
            <td><?php print $row[creado]?></td>
            <td><a class="colorbox" href="ejemplar_see.php?id=<?php print $row[id_ejemplar]?>"><img src="icons/page_search.png" width="24" height="24"  alt=""/></a></td>
            <td><a href="ejemplar_mod.php?id=<?php print $row[id_ejemplar] ?>"><img src="icons/page_edit.png" width="24" height="24"  alt=""/></a></td>
            <td><a class="eliminar" href="javascript:Eliminar(<?php print $row[id_ejemplar]?>)"><img src="icons/page_delete.png" width="24" height="24"  alt=""/></a></td>
          </tr>
          <?php } ?>
		</tbody>
    </table>
    </div>
    <p>&nbsp;</p>
    <div id="agregar_ejemplares">
    <p align="center">
   <input name="id_libro_e" type="hidden" id="id_libro_e" value="<?php print $_GET[id] ?>" />
 </p>
    </form>
    </div>
    
	<!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>