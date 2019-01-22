<?php
	class connectBD{
		var $user;
		var $server;
		var $password;
		var $BDname;

		function connectBD($user='dbo323615123',$servidor='db275.1and1.es',$pass='Pr0bl3m0n*+',$nombreBD='db323615123'){
			$this->user = $user;
			$this->server = $servidor;
			$this->password = $pass;
			$this->BDname = $nombreBD;
		}
		
		function conexion(){			
			return $conexion = new mysqli($this->server,$this->user,$this->password,$this->BDname);
		}
		
		function cerrarConexion($conexion){
			$conexion->close();			
		}
		
		function consultar($consulta,$conexion){		
			return $resultado = $conexion->query($consulta);
		}
		
		function cerrarconsulta($resultado){		
			return $resultado->free;
		}
		
		function avanzar($resultado){
			return $resultado->fetch_array();
		}

		function filasAfectadas($conexion){
			return $conexion->affected_rows;
		}
		
		function filasDevueltas($resultado){
			return $resultado->num_rows;
		}				
	}
?>