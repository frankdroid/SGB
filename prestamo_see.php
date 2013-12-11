<?php 
session_start();
include("classes/bd.php");
include("classes/prestamos.php");
include("classes/ejemplares.php"); 

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}


if ($_GET[id]) {
	$id = $_GET[id];
	
	$prestamo = new Prestamos();
	$prestamo->Buscar($id);
	$row = $prestamo->Fetch_array();
	
	$ejemplar = new Ejemplares();
	$ejemplar->Buscar3($id);
	
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Gestion Biblioteca - Bienvenido</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
$("#imprimir").click(function(){
	window.open("prestamo_pdf.php?id=<?php print $id?>", "Imprimir Préstamp", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no");	
})
</script>

</head>

<body class="fondo_view">
		<h1 align="center">Detalles del Préstamo </h1>
		<br />
	  <form id="form1" name="form1" method="post" action="">
	    <table border="0" align="center" cellpadding="5" cellspacing="5">
		    <tr>
		      <td>Miembro</td>
		      <td class="campos_ver"><?php print $row[nombre] ?>&nbsp;</td>
		      <td>Tipo</td>
		      <td class="campos_ver"><?php print $row[tipo] ?>&nbsp;</td>
	      </tr>
		    <tr>
		      <td colspan="4">
	          <div>
	            <table width="102%" align="center" cellpadding="4" cellspacing="0">
	              <thead>
	                <tr>
	                  <th bgcolor="#F0F3F7" scope="col">Cota</th>
	                  <th bgcolor="#F0F3F7" scope="col">Título</th>
	                  <th bgcolor="#F0F3F7" scope="col">Prestamo</th>
                    </tr>
                  </thead>
	              <tbody>
	                <?php 
            while ($rowe = $ejemplar->Fetch_array()) {?>
	                <tr>
	                  <td align="center"><?php print $rowe[cota]?>&nbsp;</td>
	                  <td align="center"><?php print $rowe[titulo]?>&nbsp;</td>
	                  <td align="center"><?php print $rowe[prestamo]?>&nbsp;</td>
                    </tr>
	                <?php } ?>
                  </tbody>
                </table>
	          </div></td>
	      </tr>
		    <tr>
		      <td>Creado</td>
		      <td class="campos_ver"><?php print $row[creado] ?></td>
		      <td>Fecha Venc.</td>
		      <td class="campos_ver"><?php print $row[fec_dev] ?></td>
	      </tr>
		    <tr>
		      <td>Estado</td>
		      <td class="campos_ver"><?php print $row[estado] ?></td>
		      <td>Modificado</td>
		      <td class="campos_ver"><?php print $row[modificado] ?>
		        </td>
	      </tr>
		    <tr>
		      <td>Creado Por</td>
		      <td class="campos_ver"><?php print $row[creado_por] ?></td>
		      <td>Modificado Por</td>
		      <td class="campos_ver"><?php print $row[modificado_por] ?></td>
	      </tr>
        </table>
	    <p align="center">
	      <input type="button" name="imprimir" id="imprimir" value="Imprimir">
	    </p>
      </form>
</div>
</body>
</html>