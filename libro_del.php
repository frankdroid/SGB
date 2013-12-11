<?php 
session_start();
include("classes/bd.php");
include("classes/libros.php"); 

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

//Libros
if ($_POST[eliminar]) {
	$libro = new Libros();
	$id_libro = $_POST[id_libro];
	$libro->Eliminar($id_libro);
	?><script>close()</script><?php
}

if ($_GET[id]) {
	$id = $_GET[id];	
	$libro = new Libros();
	$libro->Buscar($id);
	$rowl = $libro->Fetch_array();
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Gestion Biblioteca - Bienvenido</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

<script>
$.validator.setDefaults({
	submitHandler: function() { 
	var aceptar = confirm("Desea eliminar el libro: <?php print $rowl[titulo] ?>? \n Esto no se puede deshacer!"); 
	if (aceptar) {
		form.submit();
		}
	}
});

$(document).ready(function() {

    $("#form1").validate();
});

</script>
</head>

<body class="fondo_view">
		<h1 align="center"><strong>Eliminar Libro</strong> </h1>
		<br />
<form id="form1" name="form1" method="post" action="libro_del.php">
  <table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
		    <tr>
		      <td><input name="id_libro" type="hidden" id="id_libro" value="<?php print $_GET[id] ?>" />
		        Titulo
	          </td>
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
		      <td class="campos_ver" colspan="6">PDF <a href="pdfs/<?php print $rowl[pdf] ?>" target="new"><?php print $rowl[pdf] ?></a></td>
	      </tr>
		    <tr>
		      <td class="campos_ver" colspan="6">Epub</td>
    </tr>
		    <tr>
		      <td colspan="6" align="center"><input type="submit" name="eliminar" id="eliminar" value="Eliminar"></td>
	      </tr>
  </table>
</form>
</div>
</body>
</html>