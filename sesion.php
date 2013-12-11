<?php 
session_start();
include('classes/bd.php');
include("classes/usuarios.php");

if (isset($_POST[usuario])) {
	  // Si se ha intentado iniciar sesión
	  $usuario = new Usuarios();
	  $usuario->Inicia_sesion($_POST[usuario],$_POST[clave]);
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Gestion Biblioteca - Bienvenido</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/mm_css_menu.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script>
	$(document).ready(function(){
		$("#identi").validate();
	});
</script>
</head>
<body bgcolor="#f2f2f2" onload="MM_preloadImages('img/menu_r1_c1_s2.jpg','img/menu_r1_c2_s2.jpg','img/menu_r1_c3_s2.jpg','img/menu_r1_c4_s2.jpg','img/menu_r1_c5_s2.jpg')">
<div id="fondo2">
<br /><br /><br /><br />
<?php
  
  // Si se ha iniciado sesión 
if (isset($_SESSION[usuario])) {
	// Ir a menu principal ?>
	<script type="text/javascript">window.location="index.php";</script> 
    <?php
} else if (isset($_POST[usuario])) {
	// se incluye el formulario de inicio de sesión
	include('identi.html');	
	// Si se ha intentado iniciar sesión y falló
	echo '<p align="center" style="color:#FF0000">Nombre de usuario o clave incorrecta.</p>';
} else if ($_POST[inisesion]) {  
	// se incluye el formulario de inicio
	include('identi.html');    
} else if ($_POST[consul]) {
	// Ir a consultar libros ?>
	<script type="text/javascript">window.location="consulta.php";</script> 
    <?php
} else {
	// se incluye el formulario de inicio
	include('inicio.html');
}
?>
</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
</html>