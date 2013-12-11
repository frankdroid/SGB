<?php 
session_start();
include('classes/bd.php');
include('classes/ejemplares.php');
include('classes/libros.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}
	
$libro = new Libros();
$libro->Todos();
$rowl = $libro->Fetch_array();

// Ejemplares
if ($_POST[agregar_ejemplar]) {
	$ejemplar = new Ejemplares();

	$id_libro = $_POST[id_libro];
	$cota = $_POST[cota_e];
	$condicion = $_POST[condicion];
	$prestamo = $_POST[prestamo];	
	$ejemplar->Agregar($id_libro,$cota,$condicion,$prestamo);
	?><script>alert("Se ha agregado el Ejemplar del libro con éxito");window.location="ejemplares_.php";</script><?php	
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
<link rel="stylesheet" type="text/css" href="css/sgb/jquery-ui-1.10.3.sgb.min.css"/>
<link rel="stylesheet" type="text/css" href="css/colorbox.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css"/>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.sgb.min.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
	
	$(".colorbox").colorbox({inline:true});
	
	$('#libros').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"
	});
	
	$("input").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });

});

function Seleccionar(id_libro,cota,titulo,edicion,editorial,isbn) {
	$("#id_libro").val(id_libro);
	$("#cota_l").val(cota);
	$("#titulo").val(titulo);
	$("#edicion").val(edicion);
	$("#editorial").val(editorial);
	$("#isbn").val(isbn);
	$.colorbox.close()
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
	<br/>
	<h1 align="center">Agregar Nuevo Ejemplar</h1>
	<p align="center">&nbsp;</p>
    <form id="form1" name="form1" method="post">
      <table border="0" align="center" cellpadding="8" cellspacing="0">
        <tr>
          <td scope="col">Cota</td>
          <td scope="col"><input type="text" name="cota_e" id="cota_e" /></td>
          <td scope="col">Cota Libro
            <input type="hidden" name="id_libro" id="id_libro" /></td>
          <td scope="col"><input type="text" name="cota_l" id="cota_l" />
            <a href="#ejemplares" class="colorbox"><img src="icons/page_search.png" width="24" height="24" style="display:inline; vertical-align:middle" /></a></td>
        </tr>
        <tr>
          <td scope="col">Título</td>
          <td scope="col"><input type="text" name="titulo" id="titulo" /></td>
          <td scope="col">Edición</td>
          <td scope="col"><input type="text" name="edicion" id="edicion"></td>
        </tr>
        <tr>
          <td scope="col">Editorial</td>
          <td scope="col"><input type="text" name="editorial" id="editorial" /></td>
          <td scope="col">ISBN</td>
          <td scope="col"><input type="text" name="isbn" id="isbn" /></td>
        </tr>
        <tr>
          <td>Condicion</td>
          <td><select name="condicion" id="condicion">
            <option>NORMAL</option>
            <option>DAÑADO</option>
          </select></td>
          <td>Prestamo</td>
          <td><select name="prestamo" id="prestamo">
            <option>INTERNO</option>
            <option>EXTERNO</option>
          </select></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><input type="submit" name="agregar_ejemplar" id="agregar_ejemplar" value="Agregar Ejemplar" /></td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p>
    
   
    <!--Div para agregar ejemplares -->
<div style="display:none"> 
    <div id="ejemplares">
     <table border="1" align="center" cellpadding="4" cellspacing="0" id="tb_ejemplares">
        <thead>
            <tr>
         <th scope="col">Cota</th>
         <th scope="col">Título</th>
         <th scope="col">Autores</th>
         <th scope="col">Editorial</th>
         <th scope="col">ISBN</th>
         <th scope="col">Tipo</th>
         <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
       <?php 
            while ($rowl = $libro->Fetch_Array()) {?>
       <tr>
         <td><?php print $rowl[cota]?>&nbsp;</td>
         <td><?php print $rowl[titulo]?>&nbsp;</td>
         <td><?php print $rowl[autores]?>&nbsp;</td>
         <td><?php print $rowl[editorial]?>&nbsp;</td>
         <td><?php print $rowl[isbn]?>&nbsp;</td>
         <td><?php print $rowl[tipo]?>&nbsp;</td>
         <td><a href="javascript:Seleccionar('<?php print $rowl[id_libro]?>','<?php print $rowl[cota]?>','<?php print $rowl[titulo]?>','<?php print $rowl[edicion]?>','<?php print $rowl[editorial]?>','<?php print $rowl[isbn]?>')"><img src="icons/page_accept.png" width="24" height="24" /></a></td>
         </tr>
       <?php } ?>
       </tbody>
     </table>
    </div>
</div>
	<!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>