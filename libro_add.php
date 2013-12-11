<?php 
session_start();
include('classes/bd.php');
include('classes/libros.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$libro = new Libros();

if ($_POST[agregar]) {
	$cota = $_POST[cota];
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
	$consul = mysql_query("SELECT * FROM libros WHERE cota = '$cota'");
	$filas = mysql_num_rows($consul);
	if ( $filas > 0) {
		?><script>alert("Este libro ya existe");window.location="libro_add.php"</script><?php
		die;	
	}
	$id = $libro->Agregar($cota,$titulo,$editorial,$ciudad,$pais,$edicion,$fec_edic,$resumen,$num_pags,$url,$isbn,$tipo,$categoria);	
	?><script>alert("Se ha agregado el libro con éxito");window.location="libro_mod.php?id=<?php print $id ?>";</script><?php
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
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.sgb.min.js"></script>

<script>
$.validator.setDefaults({
	submitHandler: function() { 
	var aceptar = confirm("Desea agregar un nuevo libro?"); 
	if (aceptar) {
		form.submit();
		}
	}
});

$(document).ready(function() {
	
	$("input.mayu").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
			
	$("#isbn").mask("999-999-999-999-9");
	$("#num_pags").mask("?9999");
	
    $("#form1").validate({
		rules: {
			titulo: {required: true, minlength: 3},
			cota: {required: true,minlength: 6},
			editorial: {required: true,minlength: 3},
			edicion: {required: true},
			fec_edic: {required: true},
			ciudad: {required: true,minlength: 3},
			pais: {required: true,minlength: 3},
			num_pags: {required: true},
			isbn: {required: true},
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
    <div>
		<br />
		<h1 align="center">Registro de Libro</h1>
		<br />
	  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	    <table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
		    <tr>
		      <td>Titulo</td>
		      <td colspan="3"><input name="titulo" type="text" id="titulo" onChange="this.value = this.value.toUpperCase();" size="60" maxlength="100" class="mayu" /></td>
		      <td>Cota</td>
		      <td><input name="cota" type="text" id="cota" maxlength="10" class="mayu" /></td>
	        </tr>
		    <tr>
		      <td>Editorial</td>
		      <td><input name="editorial" type="text" id="editorial" maxlength="20" class="mayu"/></td>
		      <td>Edicion</td>
		      <td><select name="edicion" id="edicion">
		        <option>SELECCIONE</option>
		        <option value="PRIMERA">PRIMERA</option>
		        <option value="SEGUNDA">SEGUNDA</option>
		        <option value="TERCERA">TERCERA</option>
		        <option value="CUARTA">CUARTA</option>
		        <option value="QUINTA">QUINTA</option>
		        <option value="SEXTA">SEXTA</option>
		        <option value="SEPTIMA">SEPTIMA</option>
		        <option value="OCTAVA">OCTAVA</option>
		        <option value="NOVENA">NOVENA</option>
		        <option value="DECIMA">DECIMA</option>
	          </select></td>
		      <td>Fecha Edic.</td>
		      <td>
              <select name="fec_edic" id="fec_edic">
              	<?php 
				$anio = date("Y");
				for ($i = 1900; $i <= $anio; $i++) {
					?><option value="<?php print $i ?>"><?php print $i ?></option><?php
				}
				?>
	          </select></td>
	        </tr>
		    <tr>
		      <td>Ciudad</td>
		      <td>
	          <input name="ciudad" type="text" id="ciudad" maxlength="20" class="mayu" /></td>
		      <td>País</td>
		      <td><input name="pais" type="text" id="pais" maxlength="30" class="mayu" /></td>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
	      </tr>
		    <tr>
		      <td>Categoria</td>
		      <td colspan="3"><select name="select2" id="select2">
		        <option value="000">Ciencia de los Computadores, Información y Obras Gen.</option>
		        <option value="100">Filosofía y Psicología</option>
		        <option value="200">Religión, Teología</option>
		        <option value="300">Ciencias Sociales</option>
		        <option value="400">Lenguas</option>
		        <option value="500">Ciencias Básicas</option>
		        <option value="600">Tecnología y Ciencias Aplicadas</option>
		        <option value="700">Artes y recreación</option>
		        <option value="800">Literatura</option>
		        <option value="900">Historia y Geografía</option>
	          </select></td>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
	      </tr>
		    <tr>
		      <th colspan="4"><h2>Resumen</h2></th>
		      <th colspan="2"><h2>Otros Datos</h2></th>
	        </tr>
		    <tr>
		      <td colspan="4" rowspan="4"><textarea name="resumen" id="resumen" cols="60" rows="10"></textarea></td>
		      <td>Núm. Pags.</td>
		      <td><input name="num_pags" type="text" id="num_pags" maxlength="4" /></td>
	        </tr>
		    <tr>
		      <td>ISBN</td>
		      <td><input type="text" name="isbn" id="isbn" /></td>
	        </tr>
		    <tr>
		      <td>URL</td>
		      <td><input name="url" type="text" id="url" maxlength="50" /></td>
	        </tr>
		    <tr>
		      <td>Tipo 
		        </td>
		      <td><select name="tipo" id="tipo">
		        <option value="IMPRESO" selected="selected">IMPRESO</option>
		        <option value="DIGITAL">DIGITAL</option>
	          </select></td>
	        </tr>
		    <tr>
		      <td colspan="6" align="center"><input type="submit" name="agregar" id="agregar" value="Agregar" />
              <input type="reset" name="resta" id="resta" value="Restablecer" /></td>
	      </tr>
    </table>
      </form>
    </div>
       
  <!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>