<?php

class Prestamos extends Base_datos {
	
	function Prestamos() {
		$this->Conectar();	
	}
	
	function Agregar($id_miembro,$creado,$fec_dev,$id_prestamotmp) {
			$fecha = date("Y-m-d");
			$sql = "INSERT INTO prestamos SET
						id_miembro = $id_miembro,
						creado = '$creado',
						fec_dev = '$fec_dev',
						creado_por = $_SESSION[id_usuario],
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]";		
			$this->Ejecutar($sql);
			$id = $this->Ultimo();
			$this->Ejecutar("UPDATE miembros SET deudor = 'SI' WHERE id_miembro = $id_miembro");
			$this->Ejecutar("SELECT * FROM det_prestamostmp WHERE id_prestamotmp = $id_prestamotmp");
			while ($row = $this->Fetch_array()) {
				$sql = "INSERT INTO det_prestamos SET 
						id_prestamo = $id,
						id_ejemplar = $row[id_ejemplar]";
				mysql_query($sql);	
				$sql = "UPDATE ejemplares SET
						estado = 'OCUPADO'
						WHERE id_ejemplar = $row[id_ejemplar]";
				mysql_query($sql);
			}
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Inserción',
						nombre_tabla = 'Prestamos'";
			$this->Ejecutar("$query");
			$this->Cerrar_Conexion();
			return $id;
	}
	
	function Modificar($id_prestamo,$id_miembro,$creado,$fec_dev) {
			$fecha = date("Y-m-d");
			$sql = "UPDATE prestamos SET
						id_miembro = '$id_miembro',
						creado = '$creado',
						fec_dev = '$fec_dev',
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]
					WHERE id_prestamo = $id_prestamo";
			$this->Ejecutar($sql);
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Modificación',
						nombre_tabla = 'Prestamos'";
			$this->Ejecutar("$query");
			$this->Cerrar_Conexion();
	}
	
	function Eliminar($id_prestamo) {
		$fecha = date("Y-m-d");
		$this->Ejecutar("UPDATE prestamos SET 
						eliminado = 1,
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]
						WHERE id_prestamo = $id_prestamo");
		$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Eliminación',
						nombre_tabla = 'Prestamos'";
		$this->Ejecutar("$query");
		$this->Cerrar_Conexion();
	}
	
	function Todos() {
		$this->Ejecutar("SELECT p.*, m.nombre, m.cedula
						FROM prestamos as p, miembros as m 
						WHERE p.id_miembro = m.id_miembro AND p.eliminado = 0
						ORDER BY p.id_prestamo DESC");
		$this->Cerrar_Conexion();	
	}
	
	function Consultar($where) {
		$sql="SELECT p.*, m.nombre, m.cedula
						FROM prestamos as p, miembros as m 
						WHERE p.id_miembro = m.id_miembro AND ".$where."
						ORDER BY p.id_prestamo";
		$this->Ejecutar($sql);
		$this->Cerrar_Conexion();	
	}
	
	function Buscar($id) {
		$this->Ejecutar("SELECT p.*, m.nombre, m.cedula, m.tipo,
									(SELECT usuario FROM usuarios WHERE id_usuario = p.creado_por) as creado_por,
									(SELECT usuario FROM usuarios WHERE id_usuario = p.modificado_por) as modificado_por
						FROM prestamos as p, miembros as m, usuarios as u
						WHERE p.id_miembro = m.id_miembro 
							AND p.id_prestamo = $id");
		$this->Cerrar_Conexion();	
	}
		
	function Devolver($id_prestamo) {
		$sql = "UPDATE prestamos SET estado = 'CERRADO' WHERE id_prestamo = $id_prestamo";
		$this->Ejecutar($sql);
		$sql =  "UPDATE ejemplares as e
  				JOIN det_prestamos as dp
  				ON e.id_ejemplar = dp.id_ejemplar AND dp.id_prestamo = $id_prestamo
  				set e.estado = 'DISPONIBLE'";
		$this->Ejecutar($sql);
		$sql = "UPDATE miembros as m 
  				JOIN prestamos as p
  				ON m.id_miembro = p.id_miembro AND p.id_prestamo = $id_prestamo
  				SET m.estado = 'SOLVENTE', m.deudor = 'NO'";
		$this->Ejecutar($sql);
		$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Devolución',
						nombre_tabla = 'Prestamos'";
		$this->Ejecutar("$query");
		$this->Cerrar_Conexion();	
	}
	
	function Nuevotmp() {
		$hoy = date("Y-m-d");
		$this->Ejecutar("INSERT INTO prestamostmp SET id_prestamotmp = '', fecha = '$hoy'");
		$id = $this->Ultimo();
		$this->Cerrar_Conexion();
		return $id;
	}
	
	function Limpiartmp(){
		$this->Ejecutar("DELETE FROM det_prestamostmp");	
	}
	
	function Ver_ejemplar($id_prestamo) {
		$this->Ejecutar("SELECT * FROM det_prestamos WHERE id_prestamo = $id_prestamo");
		while ($row = $this->Fetch_array()) {
				$sql = "INSERT INTO det_prestamostmp SET 
						id_prestamotmp = $id_prestamo,
						id_ejemplar = $row[id_ejemplar]";
				mysql_query($sql);	
		}
	}

}
?>