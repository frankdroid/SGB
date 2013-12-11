<?php 
session_start();
include("classes/bd.php");
include('classes/usuarios.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$usuario = new Usuarios();

if ($_POST[agregar]) {
	$nombre_usuario = $_POST[nombre_usuario];
	$nombre = $_POST[nombre2];
	$clave = $_POST[clave1];
	$email = $_POST[email2];
	$msqj =  $usuario->Agregar($nombre_usuario,$nombre,$clave,$email);	
	?><script>alert("<?php print $msj ?>");window.location="usuarios_.php";</script><?php	
}

if (!$_POST[consultar]) {
	$usuario->Todos();
} else {
	$user = $_POST[user];
	$nombre = $_POST[nombre];
	$email = $_POST[email];
	$where = "1=1";
	if ($user != "") { $where.=" AND usuario like '%$user%'"; }
	if ($nombre != "") { $where.=" AND nombre like '%$nombre%'"; }
	if ($email != "") { $where.=" AND email like '%$email%'"; }
	$usuario->Consultar($where);
}
	
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/sgb.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Sistema de Gestion Biblioteca - Usuarios</title>
<!-- InstanceEndEditable -->
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/mm_css_menu.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- InstanceBeginEditable name="head" -->
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css"/>
<link rel="stylesheet" type="text/css" href="css/sgb/jquery-ui-1.10.3.sgb.min.css"/>
<link rel="stylesheet" type="text/css" href="css/colorbox.css"/>
<link rel="stylesheet" type="text/css" href="js/TableTools/media/css/TableTools_JUI.css">
<link rel="stylesheet" type="text/css" href="js/ColReorder/media/css/ColReorder.css">
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/messages_es.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script src="js/TableTools/media/js/TableTools.min.js"></script>
<script>
$(document).ready(function() {
	
	$('#usuarios').dataTable( {
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": 'R<"H"Tfr>t<"F"ip>',
		"oTableTools": {
			"sSwfPath": "js/TableTools/media/swf/copy_csv_xls_pdf.swf",
			"aButtons": [ "copy", "print", "xls", {
					"sExtends": "pdf",
					"sPdfOrientation": "landscape",
					"sPdfMessage": "Listado de Usuarios"
				} ]
        }
	} );
		
	$(".colorbox").colorbox({inline:true, width:"45%", height:"40%"});
	
	$("#form2").validate({
		rules: {
			nombre2: {required: true},
			nombre_usuario: {required: true},
			clave1: {required: true,minlength: 6},
			clave2: {required: true, equalTo: "#clave1"},
			email2: {required:true, email:true}
		}
	}); 

});

$.validator.setDefaults({
	submitHandler: function() { 
	var aceptar = confirm("Desea agregar el usuario?"); 
	if (aceptar) {
		form.submit();
		}
	}
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
	<h1 align="center">Consultar Usuarios</h1>
	<p align="center">&nbsp;</p>
	<form id="form1" name="form1" method="post">
	  <table border="0" align="center" cellpadding="4" cellspacing="4">
	    <tr>
	      <th scope="col">Usuario</th>
	      <th scope="col"> <label for="user"></label>
	        <input type="text" name="user" id="user" />
          </th>
	      <th scope="col">Nombre</th>
	      <th scope="col"><label for="nombre"></label>
	        <input type="text" name="nombre" id="nombre" /></th>
	      <th scope="col">Email</th>
	      <th scope="col"><label for="email"></label>
	        <input type="text" name="email" id="email" /></th>
        </tr>
	    <tr>
	      <td colspan="6" align="center"><input type="submit" name="consultar" id="consultar" value="Consultar" />
	        <a href="#usuario_add" class="colorbox">
	          <input name="agregar" type="button" id="agregar" title="Agregar Préstamo" value="Agregar">
            </a></td>
        </tr>
      </table>
	</form>
	<p>&nbsp;</p>
    <div class="tablas">
	<table border="0" align="center" cellpadding="0" cellspacing="0" id="usuarios">
    	<thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Creado</th>
            <th scope="col">Creado por</th>
            <th scope="col">Última Sesión</th>
            <th scope="col">&nbsp;</th>
          </tr>
		</thead>
        <tbody>
		  <?php 
          while ($row=$usuario->Fetch_array()) {?>
          <tr>
            <td><?php print $row[id_usuario]?></td>
            <td><?php print $row[usuario]?></td>
            <td><?php print $row[nombre]?></td>
            <td><?php print $row[email]?></td>
            <td><?php print $row[creado]?></td>
            <td><?php print $row[creado_por]?></td>
            <td><?php print date("d-m-Y", strtotime($row[ult_sesion]))?></td>
            <td><a href="usuario_mod.php?id=<?php print $row[id_usuario] ?>"><img src="icons/user_edit.png" width="24" height="24"  alt=""/></a></td>
          </tr>
          <?php } ?>
		</tbody>
    </table>
    </div>
    
    <div style="display:none">
            <div class="fondo_view" id="usuario_add">
                <p align="center"><strong>Registro de Usuario</strong>        </p>
                <form id="form2" name="form2" method="post" action="">
                  <table width="300" border="0" align="center" cellpadding="5" cellspacing="1">
                    <tr>
                      <td bgcolor="#E9EDEF">Usuario</td>
                      <td bgcolor="#E9EDEF"><input name="nombre_usuario" type="text"  id="nombre_usuario" maxlength="20" onchange="this.value = this.value.toUpperCase();" autocomplete="off"/></td>
                    </tr>
                    <tr>
                      <td bgcolor="#E9EDEF">Nombre</td>
                      <td bgcolor="#E9EDEF"><input name="nombre2" type="text" id="nombre2" size="30" maxlength="50" onchange="this.value = this.value.toUpperCase();" autocomplete="off"/></td>
                    </tr>
                    <tr>
                      <td bgcolor="#E9EDEF">Clave</td>
                      <td bgcolor="#E9EDEF"><input name="clave1" type="password" id="clave1" maxlength="15" /><label for="clave1" autocomplete="off"></label></td>
                    </tr>
                    <tr>
                      <td bgcolor="#E9EDEF">Confirmar Clave</td>
                      <td bgcolor="#E9EDEF"><input name="clave2" type="password" id="clave2" maxlength="15" autocomplete="off"/></td>
                    </tr>
                    <tr>
                      <td bgcolor="#E9EDEF">Email</td>
                      <td bgcolor="#E9EDEF"><input name="email2" type="text" id="email2" size="40" maxlength="50" onchange="this.value = this.value.toUpperCase();" /></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center"><p>
                        <input name="agregar" type="submit" class="botones" id="agregar" value="Agregar Usuario" />
                      </p></td>
                    </tr>
                  </table>
                </form>
        </div>
    </div>
	<!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>