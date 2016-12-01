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
		    $bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
			
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
		    $sql = "SELECT NOM_ACC FROM tiene_acc WHERE NOM_CONT='".$this->cnomb."'";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
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
			return 'ERR_CONS_BD';
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
				return 'ERR_CONN_BD'; 	
			}else {
				if ($result->num_rows == 0){
					return 'CONFIRM_EDIT_CONTR';
				}
				else{
					$sql = "DELETE FROM tiene_acc WHERE NOM_CONT='".$this->cnomb."'";
					if (!$result = $mysqli->query($sql)){
						return 'b)ERR_CONN_BD'; 	
					}
					return 'CONFIRM_EDIT_CONTR';
				}
			}		
			}else{
				$sql = "SELECT * FROM tiene_acc WHERE NOM_CONT = '".$this->cnomb."'";
				if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
				}
				if($result->num_rows!=0){
				$sql = "DELETE FROM tiene_acc WHERE NOM_CONT = '".$this->cnomb."'";
					if (!$result = $mysqli->query($sql)){
						return 'ERR_CONN_BD'; 	
					}
				}
				foreach ($marcados as $value) {
					$sql = "INSERT INTO tiene_acc (NOM_ACC,NOM_CONT) VALUES ('";
					$sql = $sql."$value', '$this->cnomb')";
					if (!$result = $mysqli->query($sql)){
						return 'ERR_CONN_BD'; 	
					}
				}
				return 'CONFIRM_EDIT_CONTR';
			}
		}

		function borrar(){
			$mysqli=$this->ConectarBD();
			$sql = "SELECT * FROM controlador WHERE NOM_CONT = '".$this->cnomb."'";
			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			if($result->num_rows!=0){
				$sql = "DELETE FROM controlador WHERE NOM_CONT = '".$this->cnomb."'";
				if (!$result = $mysqli->query($sql)){
					return 'ERR_CONN_BD'; 	
				}
				$sql = "DELETE FROM tiene_acc WHERE NOM_CONT = '".$this->cnomb."'";
				if (!$result = $mysqli->query($sql)){
					return 'ERR_CONN_BD'; 	
				}
				$sql = "DELETE FROM acciones WHERE NOM_CONT = '".$this->cnomb."'";
				if (!$result = $mysqli->query($sql)){
					return 'ERR_CONN_BD'; 	
				}
				return 'CONFIRM_DELETE_CONTR';
			}else{
				return 'NOEXISTS_CONTR';
			}
			
		}



		function insertar(){
		   	$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM controlador WHERE NOM_CONT = '".$this->cnomb."'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					$sql = "INSERT INTO controlador (NOM_CONT) VALUES ('";
					$sql = $sql."$this->cnomb')";	
					$mysqli->query($sql);
					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_CONTR';
				}
			}
		}
	}



	function buscarControlador($busq){
	 		$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
	
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT NOM_CONT FROM controlador WHERE NOM_CONT LIKE '%".$busq."%'"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
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
