<?php
	class Categoria{

		public $categ;
		

		function __construct($categ){
		    $this->categ = $categ;
		}


		function getCateg(){
			return $this->categ;
		}	

		function setCateg($categ){
			return $this->categ=$categ;
		}


		//categorias
		function ConectarBD(){
		    $bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
			
			if ($mysqli->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			return $mysqli;
		}

		//Categoria
		function insertar(){
		   	$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM categoria WHERE NOMBRE_CAT = '".$this->categ."'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					$sql = "INSERT INTO categoria (NOMBRE_CAT) VALUES ('";
					$sql = $sql."$this->categ')";	
					$mysqli->query($sql);
					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_CATEG';
				}
			}
		}

		//categoria
		function ConsultarCateg(){
		    $toret=array();
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOMBRE_CAT from categoria where (NOMBRE_CAT LIKE '".$this->categ."')";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
		    	$obj =mysqli_fetch_array($resultado, MYSQLI_ASSOC);
				foreach ($obj as $value) {
			 		 	array_push($toret, $value);
					}
				return $toret;
			}
		}

		//categoria
		function ConsultarAct(){
		    $mysqli=$this->ConectarBD();
		    $sql = "SELECT NOMBRE FROM tiene_cat T, actividades A WHERE T.NOMBRE_CAT='".$this->categ."' AND T.COD_ACTIV=A.COD_ACTIV";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
		    	$toret=array();
		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOMBRE']);
		    	}
				return $toret;
			}
		}


		function protomodificar(){
			$mysqli=$this->ConectarBD();
			$sql = "SELECT * FROM categoria WHERE (NOMBRE_CAT LIKE '".$this->categ."')";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}else{
		    	$obj =mysqli_fetch_row($resultado);
				$_SESSION['datosModCat']=$obj;
			}
		}

		function modificar($catmod){
			$mysqli=$this->ConectarBD();
			$sql= "UPDATE categoria SET NOMBRE_CAT ='".$catmod."' WHERE NOMBRE_CAT='".$this->categ."'";
				if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
				}else{
					$sql= "UPDATE tiene_cat SET NOMBRE_CAT ='".$catmod."' WHERE NOMBRE_CAT='".$this->categ."'";
					if (!($resultado = $mysqli->query($sql))){
						return 'ERR_CONS_BD';
					}else{
		    			return "CONFIRM_EDIT_CATEG";
					}
				} 	
		}

		function protoborrar(){
   			$mysqli=$this->ConectarBD();
		    $sql = "SELECT * FROM categoria where NOMBRE_CAT LIKE '".$this->categ."'";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}
		    else{
		    	$obj =mysqli_fetch_row($resultado);
		    	$_SESSION['datosCat']=$obj;
			return "";
			}

		}

		function borrar(){
			$mysqli=$this->conectarBD();
			$sql ='SELECT * FROM categoria WHERE NOMBRE_CAT="'.$this->categ.'"';
  			$result = $mysqli->query($sql);
  			if ($result->num_rows == 1){
        		$sql = "DELETE FROM categoria WHERE NOMBRE_CAT='".$this->categ."'";
        		$mysqli->query($sql);
        		$sql = "DELETE FROM tiene_cat WHERE NOMBRE_CAT='".$this->categ."'";
        		$mysqli->query($sql);
    		return "CONFIRM_DELETE_CATEG";
    		}
	    	else{

	        	return "NOEXISTS_CATEG";
    		}
		}
}
		

 		//categoria
		function buscarCategorias($busq){
	 		$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
	
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT NOMBRE_CAT FROM categoria WHERE NOMBRE_CAT LIKE '%".$busq."%'"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{
		    	
		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOMBRE_CAT']);
		    	}
			}
			return $toret;
		}
	


?>