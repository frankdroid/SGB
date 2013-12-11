<br/><br/><br/><br/>
<p><?php 
$meses = array(" ","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
print date("j")." de ".$meses[date('n')]." de ".date('Y');
?>&nbsp;&nbsp;
Bienvenido: &nbsp;&nbsp;<?php print $_SESSION[nombre_user] ?>&nbsp;&nbsp;
  <a href="cerrar.php">Cerrar Sesión</a>
</p>
