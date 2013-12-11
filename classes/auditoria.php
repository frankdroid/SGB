<?php

class Auditoria extends Base_datos {
	
	function Auditoria() {
		$this->Conectar();	
	}
	
	function Todos() {
		$this->Ejecutar("SELECT a.*, u.nombre FROM auditoria as a, usuarios as u 
						WHERE a.id_usuario = u.id_usuario 
						ORDER BY id_log DESC");
		$this->Cerrar_Conexion();	
	}

}
?>