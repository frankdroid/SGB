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
	
$ejemplar = new Ejemplares();
if ($_POST[modificar]) {
	$id_ejemplar = $_POST[id_ejemplar];
	$id_libro = $_POST[id_libro];
	$cota = $_POST[cota_e];
	$condicion = $_POST[condicion];
	$prestamo = $_POST[prestamo];
	$estado = $_POST[estado];	
	$ejemplar->Modificar($id_ejemplar,$id_libro,$cota,$condicion,$prestamo,$estado);
	?><script>alert("Se ha modificado el ejemplar satisfactoriamente");window.location="ejemplar_mod.php?id=<?php print $id_ejemplar ?>";</script><?php	
}

if ($_GET[id]) {
	$id = $_GET[id];
	$ejemplar->Buscar2($id);
	$row = $ejemplar->Fetch_array();
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
$.validator.setDefaults({
	submitHandler: function() { 
	var aceptar = confirm("Desea modificar el ejemplar?"); 
	if (aceptar) {
		form.submit();
		}
	}
});

$(document).ready(function() {
	
	$(".colorbox").colorbox({inline: true});
	
	$('#tb_libros').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"
	});
	
	$("#form1").validate({
		rules: {
			titulo: {required: true},
			cota_e: {required: true,minlength: 6},
			cota_l: {required: true}
		}
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
	<h1 align="center">Modificar Ejemplar	</h1>
	<form id="form1" name="form1" method="post">
	<p align="center">
	  <input type="hidden" name="id_ejemplar" id="id_ejemplar" value="<?php print $id ?>" />
	</p>
	<table border="0" align="center" cellpadding="8" cellspacing="0">
      <tr>
          <td scope="col">Cota</td>
          <td scope="col"><input type="text" name="cota_e" id="cota_e" value="<?php print $row[cota] ?>" /></td>
          <td scope="col">Cota Libro
            <input type="hidden" name="id_libro" id="id_libro" value="<?php print $row[id_libro] ?>"/></td>
          <td scope="col"><input type="text" name="cota_l" id="cota_l" value="<?php print $row[cota_l] ?>" />
            <a href="#libros" class="colorbox"><img src="icons/page_search.png" width="24" height="24" style="display:inline; vertical-align:middle" /></a></td>
        </tr>
        <tr>
          <td scope="col">Título</td>
          <td scope="col"><input type="text" name="titulo" id="titulo" value="<?php print $row[titulo] ?>" /></td>
          <td scope="col">Edición</td>
          <td scope="col"><input type="text" name="edicion" id="edicion" value="<?php print $row[edicion] ?>"></td>
        </tr>
        <tr>
          <td scope="col">Editorial</td>
          <td scope="col"><input type="text" name="editorial" id="editorial" value="<?php print $row[editorial] ?>" /></td>
          <td scope="col">ISBN</td>
          <td scope="col"><input type="text" name="isbn" id="isbn" value="<?php print $row[isbn] ?>" /></td>
        </tr>
        <tr>
          <td>Condicion</td>
          <td><select name="condicion" id="condicion">
            <option value="ÓPTIMO" <?php if ($row[condicion] == 'ÓPTIMO') print 'selected="selected"' ?>>ÓPTIMO</option>
            <option value="DAÑADO"<?php if ($row[condicion] == 'DAÑADO') print 'selected="selected"' ?>>DAÑADO</option>
          </select></td>
          <td>Prestamo</td>
          <td><select name="prestamo" id="prestamo">
            <option value="INTERNO" <?php if ($row[prestamo] == 'INTERNO') print 'selected="selected"' ?>>INTERNO</option>
            <option value="EXTERNO" <?php if ($row[prestamo] == 'EXTERNO') print 'selected="selected"' ?>>EXTERNO</option>
          </select></td>
        </tr>
        <tr>
          <td>Estado</td>
          <td><select name="estado" id="estado">
            <option value="DISPONIBLE" <?php if ($row[estado] == 'DISPONIBLE') print 'selected="selected"' ?>>DISPONIBLE</option>
            <option value="OCUPADO" <?php if ($row[estado] == 'OCUPADO') print 'selected="selected"' ?>>OCUPADO</option>
          </select></td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4" align="center"><input type="submit" name="modificar" id="modificar" value="Modificar" /></td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p>
    
   
    <!--Div Libros -->
<div style="display:none">
	<div id="libros">
     <table border="1" align="center" cellpadding="4" cellspacing="0" id="tb_libros">
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