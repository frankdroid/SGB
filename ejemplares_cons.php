<?php
include("classes/bd.php");
include("classes/ejemplares.php");

$ejemplar = new Ejemplares();
$ejemplar->Todostmp();
?>
<script>
$(document).ready(function() {		
	$('#tb_ejemplares').dataTable({ 
		"bJQueryUI": true,
        "sPaginationType": "full_numbers"
	});
});
</script>

     <table align="center" cellpadding="4" cellspacing="0" id="tb_ejemplares">
        <thead>
            <tr>
         <th scope="col">Cota</th>
         <th scope="col">Título</th>
         <th scope="col">Condición</th>
         <th scope="col">Prestamo</th>
         <th scope="col">Estado</th>
         <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
       <?php 
            while ($rowe = $ejemplar->Fetch_array()) {?>
       <tr>
         <td><?php print $rowe[cota]?>&nbsp;</td>
         <td><?php print $rowe[titulo]?>&nbsp;</td>
         <td><?php print $rowe[condicion]?>&nbsp;</td>
         <td><?php print $rowe[prestamo]?>&nbsp;</td>
         <td><?php print $rowe[estado]?>&nbsp;</td>
         <td><a href="javascript:SeleccionarE('<?php print $rowe[cota]?>','<?php print $rowe[titulo]?>','<?php print $rowe[id_e]?>')"><img src="icons/page_accept.png" width="24" height="24" /></a></td>
         </tr>
       <?php } ?>
       </tbody>
     </table>

