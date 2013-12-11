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
$libro = new Libros();
if ($_POST[modificar]) {
	$id_libro = $_POST[id_libro];
	$titulo = $_POST[titulo];
	$editorial = $_POST[editorial];
	$ciudad = $_POST[ciudad];
	$pais = $_POST[pais];
	$edicion = $_POST[edicion];
	$fec_edic = $_POST[fec_edic];
	$resumen = $_POST[resumen];
	$num_pags = $_POST[num_pags];
	$url = $_POST[url];
	$isbn = $_POST[isbn];
	$tipo = $_POST[tipo];
	$categoria = $_POST[categoria];
	$rutapdf = "pdfs/" . $_FILES['pdf']['name']; 
	$rutaepub = "epubs/" . $_FILES['epub']['name']; 
	if (!file_exists($rutapdf)){
		//aqui movemos el archivo desde la ruta temporal a nuestra ruta
		//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
		$resultado = @move_uploaded_file($_FILES['pdf']["tmp_name"], $rutapdf);
		if ($resultado){
			?><script>alert("El archivo pdf ha sido guardado con éxito");</script><?php
		} else {
			?><script>alert("Ocurrió un error al guardar el archivo.");</script><?php
		}
	} else {
		$rutapdf = $_POST[pdf];
	}
	//aqui movemos el archivo desde la ruta temporal a nuestra ruta
	//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
	if (!file_exists($rutaepub)){
		$resultado = @move_uploaded_file($_FILES['epub']["tmp_name"], $rutaepub);
		if ($resultado){
			?><script>alert("El archivo epub ha sido guardado con éxito");</script><?php
		} else {
			?><script>alert("Ocurrió un error al guardar el archivo.");</script><?php
		}
	} else {
		$rutaepub = $_POST[epub];	
	}
	$libro->Modificar($id_libro,$titulo,$editorial,$ciudad,$pais,$edicion,$fec_edic,$resumen,$num_pags,$url,$isbn,$tipo,$categoria,$rutapdf,$rutaepub);	
	?><script>alert("Se ha modificado el libro con éxito");window.location="libro_mod.php?id=<?php print $_POST[id_libro] ?>";</script><?php
}
	
if ($_GET[id]) {
	$id = $_GET[id];
	
	$libro = new Libros();
	$libro->Buscar($id);
	$rowl = $libro->Fetch_array();
	
	$autor = new Autores();
	$consulta_a = $autor->Consultar($id);
	
	$ejemplar = new Ejemplares();
	$consulta_e = $ejemplar->Buscar($id);
} 

// Autores
if ($_POST[agregar_autor]) {
	$autor = new Autores();
	
	$id_libro = $_POST[id_libro_a];
	$nombres = $_POST[nombres];
	$apellidos = $_POST[apellidos];
	$tipo_autor = $_POST[tipo_autor];
	
	$autor->Agregar($id_libro,$nombres,$apellidos,$tipo_autor);	
	?><script>alert("Se ha agregado el Autor con éxito");window.location="libro_mod.php?id=<?php print $id_libro ?>";</script><?php	
}

// Ejemplares
if ($_POST[id_libro_e]) {
	$ejemplar = new Ejemplares();

	$id_libro = $_POST[id_libro_e];
	$cota = $_POST[cota_e];
	$condicion = $_POST[condicion];
	$prestamo = $_POST[prestamo];	
	$ejemplar->Agregar($id_libro,$cota,$condicion,$prestamo);
	?><script>alert("Se ha agregado el Ejemplar del libro con éxito");window.location="libro_mod.php?id=<?php print $id_libro ?>";</script><?php	
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
<link rel="stylesheet" type="text/css" href="css/sgb/jquery-ui-1.10.3.sgb.min.css"/>
<link rel="stylesheet" type="text/css" href="css/colorbox.css"/>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.sgb.min.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>

<script>
$.validator.setDefaults({
	submitHandler: function() { 
	var aceptar = confirm("Desea modificar el libro: <?php print $rowl[titulo] ?>?"); 
	if (aceptar) {
		form.submit();
		}
	}
});

$(document).ready(function() {
	
	$(".colorbox").colorbox({inline:true});
	
	$("#isbn").mask("999-999-999-999-9");
	
    $("#form1").validate({
		rules: {
			titulo: {required: true, minlength: 3},
			cota: {required: true,minlength: 6},
			editorial: {required: true,minlength: 3},
			edicion: {required: true},
			ciudad: {required: true,minlength: 3},
			pais: {required: true,minlength: 3},
			num_pags: {required: true},
			isbn: {required: true},
		}
	});
		
	$("input.mayu").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
	
});

function Eliminar(id_autor,id_libro) {
	$.post( "autor_eli.php", {id_autor: id_autor} , function(data) {
		alert(data);
		window.location="libro_mod.php?id="+id_libro;
	});
	
}

</script>
<!-- InstanceEndEditable -->
</head>
<body bgcolor="#f2f2f2" onload="MM_preloadImages('img/menu_r1_c1_s2.jpg','img/menu_r1_c2_s2.jpg','img/menu_r1_c3_s2.jpg','img/menu_r1_c4_s2.jpg','img/menu_r1_c5_s2.jpg')">
<br />
<div id="header"><?php include("header.php");?></div>
<div id="fondo">
<?php  include("menu.html"); ?><p>&nbsp;</p>
	<!-- InstanceBeginEditable name="content" -->
    <div>
		<p align="center">&nbsp;</p>
		<h1 align="center">Modificar  Libro </h1>
		<br />
	  <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
	    <table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
		    <tr>
		      <th colspan="4"><h2><a href="#agregar_autores" class="colorbox">Autores</a></h2></th>
		      <th colspan="2"><h2><a href="#agregar_ejemplares" class="colorbox">Ejemplares</a></h2></th>
	      </tr>
		    <tr>
		      <td><input name="id_libro" type="hidden" id="id_libro" value="<?php print $_GET[id] ?>" />
		        Titulo
	          </td>
		      <td colspan="3"><input name="titulo" type="text" id="titulo" value="<?php print $rowl[titulo] ?>" size="70" class="mayu" /></td>
		      <td>Cota</td>
		      <td><input name="cota" type="text" id="cota" value="<?php print $rowl[cota] ?>" readonly class="mayu" /></td>
	      </tr>
		    <tr>
		      <td>Editorial
		        </td>
		      <td><input name="editorial" type="text" id="editorial" value="<?php print $rowl[editorial] ?>" class="mayu" /></td>
		      <td>Edición</td>
		      <td><input name="edicion" type="text" id="edicion" value="<?php print $rowl[edicion] ?>" class="mayu" /></td>
		      <td>Fecha Edic.</td>
		      <td><select name="fec_edic" id="fec_edic">
              <?php 
				$anio = date("Y");
				for ($i = 1900; $i <= $anio; $i++) {
					?><option value="<?php print $i ?>" <?php if ($rowl[fec_edic] == $i) print 'selected="selected"' ?>><?php print $i ?></option><?php
				}
				?>
	          </select></td>
	      </tr>
		    <tr>
		      <td>Ciudad</td>
		      <td>
		        <input name="ciudad" type="text" id="ciudad" value="<?php print $rowl[ciudad_edit] ?>" class="mayu" /></td>
		      <td>País</td>
		      <td><input name="pais" type="text" id="pais" value="<?php print $rowl[pais_edit] ?>" class="mayu" /></td>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
	      </tr>
		    <tr>
		      <td>Categoría</td>
		      <td colspan="3"><select name="categoria" id="categoria">
		        <option value="000" <?php if ($rowl[categoria] == '000') print 'selected="selected"' ?>>Ciencia de los Computadores, Información y Obras Gen.</option>
		        <option value="100" <?php if ($rowl[categoria] == '100') print 'selected="selected"' ?>>Filosofía y Psicología</option>
		        <option value="200" <?php if ($rowl[categoria] == '200') print 'selected="selected"' ?>>Religión, Teología</option>
		        <option value="300" <?php if ($rowl[categoria] == '300') print 'selected="selected"' ?>>Ciencias Sociales</option>
		        <option value="400" <?php if ($rowl[categoria] == '400') print 'selected="selected"' ?>>Lenguas</option>
		        <option value="500" <?php if ($rowl[categoria] == '500') print 'selected="selected"' ?>>Ciencias Básicas</option>
		        <option value="600" <?php if ($rowl[categoria] == '600') print 'selected="selected"' ?>>Tecnología y Ciencias Aplicadas</option
		        ><option value="700" <?php if ($rowl[categoria] == '700') print 'selected="selected"' ?>>Artes y recreación</option>
		        <option value="800" <?php if ($rowl[categoria] == '800') print 'selected="selected"' ?>>Literatura</option>
		        <option value="900" <?php if ($row[categoria] == '900') print 'selected="selected"' ?>>Historia y Geografía</option>
	          </select></td>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
	      </tr>
		    <tr>
		      <th colspan="4"><p>Resumen</p></th>
		      <th colspan="2"><p>Otros Datos</p></th>
	        </tr>
		    <tr>
		      <td colspan="4" rowspan="4">
	          <textarea name="resumen" id="resumen" cols="60" rows="10"><?php print $rowl[resumen] ?>
		      </textarea></td>
		      <td>Núm. Pags. 
	          </td>
		      <td><input name="num_pags" type="text" id="num_pags" value="<?php print $rowl[num_pags] ?>" /></td>
	        </tr>
		    <tr>
		      <td>URL 
	          <label for="url"></label></td>
		      <td><input name="url" type="text" id="url" value="<?php print $rowl[url] ?>" /></td>
	        </tr>
		    <tr>
		      <td>ISBN 
	          </td>
		      <td><input name="isbn" type="text" id="isbn" value="<?php print $rowl[isbn] ?>" /></td>
	        </tr>
		    <tr>
		      <td>Tipo 
		        <label for="tipo"></label></td>
		      <td><select name="tipo" id="tipo">
		        <option value="IMPRESO" <?php if ($row[tipo] == 'IMPRESO') print 'selected="selected"' ?>>IMPRESO</option>
		        <option value="DIGITAL" <?php if ($row[tipo] == 'DIGITAL') print 'selected="selected"' ?>>DIGITAL</option>
	          </select></td>
	        </tr>
		    <tr>
		      <td colspan="4">PDF
		        <input type="file" name="pdf" id="pdf" /></td>
		      <td>PDF</td>
		      <td><a href="<?php print $rowl[pdf] ?>" target="_blank">
			  <input type="hidden" name="pdf" id="pdf" value="<?php print $rowl[pdf] ?>">
			  <?php if ($rowl[pdf] !== 'pdfs/') { 
					print $rowl[pdf]; 
					} 
				?>
					</a></td>
          </tr>
		    <tr>
		      <td colspan="4">Epub
		        <input type="file" name="epub" id="epub" /></td>
		      <td>Epub</td>
		      <td><a href="<?php print $rowl[epub] ?>" target="_blank">
		        <input type="hidden" name="epub" id="epub" value="<?php print $rowl[epub] ?>">
		        <?php if ($rowl[epub] !== '') { 
					print $rowl[epub]; 
					} 
				?>
		      </a></td>
          </tr>
		    <tr>
		      <td colspan="6" align="center"><input type="submit" name="modificar" id="modificar" value="Modificar" />
              <input type="reset" name="resta" id="resta" value="Restablecer" /></td>
	      </tr>
    </table>
      </form>
    </div>
    
     <!-- //////////////////////////////////// -->    
     <!--Div para agregar autores-->
    
<div style="display:none">
            
<div id="agregar_autores">
<form id="autores" name="autores" method="post" action="">
<?php
	  	if ($autor->Num_rows() > 0) { ?>
    <table width="400" border="1" align="center" cellpadding="4" cellspacing="0">
      <tr>
        <th scope="col">Apellidos</th>
        <th scope="col">Nombres</th>
        <th scope="col">Tipo</th>
        <th scope="col">&nbsp;</th>
        </tr>
      <?php
			while ($rowa = mysql_fetch_array($consulta_a)) {?>
		  <tr>
			<td><?php print $rowa[apellidos]?>&nbsp;</td>
			<td><?php print $rowa[nombres]?>&nbsp;</td>
			<td><?php print $rowa[tipoautor]?>&nbsp;</td>
			<td><a href="javascript:Eliminar(<?php print $rowa[id_autor]?>,<?php print $id?>)"><img src="icons/user_delete.png" width="24" height="24" id="eliminar" /></a></td>
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
      <input name="id_libro_a" type="hidden" id="id_libro_a" value="<?php print $_GET[id] ?>" />
    
    <table border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td colspan="2"><strong>Nombre</strong></td>
        <td ><input type="text" name="nombres" id="nombres" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><strong>Apellido</strong></td>
        <td><input name="apellidos" type="text" id="apellidos" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><strong>Tipo</strong></td>
        <td><select name="tipo_autor" id="tipo_autor">
          <option>Primario</option>
          <option>Secundario</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="3" align="center"><input type="submit" name="agregar_autor" id="agregar_autor" value="Agregar Autor" /></td>
      </tr>
    </table>
</form>
</div>
		<!--Fin Autores-->

<!-- //////////////////////////////////// -->    
<!--Div para agregar ejemplares -->

<div id="agregar_ejemplares">
<form id="ejemplares" name="ejemplares" method="post" action="">
 <table border="1" align="center" cellpadding="4" cellspacing="0">
   <tr>
     <th scope="col">Cota</th>
     <th scope="col">Condición</th>
     <th scope="col">Prestamo</th>
     <th scope="col">Estado</th>
     </tr>
   <?php 
        while ($rowe = mysql_fetch_array($consulta_e)) {?>
   <tr>
     <td><?php print $rowe[cota]?>&nbsp;</td>
     <td><?php print $rowe[condicion]?>&nbsp;</td>
     <td><?php print $rowe[prestamo]?>&nbsp;</td>
     <td><?php print $rowe[estado]?>&nbsp;</td>
     </tr>
   <?php } ?>
 </table>
 <p align="center">
   <input name="id_libro_e" type="hidden" id="id_libro_e" value="<?php print $_GET[id] ?>" />
 </p>
 <table width="300" border="0" align="center" cellpadding="4" cellspacing="4">
  <tr>
    <td scope="col">Cota</td>
    <td scope="col">
      
      <input type="text" name="cota_e" id="cota_e" />
    </td>
  </tr>
  <tr>
    <td>Ejemplar</td>
    <td>
      
      <input type="text" name="ejemplar" id="ejemplar" />
    </td>
  </tr>
  <tr>
    <td>Condicion</td>
    <td>
      <select name="condicion" id="condicion">
        <option>NORMAL</option>
        <option>DAÑADO</option>
      </select></td>
  </tr>
  <tr>
    <td>Prestamo</td>
    <td>
      <select name="prestamo" id="prestamo">
        <option>INTERNO</option>
        <option>EXTERNO</option>
      </select></td>
  </tr>
  <tr>
    <td>Estado</td>
    <td><select name="estado" id="estado">
      <option>DISPONIBLE</option>
      <option>OCUPADO</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="agregar_ejemplar" id="agregar_ejemplar" value="Agregar Ejemplar" />
    </td>
    </tr>
</table>
</form>
</div>
<!--Fin Ejemplares-->

</div>
  <!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>