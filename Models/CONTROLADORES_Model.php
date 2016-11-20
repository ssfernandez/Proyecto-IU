<?php

	/**
	* 
	*/
	class Controlador
	{
		public $cnomb;
		
		function __construct($cnomb){
			$this->cnomb=$cnomb;
		}

		function ConectarBD(){
		    $mysqli = new mysqli("localhost", "root", "iu", "iu");
			
			if ($mysqli->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			return $mysqli;
		}

		function getNombre(){
			return $cnomb;
		}


		function sacarAcciones(){
			$mysqli=$this->ConectarBD();
		    $sql = "SELECT NOM_ACC FROM acciones WHERE NOM_CONT='".$this->cnomb."'";
		    if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    else{
		    	$toret=array();
		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_ACC']);
		    	}
				return $toret;
			}
		}

		function protomodificar(){
			$mysqli=$this->ConectarBD();
		    $sql = "SELECT NOM_ACC FROM tiene_acc";
		      if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
			 else{
		    	$toret=array();
		    	while($aux = mysqli_fetch_row($resultado)){
		    		if(!in_array($aux[0], $toret)){
		    		array_push($toret, $aux[0]);
		    	}
		    	}
		    	$_SESSION['acciones']=$toret;
				return "";
			}
		}

		function modificar(){
			$mysqli=$this->ConectarBD();
			$marcados=$_SESSION['marcados'];
			if($marcados==""){
			$sql = "SELECT * FROM tiene_acc WHERE NOM_CONT = '".$this->cnomb."'";
			if (!$result = $mysqli->query($sql)){
				return 'a)No se ha podido conectar con la base de datos'; 	
			}
			else {
				if ($result->num_rows == 0){
					return 'Modificacion realizada con exito';
				}
				else{
					$sql = "DELETE FROM tiene_acc WHERE NOM_CONT='".$this->cnomb."'";
					if (!$result = $mysqli->query($sql)){
						return 'b)No se ha podido conectar con la base de datos'; 	
					}
					return 'Modificacion realizada con exito';
				}
			}		
			}else{
				$sql = "SELECT * FROM tiene_acc WHERE NOM_CONT = '".$this->cnomb."'";
				if (!$result = $mysqli->query($sql)){
				return 'e)No se ha podido conectar con la base de datos'; 	
				}
				if($result->num_rows!=0){
				$sql = "DELETE FROM tiene_acc WHERE NOM_CONT = '".$this->cnomb."'";
					if (!$result = $mysqli->query($sql)){
						return 'c)No se ha podido conectar con la base de datos'; 	
					}
				}
				foreach ($marcados as $value) {
					$sql = "INSERT INTO tiene_acc (NOM_ACC,NOM_CONT) VALUES ('";
					$sql = $sql."$value', '$this->cnomb')";
					if (!$result = $mysqli->query($sql)){
						return 'd)No se ha podido conectar con la base de datos'; 	
					}
				}
				return 'La modificacion se ha realizado con exito';
			}
		}

		function borrar(){
			$mysqli=$this->ConectarBD();
			$sql = "DELETE FROM controlador WHERE NOM_CONT = '".$this->cnomb."'";
			if (!$result = $mysqli->query($sql)){
				return 'No se ha podido conectar con la base de datos'; 	
			}
			$sql = "DELETE FROM tiene_acc WHERE NOM_CONT = '".$this->cnomb."'";
			if (!$result = $mysqli->query($sql)){
				return 'No se ha podido conectar con la base de datos'; 	
			}
			$sql = "DELETE FROM acciones WHERE NOM_CONT = '".$this->cnomb."'";
			if (!$result = $mysqli->query($sql)){
				return 'No se ha podido conectar con la base de datos'; 	
			}
			return 'El controlador se ha borrado correctamente';
		}



		function insertar(){
		   	$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM controlador WHERE NOM_CONT = '".$this->cnomb."'";

			if (!$result = $mysqli->query($sql)){
				return 'No se ha podido conectar con la base de datos'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					$sql = "INSERT INTO controlador (NOM_CONT) VALUES ('";
					$sql = $sql."$this->cnomb')";	
					$mysqli->query($sql);
					return 'Inserción realizada con éxito';
				}
				else{
					return 'El controlador ya existe en la base de datos';
				}
			}
		}
	}



	function buscarControlador($busq){
	 		$mysqli = new mysqli("localhost", "root", "iu", "iu");
	
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT NOM_CONT FROM controlador WHERE NOM_CONT LIKE '%".$busq."%'"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{
		    	
		    	$aux= array();
		    	while($aux = mysqli_fetch_row($resultado)){
		    		array_push($toret, $aux[0]);
		    	}
			}
			return $toret;
		}
