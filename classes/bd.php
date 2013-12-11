<?php 
class Base_datos {
	
	var $consulta;
	var $enlace;
	var $resultado;
	var $servidor = "localhost";
	var $user = "root";
	var $password = "3226";
	var $bd = "sgb";
	
	function Base_datos() {
		$this->Conectar();	
	}
	
	function Conectar($enlace=NULL) {
		$this->enlace = mysql_connect($this->servidor,$this->user,$this->password);
		mysql_query("SET NAMES 'utf8' "); 
		mysql_select_db($this->bd,$this->enlace);
	}
	
	function Ejecutar($query) {
		$this->consulta = mysql_query($query,$this->enlace) or print("MySQL produjo un error: ".mysql_error());
		return $this->consulta;
	}
	
	function Ultimo() {
		return mysql_insert_id();	
	}
	
	function Num_rows() {
		$this->total = mysql_num_rows($this->consulta);
		return $this->total;	
	}
	
	function Num_affec() {
		$this->total=mysql_affected_rows($this->consulta);
		return $this->total;
	}
	
	function Fetch_array() {
		if($this->consulta) {
			$this->resultado = mysql_fetch_array($this->consulta);
			
		} 
		return $this->resultado;
	}
		
	public function Limpia_Consul() {
		mysql_free_result($this->consulta);
	}
		
	public function Cerrar_Conexion() {
		mysql_close($this->enlace);
	}
	
	public function Error() {
		return $this->e_rror = mysql_error();	
	}
	
	function Backup($tables = '*') {
		   
		  $this->Conectar();
		  $tables = array();
		  $result = mysql_query('SHOW TABLES');
		  while($row = mysql_fetch_row($result))
		  {
			 $tables[] = $row[0];
		  }
		   
		   foreach($tables as $table)
		   {
			  $result = mysql_query('SELECT * FROM '.$table);
			  $num_fields = mysql_num_fields($result);
			  
			  $return.= 'DROP TABLE '.$table.';';
			  $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			  $return.= "\n\n".$row2[1].";\n\n";
			  
			for ($i = 0; $i < $num_fields; $i++)
			  {
				 while($row = mysql_fetch_row($result))
				 {
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++) 
					{
					   $row[$j] = addslashes($row[$j]);
					   $row[$j] = ereg_replace("\n","\\n",$row[$j]);
					   if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					   if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				 }
			  }
			  $return.="\n\n\n";
		   }
		   
		   //guardar archivo
		   $nombre_archivo = 'backup/db-backup-'.date("d-m-Y")."-".date("h-i-s").'.sql';
		   $handle = fopen($nombre_archivo,'w+');
		   fwrite($handle,$return);
		   $fecha = date("Y-m-d");
		   $this->Ejecutar("INSERT INTO respaldos SET
		   					id = '',
		   					id_usuario = $_SESSION[id_usuario],
							creado = '$fecha',
							ruta = '$nombre_archivo'");
			$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Respaldo',
						nombre_tabla = 'Base de Datos'";
			$this->Ejecutar("$query");
			$this->Cerrar_Conexion();
		   fclose($handle);
	}
	
	function Ver_mantto() {
		$this->Ejecutar("SELECT r.*, u.nombre, u.usuario FROM respaldos as r, usuarios as u WHERE r.id_usuario = u.id_usuario");
		$this->Cerrar_Conexion();
	}
	
	function Optimizar() {
		$this->Ejecutar("OPTIMIZE TABLE  `auditoria` ,
						`autores` ,
						`categorias` ,
						`det_prestamos` ,
						`det_prestamostmp` ,
						`ejemplares` ,
						`libros` ,
						`miembros` ,
						`prestamos` ,
						`prestamostmp` ,
						`respaldos` ,
						`tmprep_anual` ,
						`usuarios`");
		$query = "INSERT INTO auditoria SET
						modificado = DATE( NOW( ) ),
						id_usuario = $_SESSION[id_usuario],
						descripcion = 'Optimización',
						nombre_tabla = 'Base de Datos'";
		$this->Ejecutar("$query");
		$this->Cerrar_Conexion();
	}
		
} // endClass Base_datos