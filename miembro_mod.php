<?php 
session_start();
include('classes/bd.php');
include('classes/miembros.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$miembro = new Miembros();
if ($_POST[modificar]) {
	$id_miembro = $_POST[id_miembro];
	$cedula = $_POST[cedula];
	$nombre = $_POST[nombre];
	$fec_nac = $_POST[fec_nac];
	$nacion = $_POST[nacion];
	$sexo = $_POST[sexo];
	$telf = $_POST[telefono];
	$profesion = $_POST[profesion];
	$email = $_POST[email];
	$ciudad = $_POST[ciudad];
	$direccion = $_POST[direccion];
	$tipo = $_POST[tipo];
	$obs = $_POST[obs];
	$estado = $_POST[estado];
	$miembro->Modificar($id_miembro,$nombre,$fec_nac,$nacion,$sexo,$telf,$profesion,$email,$ciudad,$direccion,$tipo,$obs,$estado);
	?><script>alert("Se ha modificado al miembro exitosamente");window.location="miembro_mod.php?id=<?php print $id_miembro ?>"</script><?php
	
}

if ($_GET[id]) {
	$id = $_GET[id];
	$miembro->Buscar($id);
	$row = $miembro->Fetch_array();
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
$(document).ready(function() {
			
	$("#cedula").mask("?99999999");
	$("#telefono").mask("9999-9999999");
	
    $("#form1").validate({
		rules: {
			cedula: {required: true},
			nombre: {required: true,minlength: 6},
			fec_nac2: {required: true},
			nacion: {required: true},
			sexo: {required: true},
			telefono: {required: true},
			email: {required: true, email: true},
			ciudad: {required: true},
			direccion: {required: true, minlength: 3}
		},
			submitHandler: function() { 
				var aceptar = confirm("Desea modificar el registro del miembro?"); 
				if (aceptar) {
					form.submit();
				}
			}

	});
	
	$("#fec_nac2").datepicker({ 
		dateFormat: "dd-mm-yy",
		changeMonth: true,
      	changeYear: true,
		altField: "#fec_nac",
      	altFormat: "yy-mm-dd"
	});
	
	$("input.mayu").keyup(function() {
        $(this).val($(this).val().toUpperCase());
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
    <h1 align="center"><strong>Modificar Miembro</strong></h1>
        <form id="form1" name="form1" method="post" action="">
        <p align="center"><input name="id_miembro" type="hidden" id="id_miembro" value="<?php print $row[id_miembro] ?>"></p>
        
<table width="700" border="0" align="center" cellpadding="5" cellspacing="0">
	  <tr>
		    <td width="105">Cedula/Carnet</td>
		    <td width="162">
		      <input name="cedula" type="text" disabled id="cedula" value="<?php print $row[cedula] ?>" />
	        </td>
		    <td width="130">&nbsp;</td>
		    <td width="87">&nbsp;</td>
		    <td width="152">&nbsp;</td>
	      </tr>
		  <tr>
		    <td>Nombre</td>
		    <td colspan="2">
	        <input name="nombre" type="text" id="nombre" value="<?php print $row[nombre] ?>" size="50" class="mayu"/></td>
		    <td>Fecha Nac.</td>
		    <td><label for="textfield3"></label>
	        <input name="fec_nac2" type="text" id="fec_nac2" value="<?php print date("d-m-Y", strtotime($row[fec_nac])) ?>" readonly />
	        <input type="hidden" name="fec_nac" id="fec_nac" value="<?php print $row[fec_nac] ?>"></td>
	      </tr>
		  <tr>
		    <td>Nacionalidad</td>
		    <td colspan="2"><label for="nacion"></label>
	        <input name="nacion" type="text" id="nacion" value="<?php print $row[nacion] ?>" size="30" class="mayu" /></td>
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
	        <input name="telefono" type="text" id="telefono" value="<?php print $row[telf] ?>" size="30" />	        <label for="tipo"></label></td>
		    <td>Profesion</td>
		    <td><input name="profesion" type="text" id="profesion" value="<?php print $row[profesion] ?>" class="mayu" />		      <label for="profesion"></label></td>
	      </tr>
		  <tr>
		    <td>E-mail</td>
		    <td colspan="2"><label for="email"></label>
	        <input name="email" type="text" id="email" value="<?php print $row[email] ?>" size="50" class="mayu" /></td>
		    <td>Ciudad</td>
		    <td><input name="ciudad" type="text" id="ciudad" value="<?php print $row[ciudad] ?>" class="mayu" />		      <label for="ciudad"></label></td>
	      </tr>
		  <tr>
		    <td>Direccion</td>
		    <td colspan="4"><label for="direccion"></label>
	        <input name="direccion" type="text" id="direccion" value="<?php print $row[direccion] ?>" size="100" class="mayu" /></td>
	      </tr>
		  <tr>
		    <td>Tipo de Miembro</td>
		    <td colspan="2"><label for="tipo"></label>
		      <select name="tipo" id="tipo">
		        <option value="ESTUDIANTE" <?php if ($row[tipo] == 'ESTUDIANTE') print 'selected="selected"' ?>>ESTUDIANTE</option>
		        <option value="PROFESOR" <?php if ($row[tipo] == 'PROFESOR') print 'selected="selected"' ?>>PROFESOR</option>
		        <option value="ADMINISTRATIVO" <?php if ($row[tipo] == 'ADMINISTRATIVO') print 'selected="selected"' ?>>ADMINISTRATIVO</option>
		        <option value="EXTERNO" <?php if ($row[tipo] == 'EXTERNO') print 'selected="selected"' ?>>EXTERNO</option>
            </select></td>
		    <td>Estado</td>
		    <td><select name="estado" id="estado">
              <option value="SOLVENTE" <?php if ($row[estado] == 'SOLVENTE') print 'selected="selected"' ?>>SOLVENTE</option>
                <option value="SUSPENDIDO" <?php if ($row[estado] == 'SUSPENDIDO') print 'selected="selected"' ?>>SUSPENDIDO</option>
            </select></td>
	      </tr>
		  <tr>
		    <td>Observaciones</td>
		    <td colspan="4"><label for="obs"></label>
	        <textarea name="obs" id="obs" cols="50" rows="4"><?php print $row[obs] ?></textarea></td>
	      </tr>
		  <tr>
		    <td colspan="5" align="center"><input type="submit" name="modificar" id="modificar" value="Modificar" />
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