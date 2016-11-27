<?php
	class User{

		public $user; 
		public $passwd;   
		public $dni;
		public $perfil; 
		

		function __construct($user, $passwd, $dni, $perfil){
		    $this->user = $user;
			$this->passwd = $passwd;
			$this->dni = $dni;
			$this->perfil = $perfil;  
		}


		function getUser(){
			return $this->user;
		}

		function getPasswd(){
			return $this->passwd;
		}

		function getDni(){
			return $this->dni;
		}

		function getPerfil(){
			return $this->perfil;
		}

		

		function setUser($user){
			return $this->user=$user;
		}

		function setPasswd($passwd){
			return $this->passwd=$passwd;
		}

		function setDni($dni){
			return $this->dni=$dni;
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
		function Consultar(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOMBRE, CLAVE, DNI, NOM_PER from cuenta where (NOMBRE LIKE '".$this->user."') AND (CLAVE LIKE '".$this->passwd."')";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
			return $resultado;
			}
		}

		//funcion ComprobarPermisos: hace una búsqueda en la tabla usuario de
		//los permisos que tiene este usuario.
		function ComprobarPermisos(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOM_PER from cuenta where (NOMBRE LIKE '".$this->user."') AND (CLAVE LIKE '".$this->passwd."')";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
			return $resultado;
			}
		}	

		function getAcciones(){
			$mysqli=$this->ConectarBD();
			$toret=array();
			$sql="SELECT * FROM tiene_acc WHERE NOM_PER = '".$this->perfil."' AND NOM_ACC NOT LIKE 'DELETE%' AND NOM_ACC NOT LIKE 'SHOW%' AND NOM_ACC NOT LIKE 'EDIT%' ORDER BY NOM_CONT"; 
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

		function getAccesos(){
			$mysqli=$this->ConectarBD();
			$toret=array();
			$sql="SELECT * FROM tiene_acc WHERE NOM_PER = '".$this->perfil."' ORDER BY NOM_CONT"; 
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

		//funcion ConsultarPerfiles: hace una búsqueda en la tabla perfil de
		//los permisos. Esta funcion se puede poner externa a la clase para 
		//no tener que crear una clase modelo de usuario sin tener atributos de usuario
		function ConsultarPerfiles(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOM_PER from perfil";
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
		    	
		//funcion listarUsuarios: hace una búsqueda en la tabla cuenta de
		//los usuarios. Esta funcion se puede poner externa a la clase para 
		//no tener que crear una clase modelo de usuario sin tener atributos de usuario   
		function listarUsuarios(){
			$mysqli=$this->ConectarBD();
			$toret=array();
			$sql="select NOMBRE, NOM_PER from cuenta"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return "error";
			}else{
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOMBRE']);
		    		array_push($toret, $aux['NOM_PER']);
		    	}
			}
			return $toret;
		}

		function insertar(){
		   	$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM cuenta WHERE NOMBRE = '".$this->user."'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					$sql = "INSERT INTO cuenta (NOMBRE, CLAVE, DNI, NOM_PER) VALUES ('";
					$sql = $sql."$this->user', '$this->passwd', '$this->dni', '$this->perfil')";	
					$mysqli->query($sql);
					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_USR';
				}
			}
		}

		function protoinsertar(){
				$aux=$this->consultarPerfiles();
		    	$_SESSION['perfiles'] = $aux;
		      	
				
		}

		//funcion addPerfil: hace una búsqueda en la tabla usuario con
		//los datos de usuario y contraseña y recoje de la consulta
		//el atributo perfil y lo añade al usuario. 
		function addPerfil(){
			$result = $this->Consultar();
			if ($result->num_rows >= 1){
				$toret=array();

				$obj =mysqli_fetch_array($result, MYSQLI_ASSOC);
				foreach ($obj as $key => $value) {
			 		 	array_push($toret, $value);
					}
				//Si los permisos estan en tercera posicion
				$this->perfil = $toret[3];
			}else{
				return 'ERR_CONN_BD'; 
			}
		}

		//funcion checkUser: hace una búsqueda en la tabla usuario con
		//los datos de usuario y contraseña y comprueba que el 
		//usuario existe en la base de datos. 
		function checkUser(){
			$result = $this->Consultar();
			if ($result->num_rows >= 1){
				return true;
			}elseif($result == 'ERR_CONS_BD'){
				return 'ERR_CONS_BD';
			}else{
				return false;
			}
			
		}

		//funcion Consultar: hace una búsqueda en la tabla usuario con
		//los datos de usuario y contraseña. Si van vacios devuelve todos.
		function ConsultarU(){
		    $toret=array();
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOMBRE, DNI, NOM_PER from cuenta where (NOMBRE LIKE '".$this->user."')";
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

		function protomodificar(){
			$mysqli=$this->ConectarBD();
			$sql = "select * from cuenta where (NOMBRE LIKE '".$this->user."')";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}else{
		    	$obj =mysqli_fetch_row($resultado);
				$aux=$this->noEstePerfil($obj[3]);
				$_SESSION['permisos']=$aux;
				$_SESSION['datosModUsr']=$obj;
			}
		}

		function modificar(){
			$mysqli=$this->ConectarBD();
			$sql= "UPDATE cuenta SET NOMBRE ='".$this->user."', CLAVE ='".$this->passwd."', DNI ='".$this->dni."', NOM_PER='".$this->perfil."' WHERE NOMBRE='".$this->user."'" ;
				if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
				}else{
			    	return "CONFIRM_EDIT_USR";
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

		function borrar(){
			$mysqli=$this->conectarBD();
			$sql ='SELECT * FROM cuenta WHERE NOMBRE="'.$this->user.'"';
  			$result = $mysqli->query($sql);
  			if ($result->num_rows == 1){
        		$sql = "DELETE FROM cuenta WHERE NOMBRE='".$this->user."'";
        		$mysqli->query($sql);
    		return "CONFIRM_DELETE_USR";
    		}
    	else{

        	return "NOEXISTS_USR";
    }

}


		function noEstePerfil($perf){
			$mysqli=$this->ConectarBD();
		    $sql = "select NOM_PER from perfil WHERE NOM_PER <>'".$perf."'";
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

		
}

//funcion buscarUsuarios: hace una búsqueda en la tabla cuenta de
		//los usuarios con un usuario o perfil entrante. Esta funcion se puede poner externa a la clase para 
		//no tener que crear una clase modelo de usuario sin tener atributos de usuario   
		function buscarUsuarios($busq){
	 		$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
	
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT NOMBRE, DNI, NOM_PER FROM cuenta WHERE NOMBRE LIKE '%".$busq."%' OR DNI LIKE '%".$busq."%' OR NOM_PER LIKE '%".$busq."%'"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{
		    	
		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOMBRE']);
		    		array_push($toret, $aux['DNI']);
		    		array_push($toret, $aux['NOM_PER']);
		    	}
			}
			return $toret;
		}


?>

