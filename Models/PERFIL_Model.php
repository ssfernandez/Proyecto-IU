<?php
	class Perfil{

		public $perfil; 
		

		function __construct($perfil){ 
			$this->perfil = $perfil;  
		}


		function getPerfil(){
			return $this->perfil;
		}

		
		function setPerfil($perfil){
			return $this->perfil=$perfil;
		}


		//funcion ConectarBD: hace una conexión con la base de datos.
		function ConectarBD(){
		    $bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
			
			if ($mysqli->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			return $mysqli;
		}


		
		//funcion Consultar: hace una búsqueda en la tabla usuario con
		//los datos de usuario y contraseña. Si van vacios devuelve todos.
		function Consultar($busq){
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOM_PER from perfil where (NOM_PER LIKE '%".$this->perfil."%')";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
			if ($resultado->num_rows >= 1){
				$toret=array();

				while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_PER']);
		    	}
				return $toret;
			}
			}
		}

		function ConsultarAcciones(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOM_ACC from tiene_acc where (NOM_PER LIKE '".$this->perfil."')";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
		    	if ($resultado->num_rows >= 1){
				$toret=array();

				while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_ACC']);
		    	}
				return $toret;
			}
			}
		}

		function asociacionAccContrl(){
			$acciones=$this->ConsultarAcciones();
		}		

		function ConsultarControladores(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOM_CONT from tiene_contr where (NOM_PER LIKE '".$this->perfil."')";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
		    	if ($resultado->num_rows >= 1){
				$toret=array();

				while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_CONT']);
		    	}
				return $toret;
			}
			}
		}		
		    	

		function listarAcciones($controlador){
			$mysqli=$this->ConectarBD();
			$toret=array();
			$sql="select NOM_ACC from acciones where (NOM_CONT LIKE '".$controlador."')"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return "error";
			}else{
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_ACC']);
		    	}
			}
			return $toret;
		}

		function listarControladores(){
			$mysqli=$this->ConectarBD();
			$toret=array();
			$sql="select NOM_CONT from controlador"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return "error";
			}else{
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_CONT']);
		    	}
			}
			return $toret;
		}


		function buscarControladoresAcciones(){
			$mysqli=$this->ConectarBD();
			$toret=array();
			$sql="SELECT NOM_CONT, NOM_ACC from tiene_acc WHERE NOM_PER = '".$this->perfil."' ORDER BY 1"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return "error";
			}else{
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_CONT']);
		    		array_push($toret, $aux['NOM_ACC']);
		    	}
			}
			return $toret;
		}


		function listarControladoresAcciones(){
			$mysqli=$this->ConectarBD();
			$toret=array();
			$sql="SELECT NOM_CONT, NOM_ACC FROM acciones ORDER BY 1"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return "error";
			}else{
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_CONT']);
		    		array_push($toret, $aux['NOM_ACC']);
		    	}
			}
			return $toret;
		}

		function juntarControladoresAcciones(){
			$mysqli=$this->ConectarBD();
			$toret=array();
			$sql="SELECT NOM_CONT, NOM_ACC FROM tiene_acc WHERE NOM_PER = '".$this->perfil."' ORDER BY 1"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return "error";
			}else{
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		$string=$aux['NOM_CONT']."/".$aux['NOM_ACC'];
		    		array_push($toret, $string);
		    	}
			}
			return $toret;
		}

		function insertar(){
		   	$mysqli=$this->ConectarBD();
		   	$aux=$_SESSION['accionInsert'];
	
	        $sql = "SELECT * FROM perfil WHERE NOM_PER = '".$this->perfil."'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					$sql = "INSERT INTO perfil (NOM_PER) VALUES ('";
					$sql = $sql."$this->perfil')";	
					$mysqli->query($sql);
					
				}
				else{
					
					return 'DATA_EXISTS_PERF';
				}
			}

			
			
			
					$sql = "SELECT * FROM tiene_contr WHERE NOM_PER = '".$this->perfil."'";
				if (!$result = $mysqli->query($sql)){
					return 'ERR_CONN_BD'; 	
				}
				else {
						
					if ($result->num_rows == 0){
						foreach ($aux as $value) {
							$controladores = explode("/",$value);
							
							$repetidos=array();
							if(!in_array($controladores[0],$repetidos)){
								$sql = "INSERT INTO tiene_contr (NOM_PER,NOM_CONT) VALUES ('";
								$sql = $sql."$this->perfil', '$controladores[0]')";	
								$mysqli->query($sql);
								array_push($repetidos, $controladores[0]);
							}
						}
						
						
					}
					else{
						return 'DATA_EXISTS_PERF';
					}
				}

				$sql = "SELECT * FROM tiene_acc WHERE NOM_PER = '".$this->perfil."'";
			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					foreach ($aux as $value) {
						$controladores = explode("/",$value);
						$sql = "INSERT INTO tiene_acc (NOM_PER,NOM_ACC,NOM_CONT) VALUES ('";
						$sql = $sql."$this->perfil', '$controladores[1]', '$controladores[0]')";	
						$mysqli->query($sql);
					}
					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_PERF';
				}
			}
		}

		function protoinsertar(){
				$contr=$this->listarControladoresAcciones();
		    	$_SESSION['contracc'] = $contr;		
		}


		function modificar(){
			$mysqli=$this->ConectarBD();
			$perfA=$_SESSION['perfilAntiguo'];
			$insertar=$_SESSION['accionInsert'];
			$sql= "UPDATE perfil SET NOM_PER ='".$this->perfil."' WHERE NOM_PER='".$perfA."'" ;
				if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
				}else{//Bien la primera sentencia
					$sql= "DELETE FROM tiene_acc WHERE NOM_PER ='".$perfA."'" ;
					if (!($resultado = $mysqli->query($sql))){
					return 'ERR_CONS_BD';
					}else{//bien borrado tabla acc
				    	foreach ($insertar as $value) {
					    	$accionesCambiar = explode("/",$value);
							$sql = "INSERT INTO tiene_acc (NOM_PER,NOM_ACC,NOM_CONT) VALUES ('";
							$sql = $sql."$this->perfil', '$accionesCambiar[1]', '$accionesCambiar[0]')";	
							if (!($resultado = $mysqli->query($sql))){
								return 'ERR_CONS_BD';
							}	
						}//foreach Bien insert acc
						$sql= "DELETE FROM tiene_contr WHERE NOM_PER ='".$perfA."'" ;
						if (!($resultado = $mysqli->query($sql))){
						return 'ERR_CONS_BD';
						}else{//bien borrado tabla contr
							$comprobacion=array();
					    	foreach ($insertar as $value) {
						    	$controladores = explode("/",$value);
						    	if(!in_array($controladores[0], $comprobacion)){
						    		$sql = "INSERT INTO tiene_contr (NOM_PER,NOM_CONT) VALUES ('";
									$sql = $sql."$this->perfil','$controladores[0]')";	
									if (!($resultado = $mysqli->query($sql))){
										return 'ERR_CONS_BD';
									}	
									array_push($comprobacion, $controladores[0]);
						    	}
									
								
							}//foreach Bien insert contr
							return 'CONFIRM_EDIT_PERF';
						}//else tiene_acc prinicpal	
					
			    	
				}//else principal
		}
	}

		function protomodificar(){
			$result1=$this->juntarControladoresAcciones();
			$result2=$this->listarControladoresAcciones();
			if(is_array($result1) && is_array($result2)){
				$_SESSION['datosPerfil']=$result1;
				$_SESSION['datosTotales']=$result2;
				return '';
			}else{
				return "ERR_CONS_BD";
			}
			
		}

		function borrar(){
			$mysqli=$this->conectarBD();
			$sql ='SELECT * FROM perfil WHERE NOM_PER="'.$this->perfil.'"';
  			$result = $mysqli->query($sql);
  			if ($result->num_rows == 1){
        		$sql = "DELETE FROM perfil WHERE NOM_PER='".$this->perfil."'";
        		$mysqli->query($sql);
	    		$sql ='SELECT * FROM tiene_contr WHERE NOM_PER="'.$this->perfil.'"';
	  			$result = $mysqli->query($sql);
	  			if ($result->num_rows >= 1){
	  				$sql = "DELETE FROM tiene_contr WHERE NOM_PER='".$this->perfil."'";
        			$mysqli->query($sql);
        			$sql ='SELECT * FROM tiene_acc WHERE NOM_PER="'.$this->perfil.'"';
		  			$result = $mysqli->query($sql);
		  			if ($result->num_rows >= 1){
		  				$sql = "DELETE FROM tiene_acc WHERE NOM_PER='".$this->perfil."'";
        				$mysqli->query($sql);
        				return "CONFIRM_DELETE_PERF";
		  			}
	  			}else{
	  				return "CONFIRM_DELETE_PERF";
	  			}
    		}else{

        	return "NOEXISTS_PERF";
    		}

		}

		function protoborrar(){
   			$mysqli=$this->ConectarBD();
		    $sql = "SELECT * FROM cuenta where NOMBRE LIKE '".$this->user."'";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}
		    else{
		    	$obj =mysqli_fetch_row($resultado);
		    	$_SESSION['datosUsr']=$obj;
			return "";
			}

		}
		
}

function listarPerfiles($busq){
			$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
	
			if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT NOM_PER FROM perfil WHERE NOM_PER LIKE '%".$busq."%'"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{
				$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_PER']);
		    	}
			}
			return $toret;
		}



?>

