<?php
include("classes/bd.php");
include("classes/libros.php");

$libro = new Libros();

if ($_POST[cota] || $_POST[titulo] || $_POST[autor]) {
	$cota = $_POST[cota];
	$titulo = $_POST[titulo];
	$autor = $_POST[autor];
	$where = "1=1";
	if ($cota != "") { $where.=" AND l.cota like '%$cota%'"; }
	if ($titulo != "") { $where.=" AND l.titulo like '%$titulo%'"; }
	if ($autor != "") { $where.=" AND a.nombres like '%$autor%' OR a.apellidos like '%$autor%'"; }
	$libro->Consultar($where);
}
?>
<p>&nbsp;</p>
<table border="1" align="center" cellpadding="5" cellspacing="0" id="libros">
  <thead>
    <tr>
      <th scope="col">Cota</th>
      <th scope="col">Titulo</th>
      <th scope="col">Autor(es)</th>
      <th scope="col">Editorial</th>
      <th scope="col">ISBN</th>
    </tr>
  </thead>
  <tbody>
    <?php 
          while ($row=$libro->Fetch_array()) {?>
    <tr>
      <td><?php print $row[cota]?></td>
      <td><?php print $row[titulo]?></td>
      <td><?php print $row[autor]?></td>
      <td><?php print $row[editorial]?></td>
      <td><?php print $row[isbn]?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
