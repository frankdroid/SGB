<?php 
session_start();
include("classes/bd.php");
include('classes/libros.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$libro = new Libros();

if (!$_POST[consultar]) {
	$libro->Todos();
} else {
	$cota = $_POST[cota];
	$titulo = $_POST[titulo];
	$autor = $_POST[autor];
	$edicion = $_POST[edicion];
	$isbn = $_POST[isbn];
	$editorial = $_POST[editorial];
	$where = "1=1";
	if ($cota != "") { $where.=" AND l.cota like '%$cota%'"; }
	if ($titulo != "") { $where.=" AND l.titulo like '%$titulo%'"; }
	if ($edicion != "") { $where.=" AND l.edicion like '%$estado%'"; }
	if ($isbn != "") { $where.=" AND l.isbn like '%$isbn%'"; }
	if ($editorial != "") { $where.=" AND l.editorial like '%$editorial%'"; }
	if ($autor != "") { $where.=" AND a.nombres like '%$autor%' OR a.apellidos like'%$autor%'"; }
	$libro->Consultar($where);
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
	
	$('#libros').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"});
		
	$(".iframe").colorbox();
	
});

function eliminar(id_libro,nombre) {
		var aceptar = confirm("Desea eliminar el libro: "+nombre+"? \n Esto no se puede deshacer!"); 
		if (aceptar) {
			window.location = "libros_.php?id="+id_libro;
		}
		
	}
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
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
	<h1 align="center">Consultar Libros</h1>
	<p align="center">&nbsp;</p>
	<form id="form1" name="form1" method="post" action="">
	<table border="0" align="center" cellpadding="4" cellspacing="0">
	  <tr>
	    <th scope="col">Cota</th>
	    <th scope="col">
	      <label for="cota"></label>
	      <input type="text" name="cota" id="cota" />
        </th>
	    <th scope="col">Titulo</th>
	    <th scope="col"><label for="titulo"></label>
        <input type="text" name="titulo" id="titulo" /></th>
	    <th scope="col">Autor(es)</th>
	    <th scope="col">
	      <input type="text" name="autor" id="autor" />
	    </th>
      </tr>
	  <tr>
	    <th scope="col">Edicion</th>
	    <th scope="col"><input type="text" name="edicion" id="edicion" /></th>
	    <th scope="col">ISBN</th>
	    <th scope="col"><input type="text" name="isbn" id="isbn" /></th>
	    <th scope="col">Editorial</th>
	    <th scope="col"><input type="text" name="editorial" id="editorial" /></th>
      </tr>
	  <tr>
	    <td colspan="6" align="center"><input type="submit" name="consultar" id="consultar" value="Consultar" />
        <input type="reset" name="agregar" id="agregar" value="Agregar" onClick="MM_goToURL('parent','libro_add.php');return document.MM_returnValue" /></td>
      </tr>
    </table></form>
	<p>&nbsp;</p>
    <div class="tablas">
	<table border="0" align="center" cellpadding="0" cellspacing="5" id="libros">
    	<thead>
          <tr>
            <th scope="col">Cota</th>
            <th scope="col">Titulo</th>
            <th scope="col">Autor(es)</th>
            <th scope="col">Editorial</th>
            <th scope="col">ISBN</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
          </tr>
		</thead>
        <tbody>
		  <?php 
          while ($row=$libro->Fetch_array()) {?>
          <tr>
            <td><?php print $row[cota]?></td>
            <td><?php print $row[titulo]?></td>
            <td><?php print $row[autor]?></td>
            <td><?php print $row[editorial]?></td>
            <td><?php print $row[isbn]?></td>
            <td><a class="iframe" href="libro_see.php?id=<?php print $row[id_libro]?>"><img src="icons/page_search.png" width="24" height="24" /></a></td>
            <td><a href="libro_mod.php?id=<?php print $row[id_libro]?>"><img src="icons/page_edit.png" width="24" height="24" /></a></td>
            <td><a href="javascript:eliminar(<?php print $row[id_libro]?>,'<?php print $row[titulo]?>')" ><img src="icons/page_delete.png" width="24" height="24" /></a></td>
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