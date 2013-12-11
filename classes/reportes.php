<?php

class Reportes extends Base_datos {
	
	function Reportes() {
		$this->Conectar();	
	}
	
	function Rep_Libros() {
		$sql = "SELECT l.*, GROUP_CONCAT(a.apellidos,' ', a.nombres SEPARATOR '<br/>') as autor
				FROM libros as l LEFT JOIN autores as a 
				ON l.id_libro = a.id_libro 
				WHERE eliminado = 0
				GROUP BY l.id_libro ORDER BY l.titulo";
		$this->Ejecutar($sql); 
	}
	
	function Cant_eje($id_libro) {
		$consul = mysql_query("SELECT COUNT(id_ejemplar) as cant FROM ejemplares WHERE id_libro = $id_libro");
		$row = mysql_fetch_array($consul);
		return $row[cant];		 	
	}
	
	function Graf_Libros() {
		$this->Ejecutar("SELECT tipo, COUNT(tipo) as cant FROM libros WHERE eliminado = 0 GROUP BY tipo");	
	}
	
	function Rep_Miembros() {
		$this->Ejecutar("SELECT * FROM miembros WHERE eliminado = 0");
	}
	
	function Graf_Miembros() {
		$this->Ejecutar("SELECT estado, COUNT(estado) as cant FROM miembros WHERE eliminado = 0 GROUP BY estado");	
	}
	
	function Rep_Prestamos() {
		$sql = "SELECT p.*, m.nombre, m.cedula
				FROM prestamos as p, miembros as m 
				WHERE p.id_miembro = m.id_miembro
				ORDER BY p.id_prestamo";
		$this->Ejecutar($sql); 
	}
	
	function Graf_Prestamos1() {
		$sql = "SELECT m.tipo, COUNT(tipo) as cant 
				FROM prestamos as p, miembros as m
				WHERE p.id_miembro = m.id_miembro
				GROUP BY tipo";	
		$this->Ejecutar($sql);
	}
	
	function Graf_Prestamos2() {
		$sql = "DELETE FROM tmprep_anual";
		$this->Ejecutar($sql);
		$sql = "INSERT INTO tmprep_anual
	
	SELECT COUNT(*) as ene,0 as feb,0 as mar,0 as abr,0 as may,0 as jun,0 as jul,0 as ago,0 as sep,0 as oct,0 as nov,0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 01 AND YEAR(creado) = YEAR(NOW())
	
	UNION
	
	SELECT 0 as ene, COUNT(*) as feb, 0 as mar, 0 as abr, 0 as may, 0 as jun, 0 as jul, 0 as ago, 0 as sep, 0 as oct, 0 as nov, 0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 02 AND YEAR(creado) = YEAR(NOW())
	
	UNION
	
	SELECT 0 as ene, 0 as feb, COUNT(*) as mar, 0 as abr, 0 as may, 0 as jun, 0 as jul, 0 as ago, 0 as sep, 0 as oct, 0 as nov, 0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 03 AND YEAR(creado) = YEAR(NOW())
	
	UNION
	
	SELECT 0 as ene, 0 as feb, 0 as mar, COUNT(*) as abr, 0 as may, 0 as jun, 0 as jul, 0 as ago, 0 as sep, 0 as oct, 0 as nov, 0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 04 AND YEAR(creado) = YEAR(NOW())
	
	UNION
	
	SELECT 0 as ene, 0 as feb, 0 as mar, 0 as abr, COUNT(*) as may, 0 as jun, 0 as jul, 0 as ago, 0 as sep, 0 as oct, 0 as nov, 0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 05 AND YEAR(creado) = YEAR(NOW())
	
	UNION
	
	SELECT 0 as ene, 0 as feb, 0 as mar, 0 as abr, 0 as may, COUNT(*) as jun, 0 as jul, 0 as ago, 0 as sep, 0 as oct, 0 as nov, 0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 06 AND YEAR(creado) = YEAR(NOW())
	
	UNION 
	
	SELECT 0 as ene, 0 as feb, 0 as mar, 0 as abr, 0 as may, 0 as jun, COUNT(*) as jul, 0 as ago, 0 as sep, 0 as oct, 0 as nov, 0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 07 AND YEAR(creado) = YEAR(NOW())
	
	UNION
	
	SELECT 0 as ene, 0 as feb, 0 as mar, 0 as abr, 0 as may, 0 as jun, 0 as jul, COUNT(*) as ago, 0 as sep, 0 as oct, 0 as nov, 0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 08 AND YEAR(creado) = YEAR(NOW())
	
	UNION
	
	SELECT 0 as ene, 0 as feb, 0 as mar, 0 as abr, 0 as may, 0 as jun, 0 as jul, 0 as ago, COUNT(*) as sep, 0 as oct, 0 as nov, 0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 09 AND YEAR(creado) = YEAR(NOW())
	
	UNION
	
	SELECT 0 as ene, 0 as feb, 0 as mar, 0 as abr, 0 as may, 0 as jun, 0 as jul, 0 as ago, 0 as sep, COUNT(*) as oct, 0 as nov, 0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 10 AND YEAR(creado) = YEAR(NOW())
	
	UNION
	
	SELECT 0 as ene, 0 as feb, 0 as mar, 0 as abr, 0 as may, 0 as jun, 0 as jul, 0 as ago, 0 as sep, 0 as oct, COUNT(*) as nov, 0 as dic
	FROM  `prestamos` WHERE MONTH( creado ) = 11 AND YEAR(creado) = YEAR(NOW())
	
	UNION
	
	SELECT 0 as ene, 0 as feb, 0 as mar, 0 as abr, 0 as may, 0 as jun, 0 as jul, 0 as ago, 0 as sep, 0 as oct, 0 as nov, COUNT(*) as dic
	FROM  `prestamos` WHERE MONTH(creado) = 12 AND YEAR(creado) = YEAR(NOW())";
	$this->Ejecutar($sql);
	$sql = "SELECT SUM(ene) as ene,SUM(feb) as feb,SUM(mar) as mar,SUM(abr) as abr,SUM(may) as may,SUM(jun) as jun, SUM(jul) as jul,SUM(ago) as ago,SUM(sep) as sep ,SUM(oct) as oct,SUM(nov) as nov, SUM(dic) as dic
	FROM tmprep_anual";
	$this->Ejecutar($sql);
	}
	
	function Rep_Ejemplares() {
		$sql = "SELECT e.*, l.titulo
				FROM ejemplares as e, libros as l
				WHERE e.id_libro = l.id_libro AND e.eliminado = 0";
		$this->Ejecutar($sql); 
	}
	
	function Graf_Ejemplar1(){
		$sql= "SELECT condicion, COUNT(condicion) as cant FROM ejemplares GROUP BY condicion";
		$this->Ejecutar($sql);	
	}
	
	function Graf_Ejemplar2(){
		$sql= "SELECT estado, COUNT(estado) as cant FROM ejemplares GROUP BY estado";
		$this->Ejecutar($sql);	
	}
	
}
?>