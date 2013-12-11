<?php

class Ejemplares extends Base_datos {
	
	function Ejemplares() {
		$this->Conectar();	
	}
	
	function Agregar($id_libro,$cota,$nro,$condicion,$prestamo,$estado) {
			$fecha = date("Y-m-d");
			$sql = "INSERT INTO ejemplares SET
						id_libro = '$id_libro',
						cota = '$cota',
						condicion = '$condicion',
						prestamo = '$prestamo',
						estado = '$estado',
						creado = '$fecha',
						creado_por = $_SESSION[id_usuario],
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]";
			$this->Ejecutar($sql);
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Inserción',
						nombre_tabla = 'Ejemplares'";
			$this->Ejecutar("$query");		
			$this->Cerrar_Conexion();

	}
	
	function Modificar($id_ejemplar,$id_libro,$cota,$condicion,$prestamo,$estado) {
			$fecha = date("Y-m-d");
			$sql = "UPDATE ejemplares SET
						id_libro = $id_libro,
						cota = '$cota',
						condicion = '$condicion',
						prestamo = '$prestamo',
						estado = '$estado',
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]
						WHERE id_ejemplar = $id_ejemplar";
			$this->Ejecutar($sql);
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Modificación',
						nombre_tabla = 'Ejemplares'";
			$this->Ejecutar("$query");
			$this->Cerrar_Conexion();
	}
	
	function Eliminar($id_ejemplar,$id_usuario) {
		$fecha = date("Y-m-d");
		$this->Ejecutar("UPDATE ejemplares SET 
						eliminado = 1, 
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]
						WHERE id_ejemplar = $id_ejemplar");
		$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $id_usuario,
						descripcion = 'Eliminacion',
						nombre_tabla = 'Ejemplares'";
		print $query;				
		$this->Ejecutar("$query");
		$this->Cerrar_Conexion();
	}
	
	function Todos() {
		$this->Ejecutar("SELECT e.*, l.titulo
						FROM ejemplares as e, libros as l
						WHERE e.id_libro = l.id_libro AND e.eliminado = 0");
		$this->Cerrar_Conexion();	
	}
	
	function Todostmp() {
		$this->Ejecutar("SELECT e.id_ejemplar as id_e, e.cota, e.condicion, e.prestamo, e.estado, l.titulo , dp.*
						FROM ejemplares as e 
						JOIN libros as l ON e.id_libro = l.id_libro AND e.estado = 'DISPONIBLE'
						LEFT JOIN det_prestamostmp as dp ON e.id_ejemplar = dp.id_ejemplar 
							WHERE dp.id_ejemplar IS NULL
						");
				$this->Cerrar_Conexion();	
	}
	
	function Consultar($where) {
		$this->Ejecutar("SELECT e.*, l.titulo
						FROM ejemplares as e, libros as l
						WHERE e.id_libro = l.id_libro AND ".$where);
		$this->Cerrar_Conexion();	
	}
	
	function Buscar($id_libro) {
		$consulta_e = $this->Ejecutar("SELECT * FROM ejemplares WHERE id_libro = $id_libro");
		$this->Cerrar_Conexion();
		return $consulta_e;	
	}
	
	function Buscar2($id_ejemplar) {
		$consulta_e = $this->Ejecutar("SELECT e.*, l.titulo, l.cota as cota_l, l.edicion, l.editorial, l.isbn,
										(SELECT usuario FROM usuarios WHERE id_usuario = e.creado_por) as creado_por,
										(SELECT usuario FROM usuarios WHERE id_usuario = e.modificado_por) as modificado_por
										FROM ejemplares as e, libros as l, usuarios as u
										WHERE e.id_libro = l.id_libro AND e.id_ejemplar = $id_ejemplar");
		$this->Cerrar_Conexion();
		return $consulta_e;	
	}
	
	function Buscar3($id_prestamo) {
		$sql = "SELECT e.*, l.titulo FROM det_prestamos as dp, ejemplares as e, libros as l
						WHERE dp.id_ejemplar = e.id_ejemplar
						AND e.id_libro = l.id_libro 
						AND dp.id_prestamo = $id_prestamo";	
		$this->Ejecutar($sql);
		$this->Cerrar_Conexion();
	}
	
	function Ejemplartmp_add($id_prestamotmp,$id_ejemplar) {
		$sql = "INSERT INTO det_prestamostmp SET id_det = '', id_prestamotmp = $id_prestamotmp, id_ejemplar = $id_ejemplar";
		$this->Ejecutar($sql);			
	}
	
	function Ejemplartmp_see($id_prestamotmp) {
		$sql = "SELECT dp.*, e.cota, e.prestamo, l.titulo FROM det_prestamostmp as dp, ejemplares as e, libros as l 
				WHERE id_prestamotmp = $id_prestamotmp AND dp.id_ejemplar = e.id_ejemplar AND e.id_libro = l.id_libro";
		$this->Ejecutar($sql);
	}
	
	function Ejemplartmp_eli($id_det) {
		$this->Ejecutar("DELETE FROM det_prestamostmp WHERE id_det = $id_det");
		
	}
	
	function Ejemplartmp_cons($id_prestamotmp) {
		$sql = "SELECT * FROM det_prestamostmp WHERE id_prestamotmp = $id_prestamotmp";
		$this->Ejecutar($sql);
	}

}
?>