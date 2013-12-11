<?php 
session_start();
include('classes/bd.php');
include('classes/usuarios.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$usuario = new Usuarios();
if ($_POST[modificar]) {
	$id_usuario = $_POST[id_usuario];
	$nombre_usuario = $_POST[nombre_usuario];
	$nombre = $_POST[nombre];
	$clave = $_POST[clave1];
	$email = $_POST[email];
	$usuario->Modificar($id_usuario,$nombre_usuario,$nombre,$clave,$email);	
	?><script>alert("Se ha modificado el usuario con éxito");window.location="usuario_mod.php?id=<?php print $id_usuario ?>"</script><?php
	
}

if ($_GET[id]) {
	$id_usuario = $_GET[id];
	$usuario->Buscar($id_usuario);
	$row = $usuario->Fetch_array();
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
<script type="text/javascript" src="js/messages_es.js"></script>
<script>
$(document).ready(function() {
	
	$("#form1").validate({
		rules: {
			nombre: {required: true, minlength: 6},
			nombre_usuario: {required: true, minlength: 3},
			clave1: {required: true,minlength: 6},
			clave2: {required: true, equalTo: "#clave1"},
			email: {required:true, email:true}
		}
	}); 

});

$.validator.setDefaults({
	submitHandler: function() { 
		var aceptar = confirm("Desea modificar el usuario?"); 
		if (aceptar) {
			form.submit();
		}
	}
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
	<p align="center">&nbsp;</p>
	<p align="center"><strong>Modificar Usuario</strong>	</p>
	<form id="form1" name="form1" method="post" action="" autocomplete="off">
	<p align="center">
	  <input name="id_usuario" type="hidden" id="id_usuario" value="<?php print $row[id_usuario] ?>">&nbsp;
	</p>
      <table width="300" border="0" align="center" cellpadding="5" cellspacing="1">
                    <tr>
                      <td>Usuario</td>
                      <td><input name="nombre_usuario" type="text"  id="nombre_usuario" onchange="this.value = this.value.toUpperCase();" value="<?php print $row[usuario] ?>" maxlength="20"/></td>
        </tr>
                    <tr>
                      <td>Nombre</td>
                      <td><input name="nombre" type="text" id="nombre" onchange="this.value = this.value.toUpperCase();" value="<?php print $row[nombre] ?>" size="30" maxlength="50"/></td>
        </tr>
                    <tr>
                      <td>Clave</td>
                      <td><input name="clave1" type="password" id="clave1" maxlength="15" /><label for="clave1" autocomplete="off"></label></td>
        </tr>
                    <tr>
                      <td>Confirmar Clave</td>
                      <td><input name="clave2" type="password" id="clave2" maxlength="15" autocomplete="off"/></td>
        </tr>
                    <tr>
                      <td>Email</td>
                      <td><input name="email" type="text" id="email" onchange="this.value = this.value.toUpperCase();" value="<?php print $row[email] ?>" size="40" maxlength="50" /></td>
        </tr>
                    <tr>
                      <td colspan="2" align="center"><p>
                        <input name="modificar" type="submit" class="botones" id="modificar" value="Modificar" />
                        <input type="reset" name="reset" id="reset" value="Restablecer">
                      </p></td>
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