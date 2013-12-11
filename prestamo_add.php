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

if ($_POST[agregar]) {
	$id_miembro = $_POST[id_miembro];
	$creado = $_POST[creado];
	$fec_dev = $_POST[fec_dev];
	$id_prestamotmp = $_POST[id_prestamotmp];
	$id = $prestamo->Agregar($id_miembro,$creado,$fec_dev,$id_prestamotmp);
	?><script>alert("Se ha agregó el registro de Prestamo con éxito");
		window.open("prestamo_pdf.php?id=<?php print $id?>", "Imprimir Préstamp", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no");
		window.location="prestamos_.php";		
	</script><?php
}

$prestamo->Limpiartmp();
$id_prestamotmp = $prestamo->Nuevotmp();
$miembro = new Miembros();
$miembro->Solventes();
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
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.sgb.min.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
		
	$("#fec_dev").datepicker({ dateFormat: "yy-mm-dd" });
	$("#creado").datepicker({ dateFormat: "yy-mm-dd" });
	
	$(".colorbox").colorbox({inline:true, width:"60%"});
		
	$('#tb_ejemplares').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"
	});
	
	$('#tb_miembros').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"
	});
	
	$( "#ejemplares_cons" ).load("ejemplares_cons.php");
		
	$("#busca_ejemplar").mousedown(function(){
		var id_prestamotmp = $("#id_prestamotmp").val();
		$.post( "ejemplares_cons.php", {id_prestamotmp: id_prestamotmp} , function( data ) {
				$( "#ejemplares_cons" ).html(data)
		});
	});
		
	$("#agrega_ejemplar").click(function(){			
		var id_ejemplar = $("#id_ejemplar").val();
		var id_prestamotmp = $("#id_prestamotmp").val();
		if (id_ejemplar == "") {
			alert("Debe seleccionar un ejemplar");
		} else {
			$.post( "ejemplares_temp.php", {id_prestamotmp: id_prestamotmp, id_ejemplar: id_ejemplar} , function( data ) {
				$( "#ejemplares_temp" ).html(data)
			});
			$("#id_ejemplar").val('');
			$("#cota").val(''); 
			$("#titulo").val('');
			$("#ejemplares").val('true');
		}
    });
		
	$("#form1").validate({
		rules: {
			cedula: {required: true},
			creado: {required: true},
			fec_dev: {required: true}
		},
		submitHandler: function() { 
			var ejemplares = $("#ejemplares").val();
			if (ejemplares == "true") {
				var aceptar = confirm("Desea agregar el préstamo?"); 
				if (aceptar) {
					form.submit();
				}	
			} else {
				alert("Debe agregar al menos un ejemplar!");
			}	
		}			
	});

});

function SeleccionarE(cota,titulo,id_ejemplar) {
	$("#cota").val(cota);
	$("#titulo").val(titulo);
	$("#id_ejemplar").val(id_ejemplar);
	$.colorbox.close()
}

function SeleccionarS(cedula,nombre,id_miembro) {
	$("#cedula").val(cedula);
	$("#nombre").val(nombre);
	$("#id_miembro").val(id_miembro)
	$.colorbox.close()
}

function Eliminar_det(id_det) {
	var id_prestamotmp = $("#id_prestamotmp").val();
	$.post( "ejemplares_temp.php", {id_det: id_det, id_prestamotmp: id_prestamotmp} , function(data) {
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
		<h1 align="center">Registro de Préstamo</h1>
        <form id="form1" name="form1" method="post" action="">
		<p align="center">&nbsp;
        
		  <input name="id_prestamotmp" type="hidden" id="id_prestamotmp" value="<?php print $id_prestamotmp ?>">
		</p>
        
		<table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
		  <tr>
		    <td>
		      <input type="hidden" name="id_miembro" id="id_miembro" />
Cedula/Carnet</span></td>
		    <td>
		      <input name="cedula" type="text" id="cedula" readonly />
	        <a href="#miembros" class="colorbox"><img src="icons/user_search.png" width="24" height="24" style="display:inline; vertical-align:middle" /></a></span></td>
		    <td>Nombre</span></td>
		    <td>
		      <input name="nombre" type="text" id="nombre" size="30" readonly />
		    </td>
	      </tr>
		  <tr>
		    <td><input type="hidden" name="id_ejemplar" id="id_ejemplar" />
	        Cota</td>
		    <td>
		      <label for="cota"></label>
		      <input name="cota" type="text" id="cota" readonly />
              <a href="#ejemplares_cons" class="colorbox"><img src="icons/page_search.png" width="24" height="24" id="busca_ejemplar" style="display:inline; vertical-align:middle" /></a></td>
		    <td>Titulo</td>
		    <td><input name="titulo" type="text" id="titulo" size="30" readonly />		
		      <input type="button" name="agrega_ejemplar" id="agrega_ejemplar" value="Agregar Ejemplar">
		    </td>
	      </tr>
		  <tr>
		    <td colspan="4"><input type="hidden" id="ejemplares" name="ejemplares"><div id="ejemplares_temp"></div></td>
	      </tr>
		  <tr>
		    <td>Fecha</td>
		    <td>
	        <input name="creado" type="text" id="creado" value="<?php print date("Y-m-d") ?>" readonly /></td>
		    <td>Fecha Dev.</td>
		    <td>
	        <input name="fec_dev" type="text" id="fec_dev" readonly /></td>
	      </tr>
		  <tr>
		    <td colspan="4" align="center"><p>
		      <input type="submit" name="agregar" id="agregar" value="Guardar" />
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
    
    <!--Div para miembros-->
    
    <div id="miembros">
    <table border="0" align="center" cellpadding="4" cellspacing="4" id="tb_miembros">
    	<thead>
          <tr>
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">email</th>
            <th scope="col">Tipo</th>
            <th scope="col">&nbsp;</th>
          </tr>
		</thead>
        <tbody>
		  <?php 
          while ($rowm=$miembro->Fetch_array()) {?>
          <tr>
            <td><?php print $rowm[cedula]?></td>
            <td><?php print $rowm[nombre]?></td>
            <td><?php print $rowm[telefono]?></td>
            <td><?php print $rowm[email]?></td>
            <td><?php print $rowm[tipo]?></td>
            <td><a href="javascript:SeleccionarS('<?php print $rowm[cedula]?>','<?php print $rowm[nombre]?>','<?php print $rowm[id_miembro]?>')"><img src="icons/page_accept.png" width="24" height="24" /></a></td>
          </tr>
          <?php } ?>
		</tbody>
    </table>
    </div>
    <!--Fin  miembros-->
  
</div>
  <!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>