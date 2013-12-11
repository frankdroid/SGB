<?php 
session_start();
include("classes/bd.php");
include("classes/ejemplares.php");
include("classes/miembros.php");
include("classes/prestamos.php");

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$prestamo = new Prestamos();
if ($_POST[modificar]) {
	$id_miembro = $_POST[id_miembro];
	$creado = $_POST[creado];
	$fec_dev = $_POST[fec_dev];
	$id_prestamo = $_POST[id_prestamo];
	$prestamo->Modificar($id_prestamo,$id_miembro,$creado,$fec_dev);
	?><script>alert("Se ha modificado el Préstamo con éxito");window.location="prestamos_.php";</script><?php
}

if ($_GET[id]) {
	$id_prestamo = $_GET[id];
	$prestamo->Limpiartmp();
	$prestamo->Ver_ejemplar($id_prestamo);
	$prestamo->Buscar($id_prestamo);
	$row = $prestamo->Fetch_array();
	
}
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/sgb.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>SGB - Prestamos</title>
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
<script type="text/javascript" src="js/messages_es.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.sgb.min.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script>
$.validator.setDefaults({
	submitHandler: function() { 
	var aceptar = confirm("Desea modificar el préstamo?"); 
	if (aceptar) {
		form.submit();
		}
	}
});

$(document).ready(function() {
	
	$("#fec_dev").datepicker({ dateFormat: "yy-mm-dd" });
	$("#creado").datepicker({ dateFormat: "yy-mm-dd" });
	
	$(".colorbox").colorbox({inline:true, width:"60%"});
		
	$('#tb_ejemplares').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"
	});
		
	$("#ejemplares_cons").load("ejemplares_cons.php");
	
	$("#busca_ejemplar").mousedown(function(){
		var id_prestamo = $("#id_prestamo").val();
		$.post( "ejemplares_cons.php", function( data ) {
				$( "#ejemplares_cons" ).html(data)
		});
	});
	
	var id_prestamo = $("#id_prestamo").val();
	$.post( "ejemplares_temp2.php", {id_prestamo: id_prestamo} , function( data ) {
				$( "#ejemplares_temp" ).html(data)
	});
			
	$("#agrega_ejemplar").click(function(){			
		var id_ejemplar = $("#id_ejemplar").val();
		var id_prestamo = $("#id_prestamo").val();
		if (id_ejemplar == "") {
			alert("Debe seleccionar un ejemplar");
		} else {
			$.post( "ejemplares_temp2.php", {id_prestamo: id_prestamo, id_ejemplar: id_ejemplar} , function( data ) {
				$( "#ejemplares_temp" ).html(data)
			});
			$("#id_ejemplar").val('');
			$("#cota").val(''); 
			$("#titulo").val('');
		}
    });
	
	$("#form1").validate({
		rules: {
			cedula: {required: true},
			creado: {required: true},
			fec_dev: {required: true} 
		}
	});
	
});

function SeleccionarE(cota,titulo,id_ejemplar) {
	$("#cota").val(cota);
	$("#titulo").val(titulo);
	$("#id_ejemplar").val(id_ejemplar);
	$.colorbox.close()
}

function Eliminar_det(id_det) {
	var id_prestamo = $("#id_prestamo").val();
	$.post( "ejemplares_temp2.php", {id_det: id_det, id_prestamo: id_prestamo} , function(data) {
		$( "#ejemplares_temp" ).html(data)
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
		<p>&nbsp;</p>
		<h1 align="center">Modificar  Préstamo</h1>
        <form id="form1" name="form1" method="post" action="">
		<p align="center">&nbsp;
        
		  <input name="id_prestamo" type="hidden" id="id_prestamo" value="<?php print $id_prestamo ?>">
		</p>
        
		<table border="0" align="center" cellpadding="5" cellspacing="0">
		  <tr>
		    <td>
		      <input type="hidden" name="id_miembro" id="id_miembro" value="<?php print $row[id_miembro] ?>" />
Cedula/Carnet</span></td>
		    <td>
		      <input name="cedula" type="text" id="cedula" readonly value="<?php print $row[cedula]?>" />		      </span></td>
		    <td>Nombre</span></td>
		    <td>
		      <input name="nombre" type="text" id="nombre" value="<?php print $row[nombre]?>" size="30" readonly />
		    </td>
	      </tr>
		  <tr style="display:none">
		    <td><input type="hidden" name="id_ejemplar" id="id_ejemplar" />
	        Cota</td>
		    <td>
		      <label for="cota"></label>
		      <input name="cota" type="text" id="cota" readonly />
              <a href="#ejemplares_cons" class="colorbox"><img src="icons/page_search.png" width="24" height="24" id="busca_ejemplar" style="display:inline; vertical-align:middle" /></a></td>
		    <td>Titulo</td>
		    <td><input name="titulo" type="text" id="titulo" size="30" />		
		      <input type="button" name="agrega_ejemplar" id="agrega_ejemplar" value="Agregar Ejemplar">
		    </td>
	      </tr>
		  <tr>
		    <td colspan="4"><div id="ejemplares_temp"></div></td>
	      </tr>
		  <tr>
		    <td>Fecha</td>
		    <td>
	        <input name="creado" type="text" id="creado" value="<?php print $row[creado] ?>" readonly /></td>
		    <td>Fecha Dev.</td>
		    <td>
	        <input name="fec_dev" type="text" id="fec_dev" readonly value="<?php print $row[fec_dev]?>" /></td>
	      </tr>
		  <tr>
		    <td colspan="4" align="center"><p>
		      <input type="submit" name="modificar" id="modificar" value="Modificar" />
	          <input type="reset" name="resta" id="resta" value="Restablecer" />
            </p></td>
	      </tr>
	    </table>
		<p>&nbsp;</p>
        </form>
        
        
<!--DIV OCULTOS-->

<div style="display:none">

	<!--Div  para ejemplares-->
    <div id="ejemplares_cons"></div>
      
</div>
  <!-- FIN OCULTOS--> 
  
  <!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>