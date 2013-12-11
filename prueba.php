<?php 
session_start();
include('classes/classes.php');

if (isset($_POST[usuario])) {
	  // Si se ha intentado iniciar sesión
	  $usuario = new Usuarios();
	  $usuario->Inicia_sesion($_POST[usuario],$_POST[clave]);
}

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
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
<script>
$(document).ready(function() {
    $("#formulario").validate({
			rules: {
				name: {
					required: true,
					minlength: 2
				},
				email: {
					required: true,
					email: true,
				},
				number: {
					minlength: 9
				},
				message: {
					required: true,
					minlength: 2
				}
			},
			messages: {
				email: { 
					required: "Escribe tu mail",
					minlength: "Mail erróneo",
					error: "Mail erróneo",
				}
			},
			errorPlacement: function(error, element) {
				error.appendTo(element.parent());
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
    <form id="formulario" action="" method="post">
	<p><input type="text" name="name" id="name" /></p>
	<p><input type="text" name="email" id="email" /></p>
	<p><input type="text" name="number" id="number" /></p>
	<p><textarea cols="20" rows="7" name="message" id="message" ></textarea></p>
	<p><input type="submit" name="enviar" value="Enviar" class="button"/></p>
</form><!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>