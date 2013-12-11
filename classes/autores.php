<?php

class Autores extends Base_datos {
	
	function Autores() {
		$this->Conectar();	
	}
	
	function Agregar($id_libro,$nombres,$apellidos,$tipo_autor) {
			$sql = "INSERT INTO autores SET
						id_libro = '$id_libro',
						nombres = '$nombres',
						apellidos = '$apellidos',
						tipoautor = '$tipo_autor'";
			$this->Ejecutar($sql);
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Inserción',
						nombre_tabla = 'Autores'";
			$this->Ejecutar("$query");
			$this->Cerrar_Conexion();
	}
	
	function Eliminar($id_autor) {
			$sql = "DELETE FROM autores WHERE id_autor = $id_autor";
			$this->Ejecutar($sql);
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Eliminación',
						nombre_tabla = 'Autores'";
			$this->Ejecutar("$query");
			$this->Cerrar_Conexion();
	}
	
	function Todos() {
		$this->Ejecutar("SELECT * FROM autores ORDER BY apellidos ");
		$this->Cerrar_Conexion();	
	}
	
	function Consultar($id) {
		$consulta_a = $this->Ejecutar("SELECT * FROM autores WHERE id_libro = $id");
		$this->Cerrar_Conexion();
		return $consulta_a;
	}

}
?>