<?php
  session_start();
  include('classes/bd.php');
  include("classes/usuarios.php");
  
  $id_usuario = $_SESSION[id_usuario];
  $usuario = new Usuarios();
  $usuario->Cierra_sesion($id_usuario);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="20;URL=index.php">
<title>Cerrar sesi&oacute;n de usuario</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
</head>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="339" height="244" align="center" background="img/identi.png">
  <tr>
    <td>
      <p align="center">&nbsp;      </p>
      <p align="center">
        <?php 
  if (!empty($old_usuario))
  {
				// Si se ha cerrado alguna sesión 
    echo 'Sesión Cerrada.<br />';
  }
  else
  {
    // Si se intenta acceder a la pagina
    echo 'No ha iniciado sesión<br />'; 
  }
?>
    <a href="index.php"><strong>Ir a página de inicio de sesión</strong></a></p></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
