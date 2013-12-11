<?php 
session_start();
include('classes/bd.php');
include('classes/reportes.php');

if (!isset($_SESSION[usuario])) {
	//  Si no se ha iniciado sesión
	header("Location:sesion.php");
}

$reporte = new Reportes();
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
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css"/>
<link rel="stylesheet" type="text/css" href="css/sgb/jquery-ui-1.10.3.sgb.min.css"/>
<link rel="stylesheet" type="text/css" href="css/colorbox.css"/>
<link rel="stylesheet" type="text/css" href="js/TableTools/media/css/TableTools_JUI.css">
<link rel="stylesheet" type="text/css" href="js/ColReorder/media/css/ColReorder.css">
<script src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script src="js/TableTools/media/js/ZeroClipboard.js"></script>
<script src="js/TableTools/media/js/TableTools.min.js"></script>
<script src="js/ColReorder/media/js/ColReorder.min.js"></script>
<script src="js/highcharts.js"></script>
<script>
$(document).ready( function () {
	$('#miembros').dataTable( {
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": 'R<"H"Tfr>t<"F"ip>',
		"oTableTools": {
			"sSwfPath": "js/TableTools/media/swf/copy_csv_xls_pdf.swf",
			"aButtons": [ "print", "xls", "pdf" ]
        }
	} );
	
	$(".colorbox").colorbox({inline:true, autosize:true});
	
    $('#grafico1').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Miembros Morosos'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Categorias',
            data: [
			<?php 
			$reporte->Graf_Miembros();
			while ($rowg = $reporte->Fetch_array()) {
				print "['".$rowg[estado]."',".$rowg[cant]."],";
			}
			?>
			]
        }]
    });
	
} );
</script>

<!-- InstanceEndEditable -->
</head>
<body bgcolor="#f2f2f2" onload="MM_preloadImages('img/menu_r1_c1_s2.jpg','img/menu_r1_c2_s2.jpg','img/menu_r1_c3_s2.jpg','img/menu_r1_c4_s2.jpg','img/menu_r1_c5_s2.jpg')">
<br />
<div id="header"><?php include("header.php");?></div>
<div id="fondo">
<?php  include("menu.html"); ?><p>&nbsp;</p>
	<!-- InstanceBeginEditable name="content" -->
    <div class="print">
	<h1 align="center">Miembros Activos</h1>
	<p align="center"><a href="#graficos" class="colorbox"><strong>Ver Gráfica</strong></a></p>
	<table border="0" align="center" cellpadding="4" cellspacing="4" id="miembros">
	  <thead>
	    <tr>
	      <th scope="col">Cedula</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Telefono</th>
	      <th scope="col">Email</th>
	      <th scope="col">Tipo</th>
	      <th scope="col">Estado</th>
        </tr>
      </thead>
	  <tbody>
	    <?php 
			$reporte->Rep_Miembros(); 
          while ($row=$reporte->Fetch_array()) {?>
	    <tr>
	      <td><?php print $row[cedula]?></td>
	      <td><?php print $row[nombre]?></td>
	      <td><?php print $row[telf]?></td>
	      <td><?php print $row[email]?></td>
	      <td><?php print $row[tipo]?></td>
	      <td><?php print $row[estado]?>&nbsp;</td>
        </tr>
	    <?php } ?>
      </tbody>
    </table>
    </div>
	<p align="center">&nbsp;</p>
	<div style="display:none">
        <div id="graficos">
            <div id="grafico1"></div>
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