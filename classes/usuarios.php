<?php 

class Usuarios extends Base_datos {
	
	function Usuarios() {
		$this->Conectar();	
	}
	
	function Inicia_sesion($usuario,$clave) {
		$query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave = sha1('$clave')";
		$this->Ejecutar($query);
		$this->Num_rows();
		if ($this->total > 0 ){
			// Si el usuario esta registrado se inicia sesión
			$row = $this->Fetch_array(); 
			$_SESSION[id_usuario] = $row[id_usuario];
			$_SESSION[usuario]=$row[usuario];
			$_SESSION[nombre_user]=$row[nombre];
			$fecha = date("Y-m-d");
			$this->Ejecutar("UPDATE usuarios SET ult_sesion = '$fecha' WHERE id_usuario = $_SESSION[id_usuario]");
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Inicio de sesion',
						nombre_tabla = 'Usuarios'";
			$this->Ejecutar("$query");
		} 
		$this->Cerrar_Conexion();
	}
	
	function Agregar($nombre_usuario,$nombre,$clave,$email) {
		$this->Ejecutar("SELECT * FROM usuarios WHERE usuario = '$nombre_usuario'");
		$this->Num_rows();
		if ($this->total > 0 ) {
			$msj="El usuario ya existe, no se puede agregar";
		} else {
			$fecha = date("Y-m-d");
			$this->Ejecutar("INSERT INTO usuarios SET
						usuario = '$nombre_usuario',
						nombre = '$nombre',
						clave = SHA1('$clave'),
						email = '$email',
						creado = '$fecha',
						creado_por = $_SESSION[id_usuario],
						modificado = '$fecha',
						modificado_por = $_SESSION[id_usuario]");
			$msj="El usuario ha sido agregado satisfactoriamente";
		}
		$this->Cerrar_Conexion();
		return $msj;		
	}
	
	function Modificar($id_usuario,$nombre_usuario,$nombre,$clave,$email) {
		$fecha = date("Y-m-d");
		$this->Ejecutar("UPDATE usuarios SET
							usuario = '$nombre_usuario',
							nombre = '$nombre',
							clave = SHA1('$clave'),
							email = '$email',
							modificado = '$fecha',
							modificado_por = $_SESSION[id_usuario]
							WHERE id_usuario = $id_usuario");
		$this->Cerrar_Conexion();
	}
	
	function Cierra_sesion($id_usuario) {
		$this->Ejecutar("SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'");
		$row = $this->Fetch_array();
  		unset($_SESSION[usuario]);
  		session_destroy(); // se elimina la sesión
		$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $row[id_usuario],
						descripcion = 'Cierre de sesion',
						nombre_tabla = 'Usuarios'";
		$this->Ejecutar("$query");
	}
	
	function Todos() {
		$this->Ejecutar("SELECT * FROM usuarios ORDER BY id_usuario");
		$this->Cerrar_Conexion();	
	}
	
	function Consultar($where) {
		$this->Ejecutar("SELECT * FROM usuarios WHERE ".$where);
		$this->Cerrar_Conexion();	
	}
	
	function Buscar($id_usuario) {
		$this->Ejecutar("SELECT * FROM usuarios WHERE id_usuario = $id_usuario");
		$this->Cerrar_Conexion();	
	}
	
} //endClass Usuarios