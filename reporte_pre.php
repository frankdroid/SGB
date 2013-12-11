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
	$('#prestamos').dataTable( {
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
            text: 'Préstamos por Tipo de Miembro'
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
			$reporte->Graf_Prestamos1();
			while ($rowg = $reporte->Fetch_array()) {
				print "['".$rowg[tipo]."',".$rowg[cant]."],";
			}
			?>
			]
        }]
    });
	
	$('#grafico2').highcharts({
        chart: {
                type: 'column'
            },
            title: {
                text: 'Prestamos Mensuales'
            },
            xAxis: {
                categories: [
                    'Ene',
                    'Feb',
                    'Mar',
                    'Abr',
                    'May',
                    'Jun',
                    'Jul',
                    'Ago',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dic'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Préstamos',
                data: [
				<?php 
				$reporte->Graf_Prestamos2();
				while ($rowg = $reporte->Fetch_array()) {
					print $rowg[ene].",".$rowg[feb].",".$rowg[mar].",".$rowg[abr].",".$rowg[may].",".$rowg[jun].",".$rowg[jul].",".$rowg[ago].",".$rowg[sep].",".$rowg[oct].",".$rowg[nov].",".$rowg[dic];
				}
				?>]
    
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
	<h1 align="center">Listado de Préstamos</h1>
	<p align="center"><a href="#grafico1" class="colorbox"><strong>Ver Gráfica</strong></a> <a href="#grafico2" class="colorbox"><strong>Estadisticas</strong></a></p>
	<table border="0" align="center" cellpadding="4" cellspacing="4" id="prestamos">
	  <thead>
	    <tr>
	      <th scope="col">Cedula</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Fecha</th>
	      <th scope="col">Vence</th>
	      <th scope="col">Estado</th>
        </tr>
      </thead>
	  <tbody>
	    <?php 
		$reporte->Rep_Prestamos();
          while ($row=$reporte->Fetch_array()) {?>
	    <tr>
	      <td><?php print $row[cedula]?></td>
	      <td><?php print $row[nombre]?></td>
	      <td><?php print date("d-m-Y", strtotime($row[creado])) ?></td>
	      <td><?php print date("d-m-Y", strtotime($row[fec_dev])) ?></td>
	      <td><?php print $row[estado]?></td>
        </tr>
	    <?php } ?>
      </tbody>
    </table>
	<p align="center">&nbsp;</p>
    <div style="display:none">
            <div id="grafico1"></div>
      <div id="grafico2"></div>
    </div>
	<!-- InstanceEndEditable -->
  <p>&nbsp;</p>
</div>
<div id="footer">&nbsp;</div>
<p align="center">
 IUTOMS - Este sistema es software libre publicado bajo la licencia <a href="http://localhost/sisbiblio/GPLes.htm">GNU/GPL</a></p>
</body>
<!-- InstanceEnd --></html>