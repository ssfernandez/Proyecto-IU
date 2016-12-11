<?php
class Horarios{


	public $horai;
	public $horaf;





	function __construct($horai,$horaf){

		$this->horai = $horai;
		$this->horaf = $horaf;




	}




	function getHorai(){
		return $this->horai;
	}



	function getHoraf(){
		return $this->horaf;
	}




	function setHorai($horai){
		return $this->horai=$horai;
	}

	function setHoraf($horaf){
		return $this->horaf=$horaf;
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
		function ConsultarAulas(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOMBRE from espacios";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
		    	if ($resultado->num_rows >= 1){
				$toret=array();

				while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOMBRE']);
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
	        $sql = "SELECT * FROM horario WHERE (HORA_INI = '$this->horai') AND (HORA_FIN = '$this->horaf')";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD';
			}
			else {

				if ($result->num_rows == 0){
					$sql = "INSERT INTO horario (HORA_INI, HORA_FIN) VALUES ('";
					$sql = $sql."$this->horai','$this->horaf')";
					$mysqli->query($sql);
          var_dump($sql);
					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_USR';
				}
			}
		}

		function protoinsertar(){
				$aux=$this->consultarAulas();
		    	$_SESSION['aulas'] = $aux;


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
		function ConsultarH(){
		    $toret=array();
				$id=$_SESSION['idr'];




		    $mysqli=$this->ConectarBD();
		    $sql = "select HORA_INI,HORA_FIN FROM horario WHERE (HORA_INI = '".$id."') ";

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
			$id=$_SESSION['idr'];


			$sql = "select * from horario WHERE (HORA_INI = '".$id."')";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}else{
		    	$obj =mysqli_fetch_row($resultado);
				//$aux=$this->noEstePerfil($obj[3]);
				//$_SESSION['permisos']=$aux;
				$_SESSION['datosModHor']=$obj;
			}
		}

		function modificar(){
			$mysqli=$this->ConectarBD();

			$id=$_SESSION['idr'];

			$sql= "UPDATE horario SET HORA_INI ='".$this->horai."', HORA_FIN='".$this->horaf."' WHERE HORA_INI = '".$id."'";


				if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
				}else{
			    	return "CONFIRM_EDIT_HORARIO";
				}

		}
		function protoborrar(){
			$id=$_SESSION['idr'];

   			$mysqli=$this->ConectarBD();
		    $sql = "SELECT * FROM horario where HORA_INI = '".$id."'";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}
		    else{
		    	$obj =mysqli_fetch_row($resultado);
		    	$_SESSION['datosHor']=$obj;
			return "";
			}

		}

		function borrar(){
			$mysqli=$this->conectarBD();
				$id=$_SESSION['idr'];



			$sql ="SELECT HORA_INI,HORA_FIN FROM horario where HORA_INI = '".$id."'";
  			$result = $mysqli->query($sql);

  			if ($result->num_rows == 1){
        	$sql2 = "DELETE FROM horario  WHERE HORA_INI = '".$id."'";
        		$mysqli->query($sql2);
    		return "CONFIRM_DELETE_HORARIO";
    		}
    	else{

        	return "NOEXISTS_HORARIO";
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
		function buscarHorarios($busq){
	 		$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");

		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT HORA_INI,HORA_FIN FROM horario WHERE (HORA_INI LIKE '%".$busq."%' OR HORA_FIN LIKE '%".$busq."%')";

			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{

		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
						array_push($toret, $aux['HORA_INI']);
						array_push($toret, $aux['HORA_FIN']);





		    	}
			}
			return $toret;

		}

		function generarCodigo($longitud) {
	 		$key = '';
	 		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 			$max = strlen($pattern)-1;
 			for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
			return $key;
	}


?>
