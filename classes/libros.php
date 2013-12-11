<?php 

class Libros extends Base_datos {
	
	function Libros() {
		$this->Conectar();	
	}
	
	function Agregar($cota,$titulo,$editorial,$ciudad,$pais,$edicion,$fec_edic,$resumen,$num_pags,$url,$isbn,$tipo,$categoria) {
			$fecha = date("Y-m-d");
			$sql = "INSERT INTO libros SET
						cota = '$cota',
						titulo = '$titulo',
						editorial = '$editorial',
						ciudad_edit = '$ciudad',
						pais_edit = '$pais',
						edicion = '$edicion',
						fec_edic = '$fec_edic',
						resumen = '$resumen',
						num_pags = $num_pags,
						url = '$url',
						isbn = '$isbn',
						tipo = '$tipo',
						categoria = '$categoria',
						creado = '$fecha',
						creado_por = $_SESSION[id_usuario],
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]";
			$this->Ejecutar($sql);
			$id = $this->Ultimo();
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Inserción',
						nombre_tabla = 'Libros'";
			$this->Ejecutar("$query");
			$this->Cerrar_Conexion();
			return $id;
	}
	
	function Modificar($id_libro,$titulo,$editorial,$ciudad,$pais,$edicion,$fec_edic,$resumen,$num_pags,$url,$isbn,$tipo,$categoria,$rutapdf,$rutaepub) {
			$fecha = date("Y-m-d");
			$sql = "UPDATE libros SET
						titulo = '$titulo',
						editorial = '$editorial',
						ciudad_edit = '$ciudad',
						pais_edit = '$pais',
						edicion = '$edicion',
						fec_edic = '$fec_edic',
						resumen = '$resumen',
						num_pags = $num_pags,
						url = '$url',
						isbn = '$isbn',
						tipo = '$tipo',
						categoria = '$categoria',
						pdf = '$rutapdf',
						epub = '$rutaepub',
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]
					WHERE id_libro = $id_libro";
			$this->Ejecutar($sql);
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Modificación',
						nombre_tabla = 'Libros'";
			$this->Ejecutar("$query");		
			$this->Cerrar_Conexion();
	}
	
	function Eliminar($id) {
		$this->Ejecutar("UPDATE libros SET 
						eliminado = 1,
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]
						WHERE id_libro = $id");
		$fecha = date("Y-m-d");
		$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Eliminación',
						nombre_tabla = 'Libros'";
		$this->Ejecutar("$query");
		$this->Cerrar_Conexion();	
	}
	
	function Todos() {
		$this->Ejecutar("SELECT l.*, GROUP_CONCAT(a.apellidos,' ', a.nombres SEPARATOR '<br/>') as autor 
						FROM libros as l LEFT JOIN autores as a 
						ON l.id_libro = a.id_libro 
						WHERE eliminado = 0
						GROUP BY l.id_libro ORDER BY l.titulo"); 
		$this->Cerrar_Conexion();	
	}
	
	function Buscar($id) {
		$this->Ejecutar("SELECT l.*, (SELECT usuario FROM usuarios WHERE id_usuario = l.creado_por) as creado_por,
									 (SELECT usuario FROM usuarios WHERE id_usuario = l.modificado_por) as modificado_por
						FROM libros as l, usuarios as u 
						WHERE id_libro = $id");
		$this->Cerrar_Conexion();	
	}
	
	function Consultar($where) {
		$sql = "SELECT l.*, GROUP_CONCAT(a.apellidos,' ', a.nombres SEPARATOR '<br/>') as autor 
						FROM libros as l LEFT JOIN autores as a 
						ON l.id_libro = a.id_libro WHERE ".$where." AND l.eliminado = 0 
						GROUP BY l.id_libro ORDER BY l.titulo";
		$this->Ejecutar($sql);
		$this->Cerrar_Conexion();	
	}

}
?>