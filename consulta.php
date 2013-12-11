<?php 
session_start();
include('classes/bd.php');

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
		$("#consul").validate();
		
		$("#buscar").click(function(){			
			var titulo = $("#titulo").val();
			var autor = $("#autor").val();
			var cota = $("#cota").val();
			if (titulo == "" && autor == "" && cota == "") {
				alert("Debe rellenar algún campo");
			} else {
				$.post( "libros_cons.php", {titulo: titulo, autor: autor, cota: cota} , function( data ) {
					$( "#libros_cons" ).html(data)
				});
				// $("#id_ejemplar").val('');
				//$("#cota").val(''); 
				//$("#titulo").val('');
			}
		});
	});
</script>
</head>
<body bgcolor="#f2f2f2">
<br />
<div id="fondo2">
  <p><br />
    <br /><br /><br />
  <?php
  

?>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <h1 align="center">Introduzca algún parámetro de búsqueda</h1>
  <p align="center">&nbsp;</p>
  <form id="consul" name="consul" action="">
  <p align="center"><strong>Titulo
    <input name="titulo" type="text" id="titulo" size="30" />
    <label for="autor">Autor(es):</label>
    <input name="autor" type="text" id="autor" size="30" />
    <label for="cota">Cota</label>
    <input type="text" name="cota" id="cota" />
  </strong>  </p>
  <p align="center">
    <input type="button" name="buscar" id="buscar" value="Buscar Libro" />
  </p>
  </form>
  <p align="center">
  <div id="libros_cons"></div>
  </p>
</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
</html>