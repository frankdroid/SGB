<?php 

class Miembros extends Base_datos {
	
	function Miembros() {
		$this->Conectar();	
	}
	
	function Agregar($cedula,$nombre,$fec_nac,$nacion,$sexo,$telf,$profesion,$email,$ciudad,$direccion,$tipo,$obs) {
			$fecha = date("Y-m-d");
			$sql = "INSERT INTO miembros SET
						cedula = '$cedula',
						nombre = '$nombre',
						fec_nac = '$fec_nac',
						nacion = '$nacion',
						sexo = '$sexo',
						telf = '$telf',
						profesion = '$profesion',
						email = '$email',
						ciudad = '$ciudad',
						direccion = '$direccion',
						tipo = '$tipo',
						obs = '$obs',
						creado = '$fecha',
						creado_por = $_SESSION[id_usuario],
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]";
			$this->Ejecutar($sql);
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Inserción',
						nombre_tabla = 'Miembros'";
			$this->Ejecutar("$query");
			$this->Cerrar_Conexion();
	}
	
	function Modificar($id_miembro,$nombre,$fec_nac,$nacion,$sexo,$telf,$profesion,$email,$ciudad,$direccion,$tipo,$obs,$estado) {
			$fecha = date("Y-m-d");
			$sql = "UPDATE miembros SET
						nombre = '$nombre',
						fec_nac = '$fec_nac',
						nacion = '$nacion',
						sexo = '$sexo',
						telf = '$telf',
						profesion = '$profesion',
						email = '$email',
						ciudad = '$ciudad',
						direccion = '$direccion',
						tipo = '$tipo',
						obs = '$obs',
						estado = '$estado',
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]
					WHERE id_miembro = $id_miembro";
			$this->Ejecutar($sql);
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Modificación',
						nombre_tabla = 'Miembros'";
			$this->Ejecutar("$query");	
			$this->Cerrar_Conexion();
	}
	
	function Eliminar($id_miembro) {
		$fecha = date("Y-m-d");
		$this->Ejecutar("UPDATE miembros SET 
						eliminado = 1,
						modificado = '$fecha',
						modificado_por = '$_SESSION[id_usuario]'
						WHERE id_miembro = $id_miembro");
		$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = '$_SESSION[id_usuario]',
						descripcion = 'Eliminación',
						nombre_tabla = 'Miembros'";
		$this->Ejecutar("$query");
		$this->Cerrar_Conexion();
	}
	
	function Todos() {
		$this->Ejecutar("SELECT * FROM miembros WHERE eliminado = 0 ORDER BY id_miembro");
		$this->Cerrar_Conexion();	
	}
	
	function Solventes() {
		$this->Ejecutar("SELECT * FROM miembros WHERE estado = 'SOLVENTE' AND deudor = 'NO' AND eliminado = 0 
						ORDER BY nombre");
		$this->Cerrar_Conexion();	
	}
	
	function Buscar($id) {
		$this->Ejecutar("SELECT m.*,(SELECT usuario FROM usuarios WHERE id_usuario = m.creado_por) as creado_por,
									(SELECT usuario FROM usuarios WHERE id_usuario = m.modificado_por) as modificado_por 
									FROM miembros as m, usuarios as u
									WHERE id_miembro = $id");
		$this->Cerrar_Conexion();	
	}
	
	function Consultar($where) {
		$this->Ejecutar("SELECT * FROM miembros WHERE ".$where);
		$this->Cerrar_Conexion();	
	}	
	
}
?>