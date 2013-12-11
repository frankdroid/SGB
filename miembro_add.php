<?php 
session_start();
include('classes/bd.php');
include('classes/miembros.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$miembro = new Miembros();
if ($_POST[agregar]) {
	$cedula = $_POST[cedula];
	$nombre = $_POST[nombre];
	$fec_nac = $_POST[fec_nac];
	$nacion = $_POST[nacion];
	$sexo = $_POST[sexo];
	$telf = $_POST[telefono];
	$profesion = $_POST[profesion];
	$email = $_POST[email];
	$direccion = $_POST[direccion];
	$tipo = $_POST[tipo];
	$obs = $_POST[obs];
	
	$consul = mysql_query("SELECT cedula, nombre FROM miembros WHERE cedula = $cedula");
	$filas = mysql_num_rows($consul);
	if ( $filas > 0) {
		?><script>alert("Este miembro ya existe");window.location="miembro_add.php"</script><?php
		die;	
	}
	$miembro->Agregar($cedula,$nombre,$fec_nac,$nacion,$sexo,$telf,$profesion,$email,$ciudad,$direccion,$tipo,$obs);
	?><script>alert("Se ha agregado con éxito");window.location="miembros_.php"</script><?php
	
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
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.sgb.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker-es.js"></script>
<link rel="stylesheet" type="text/css" href="css/sgb/jquery-ui-1.10.3.sgb.min.css"/>
<script>
$.validator.setDefaults({
	submitHandler: function() { 
	var aceptar = confirm("Desea agregar un nuevo Miembro?"); 
	if (aceptar) {
		form.submit();
		}
	}
});

$(document).ready(function() {
	
	$("input.mayu").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
			
	$("#cedula").mask("?99999999");
	$("#telefono").mask("9999-9999999");
	
    $("#form1").validate({
		rules: {
			cedula: {required: true},
			nombre: {required: true,minlength: 6},
			fec_nac: {required: true},
			nacion: {required: true},
			sexo: {required: true},
			telefono: {required: true},
			email: {required: true, email: true},
			ciudad: {required: true},
			direccion: {required: true, minlength: 3}
		}
	});
	
	
	
	$("#fec_nac").datepicker({ 
		dateFormat: "yy-mm-dd",
		changeMonth: true,
      	changeYear: true
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
	<!-- InstanceBeginEditable name="content" --><p align="center">&nbsp;</p>
	<h1 align="center">Registro de Miembro</h1>
	<p align="center">&nbsp;</p>
        <form id="form1" name="form1" method="post" action="">
		<table width="700" border="0" align="center" cellpadding="5" cellspacing="0">
		  <tr>
		    <td width="105">Cedula/Carnet</td>
		    <td width="162">
		      <input name="cedula" type="text" required id="cedula" />
	        </td>
		    <td width="130">&nbsp;</td>
		    <td width="87">&nbsp;</td>
		    <td width="152">&nbsp;</td>
	      </tr>
		  <tr>
		    <td>Nombre</td>
		    <td colspan="2">
	        <input name="nombre" type="text" id="nombre" size="50" class="mayu"/></td>
		    <td>Fecha Nac.</td>
		    <td>
	        <input name="fec_nac" type="text" id="fec_nac" readonly /></td>
	      </tr>
		  <tr>
		    <td>Nacionalidad</td>
		    <td colspan="2"><label for="nacion"></label>
	        <input name="nacion" type="text" id="nacion" size="30" class="mayu" /></td>
		    <td>Sexo</td>
		    <td><label for="textfield5">
		      <select name="sexo" id="sexo">
		        <option value="M">M</option>
		        <option value="F">F</option>
	          </select>
		    </label>		      <label for="sexo"></label></td>
	      </tr>
		  <tr>
		    <td>Telefono</td>
		    <td colspan="2"><label for="telefono"></label>
	        <input name="telefono" type="text" id="telefono" size="30" /></td>
		    <td>Profesion</td>
		    <td><input name="profesion" type="text" id="profesion" class="mayu" /></td>
	      </tr>
		  <tr>
		    <td>E-mail</td>
		    <td colspan="2"><label for="email"></label>
	        <input name="email" type="text" id="email" size="50" class="mayu" /></td>
		    <td>Ciudad</td>
		    <td><input name="ciudad" type="text" id="ciudad" class="mayu" />		      <label for="ciudad"></label></td>
	      </tr>
		  <tr>
		    <td>Direccion</td>
		    <td colspan="4"><label for="direccion"></label>
	        <input name="direccion" type="text" id="direccion" size="100" class="mayu" /></td>
	      </tr>
		  <tr>
		    <td>Tipo de Miembro</td>
		    <td colspan="4"><label for="tipo"></label>
		      <select name="tipo" id="tipo">
		        <option value="ESTUDIANTE" selected="selected">ESTUDIANTE</option>
		        <option value="PROFESOR">PROFESOR</option>
		        <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
		        <option value="EXTERNO">EXTERNO</option>
            </select></td>
	      </tr>
		  <tr>
		    <td>Observaciones</td>
		    <td colspan="4"><label for="obs"></label>
	        <textarea name="obs" id="obs" cols="50" rows="4"></textarea></td>
	      </tr>
		  <tr>
		    <td colspan="5" align="center"><input type="submit" name="agregar" id="agregar" value="Agregar" />
            <input type="reset" name="resta" id="resta" value="Restablecer" /></td>
	      </tr>
	    </table>
    </form>
  <!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>