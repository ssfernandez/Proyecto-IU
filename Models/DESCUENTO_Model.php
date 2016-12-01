<?php
	class Descuento{

		public $coddes;
		public $descuento; 
		public $porcent;
		public $activ;
		

		function __construct($descuento,$porcent,$coddes,$activ){ 
			$this->descuento = $descuento;
			$this->porcent = $porcent;
			$this->coddes = $coddes; 
			if($activ==""){
				$this->activ=0;
			} else{
			$this->activ = 1;
			}    
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
		    $sql = "SELECT * FROM descuento WHERE (COD_DESCUENTO LIKE '%".$this->coddes."%')";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
			if ($resultado->num_rows == 1){
				$obj =mysqli_fetch_row($resultado);
		    	$_SESSION['datosDes']=$obj;
		    	return "";
		    	}
		    	return 'ERR_CONS_BD';

			}
			}
			    	

		function insertar(){
		   	$mysqli=$this->ConectarBD();
		   	$aux=$_SESSION['accionInsert'];
	
	        $sql = "SELECT * FROM descuento WHERE COD_DESCUENTO = '".$this->coddes."'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					$sql = "INSERT INTO descuento (TIPO_DES,PORCENTAJE,COD_DESCUENTO,ACTIVO) VALUES ('";
					$sql = $sql."$this->descuento', '$this->porcent', '$this->coddes', '$this->activ')";	
					$mysqli->query($sql);
					return 'CONFIMR_INSERT';
					
				}
				else{
					
					return 'DATA_EXISTS_PERF';
				}
			}

			}

		function modificar(){
			$mysqli=$this->ConectarBD();
			$sql= "UPDATE descuento SET TIPO_DES ='".$this->descuento."', PORCENTAJE ='".$this->porcent."', COD_DESCUENTO='".$this->coddes."',ACTIVO='".$this->activ ."' WHERE TIPO_DES='".$this->descuento."'" ;
				if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
				}else{
			    	return "CONFIRM_EDIT_DISCOUNT";
				}
			}

		function protomodificar(){
			$mysqli=$this->ConectarBD();
			$sql = "SELECT * FROM descuento WHERE (COD_DESCUENTO LIKE '".$this->coddes."')";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}else{
		    	$obj =mysqli_fetch_row($resultado);
				$_SESSION['datosModDis']=$obj;
				return '';
			}

			}

		function borrar(){
			$mysqli=$this->conectarBD();
			$sql ="SELECT * FROM descuento WHERE COD_DESCUENTO='".$this->coddes."'";
  			$result = $mysqli->query($sql);
  			if ($result->num_rows == 1){
        		$sql = "DELETE FROM descuento WHERE COD_DESCUENTO='".$this->coddes."'";
        		$mysqli->query($sql);
        		return "CONFIRM_DELETE_DESC";				
    		}else{

        		return "NOEXISTS_DESC";
    		}

			}

		function protoborrar(){
   			$mysqli=$this->ConectarBD();
		    $sql = "SELECT * FROM descuento WHERE COD_DESCUENTO LIKE '".$this->coddes."'";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}
		    else{
		    	$obj =mysqli_fetch_row($resultado);
		    	$_SESSION['datosDesB']=$obj;
			return "";
			}

			}
		
}

function listarDescuentos($busq){
			$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
	
			if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$leRet=array();
			$sql="SELECT TIPO_DES,PORCENTAJE,COD_DESCUENTO,ACTIVO FROM descuento WHERE TIPO_DES LIKE '%".$busq."%' OR PORCENTAJE LIKE '%".$busq."%'"."OR COD_DESCUENTO LIKE '%".$busq."%'"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $leRet;
			}else{
				$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($leRet, $aux['COD_DESCUENTO']);
		    		array_push($leRet, $aux['PORCENTAJE']);
		    		array_push($leRet, $aux['TIPO_DES']);
		    		array_push($leRet, $aux['ACTIVO']);
		    	}
			}
			return $leRet;
		}



?>

