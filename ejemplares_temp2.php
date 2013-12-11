<?php
include("classes/bd.php");
include("classes/ejemplares.php");
include("classes/prestamos.php");

$ejemplar = new Ejemplares();

if ($_POST[id_det]) {
	$id_det = $_POST[id_det];
	$id_prestamo = $_POST[id_prestamo];
	$ejemplar->Ejemplartmp_eli($id_det);
	$ejemplar->Ejemplartmp_see($id_prestamo);	
}

if ($_POST[id_ejemplar]) {
	$id_prestamo = $_POST[id_prestamo];
	$id_ejemplar = $_POST[id_ejemplar];
	$ejemplar->Ejemplartmp_add($id_prestamo,$id_ejemplar);
	$ejemplar->Ejemplartmp_see($id_prestamo);
} else {
	$id_prestamo = $_POST[id_prestamo];
	$ejemplar->Ejemplartmp_see($id_prestamo);
}
?>
     <table width="100%" align="center" cellpadding="4" cellspacing="0">
        <thead>
            <tr>
         <th bgcolor="#F0F3F7" scope="col">Cota</th>
         <th bgcolor="#F0F3F7" scope="col">Título</th>
         <th bgcolor="#F0F3F7" scope="col">Prestamo</th>
         </tr>
        </thead>
        <tbody>
       <?php 
            while ($row = $ejemplar->Fetch_array()) {?>
       <tr>
         <td align="center"><input type="hidden" name="id_det<?php print $row[id_det]?>" id="id_det<?php print $row[id_det]?>" value="<?php print $row[id_det]?>"><?php print $row[cota]?>&nbsp;</td>
         <td align="center"><?php print $row[titulo]?>&nbsp;</td>
         <td align="center"><?php print $row[prestamo]?>&nbsp;</td>
         </tr>
       <?php } ?>
       </tbody>
     </table>
