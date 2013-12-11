<?php 
session_start();
include("classes/bd.php");
include("classes/libros.php"); 
include("classes/autores.php");
include("classes/ejemplares.php");

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

//Libros

if ($_GET[id]) {
	$id = $_GET[id];
	
	$libro = new Libros();
	$libro->Buscar($id);
	$rowl = $libro->Fetch_array();
	
	$autor = new Autores();
	$consulta_a = $autor->Consultar($id);
	
	$ejemplar = new Ejemplares();
	$consulta_e = $ejemplar->Consultar($id);
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
$(document).ready(function() {
	
	$("#autores").hide();
	$("#ejemplares").hide();
	
	$("#btn_autores").click(function(){
		$("#autores").show('slow');
	});
	
	$("#btn_ejemplares").click(function(){
		$("#ejemplares").show('slow');
	})
	
});
</script>
</head>

<body class="fondo_view">
		<h1 align="center"><strong>Detalles del Libro</strong> </h1>
		<br />
<table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
		    <tr>
		      <th colspan="4">
              <h2><a href="#" id="btn_autores">Autores</a></h2>
	            <div id="autores">
	              <?php
	  	if ($autor->Num_rows() > 0) { ?>
	              <table border="1" align="center" cellpadding="4" cellspacing="0">
	                <tr>
	                  <th scope="col">Apellidos</th>
	                  <th scope="col">Nombres</th>
	                  <th scope="col">Tipo</th>
                    </tr>
	                <?php
			while ($rowa = mysql_fetch_array($consulta_a)) {?>
	                <tr>
	                  <td><?php print $rowa[apellidos]?>&nbsp;</td>
	                  <td><?php print $rowa[nombres]?>&nbsp;</td>
	                  <td><?php print $rowa[tipoautor]?>&nbsp;</td>
                    </tr>
	                <?php }  
		?>
                  </table>
	              <p align="center">
	                <?php
  		} else {
			print("No existen autores");
		} ?>
	                &nbsp;</p>
	            </div></th>
		      <th colspan="2"><h2><a href="#" class="colorbox" id="btn_ejemplares">Ejemplares</a></h2>
	            <div id="ejemplares">
	              <?php
if ($ejemplar->Num_rows() > 0) { ?>
	              <table border="1" align="center" cellpadding="4" cellspacing="0">
	                <tr>
	                  <th scope="col">Cota</th>
	                  <th scope="col">Ejemplar</th>
	                  <th scope="col">Condición</th>
	                  <th scope="col">Prestamo</th>
	                  <th scope="col">Estado</th>
                    </tr>
	                <?php 
        while ($rowe = mysql_fetch_array($consulta_e)) {?>
	                <tr>
	                  <td><?php print $rowe[cota]?>&nbsp;</td>
	                  <td><?php print $rowe[ejemplar]?>&nbsp;</td>
	                  <td><?php print $rowe[condicion]?>&nbsp;</td>
	                  <td><?php print $rowe[prestamo]?>&nbsp;</td>
	                  <td><?php print $rowe[estado]?>&nbsp;</td>
                    </tr>
	                <?php } ?>
                  </table>
	              <p align="center">
	                <?php
} else {
	print("No existen ejemplares");
} ?>
	                &nbsp;</p>
                <!--Fin Ejemplares--></div></th>
	      </tr>
		    <tr>
		      <td>Titulo</td>
		      <td colspan="3" class="campos_ver"><?php print $rowl[titulo] ?></td>
		      <td>Cota</td>
		      <td class="campos_ver"><?php print $rowl[cota] ?></td>
	      </tr>
		    <tr>
		      <td>Editorial
	          </td>
		      <td class="campos_ver"><?php print $rowl[editorial] ?></td>
		      <td>Edición</td>
		      <td class="campos_ver"><?php print $rowl[edicion] ?></td>
		      <td>Fecha Edic.</td>
		      <td class="campos_ver"><?php print $rowl[fec_edic] ?></td>
	      </tr>
		    <tr>
		      <td>Ciudad</td>
		      <td class="campos_ver"><?php print $rowl[ciudad_edit] ?></td>
		      <td>País</td>
		      <td class="campos_ver"><?php print $rowl[pais_edit] ?></td>
		      <td>Categoría</td>
		      <td class="campos_ver"><?php print $rowl[categoria] ?>
	          </td>
	      </tr>
		    <tr>
		      <th colspan="4"><p>Resumen</p></th>
		      <th colspan="2"><p>Otros Datos</p></th>
	        </tr>
		    <tr>
		      <td colspan="4" rowspan="4" valign="top" class="campos_ver"><?php print $rowl[resumen] ?></td>
		      <td>Núm. Pags. 
	          </td>
		      <td class="campos_ver"><?php print $rowl[num_pags] ?></td>
	        </tr>
		    <tr>
		      <td>URL 
	          </td>
		      <td class="campos_ver"><?php print $rowl[url] ?></td>
	        </tr>
		    <tr>
		      <td>ISBN 
	          </td>
		      <td class="campos_ver"><?php print $rowl[isbn] ?></td>
	        </tr>
		    <tr>
		      <td>Tipo 
	          </td>
		      <td class="campos_ver"><?php print $rowl[tipo] ?></td>
	        </tr>
		    <tr>
		      <td class="campos_ver" colspan="6">PDF <a href="pdfs/<?php print $rowl[pdf] ?>" target="_blank"><?php print $rowl[pdf] ?></a></td>
	      </tr>
		    <tr>
		      <td class="campos_ver" colspan="6">Epub</td>
	      </tr>
    </table>
</body>
</html>