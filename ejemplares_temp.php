<?php
include("classes/bd.php");
include("classes/ejemplares.php");
include("classes/prestamos.php");

$ejemplar = new Ejemplares();

// Elimina un ejemplar temporal
if ($_POST[id_det]) {
	$id_det = $_POST[id_det];
	$id_prestamotmp = $_POST[id_prestamotmp];
	$ejemplar->Ejemplartmp_eli($id_det);
	$ejemplar->Ejemplartmp_see($id_prestamotmp);	
}

// Agrega un ejemplar temporal
if ($_POST[id_ejemplar]) {
	$id_prestamotmp = $_POST[id_prestamotmp];
	$id_ejemplar = $_POST[id_ejemplar];
	$ejemplar->Ejemplartmp_add($id_prestamotmp,$id_ejemplar);
	$ejemplar->Ejemplartmp_see($id_prestamotmp);
}
?>
     <table width="100%" align="center" cellpadding="4" cellspacing="0">
        <thead>
            <tr>
         <th bgcolor="#F0F3F7" scope="col">Cota</th>
         <th bgcolor="#F0F3F7" scope="col">Título</th>
         <th bgcolor="#F0F3F7" scope="col">Prestamo</th>
         <th bgcolor="#F0F3F7" scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
       <?php 
            while ($row = $ejemplar->Fetch_array()) {?>
       <tr>
         <td align="center"><input type="hidden" name="id_det<?php print $row[id_det]?>" id="id_det<?php print $row[id_det]?>" value="<?php print $row[id_det]?>"><?php print $row[cota]?>&nbsp;</td>
         <td align="center"><?php print $row[titulo]?>&nbsp;</td>
         <td align="center"><?php print $row[prestamo]?>&nbsp;</td>
         <td align="center"><a href="javascript:Eliminar_det(<?php print $row[id_det]?>)" ><img src="icons/delete.png" width="24" height="24"  alt=""/></a></td>
         </tr>
       <?php } ?>
       </tbody>
     </table>
