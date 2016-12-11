<?php
class Reserva2{


	public $fecha;
	public $dni;
	public $codact;





	function __construct($fecha,$dni, $codact){

		$this->fecha = $fecha;
		$this->dni = $dni;
		$this->codact = $codact;




	}


	function getFecha(){
		return $this->fecha;
	}



	function getDni(){
		return $this->dni;
	}

	function getCodAct(){
		return $this->codact;
	}



	function setFecha($fecha){
		return $this->fecha=$fecha;
	}

	function setDni($dni){
		return $this->dni=$dni;
	}

	function setCodAct($codact){
		return $this->codact=$codact;
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







		//funcion ConsultarAct: hace una búsqueda en la tabla actividades de
		//los nombres de actividad.
		function consultarAct(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOMBRE from actividades";
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

		// Inserta en la Bd los datos recogidos por la vista ADD
		function insertar(){
		   	$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM reservact WHERE  COD_RES = '".$id."'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD';
			}
			else {

				if ($result->num_rows == 0){
					$sql = "INSERT INTO reservact (FECHA, DNI, COD_ACT, BORRADO) VALUES ('";
					$sql = $sql."$this->fecha','$this->dni','$this->codact', 'NO')";
					$mysqli->query($sql);
					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_USR';
				}
			}
		}

		//Recoge de la BD las actividades para poder seleccionarlas cuando insertamos una reserva de actividad
		function protoinsertar(){
				$aux=$this->consultarAct();
		    	$_SESSION['act'] = $aux;


		}


		//funcion Consultar: hace una búsqueda en la tabla reservact con
		//el codigo de reserva . Si van vacios devuelve todos.
		function ConsultarR(){
			$toret=array();
			$id=$_SESSION['idr'];
			$mysqli=$this->ConectarBD();
			$sql = "select FECHA, DNI, COD_ACT,COD_RES FROM reservact WHERE (COD_RES = '".$id."') AND (BORRADO='NO')";
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
			//traemos los datos que estan inicialmente en la BD para mostrarlos en el formulario de modificación.
		function protomodificar(){
			$mysqli=$this->ConectarBD();
			$id=$_SESSION['idr'];
			$sql = "select * from reservact WHERE (COD_RES = '".$id."')";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}else{
		    	$obj =mysqli_fetch_row($resultado);
				//$aux=$this->noEstePerfil($obj[3]);
				//$_SESSION['permisos']=$aux;
				$_SESSION['datosModRes']=$obj;
			}
		}
			//modificamos la reserva con los datos del formulario e insertamos en la BD
		function modificar(){
			$mysqli=$this->ConectarBD();
				$id=$_SESSION['idr'];

			$sql= "UPDATE reservact SET FECHA ='".$this->fecha."', DNI ='".$this->dni."', COD_ACT='".$this->codact."' WHERE COD_RES = '".$id."'";



				if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
				}else{
			    	return "CONFIRM_EDIT_RESERVA";
				}

		}

		// Realizamos borrado logico de la fila la cual queremos borrar. Para ello le pasamos el codigo de reserva.
		function borrar(){
			$mysqli=$this->conectarBD();
				$id=$_SESSION['idr'];

			$sql ="SELECT  FECHA, DNI, COD_ACT,COD_RES FROM reservact WHERE (COD_RES = '".$id."')";
  			$result = $mysqli->query($sql);

  			if ($result->num_rows == 1){
        	$sql2 = "UPDATE reservact SET BORRADO ='SI' WHERE COD_RES = '".$id."'";
        		$mysqli->query($sql2);
    		return "CONFIRM_DELETE_RESERVA";
    		}
    	else{

        	return "NOEXISTS_RESERVA";
    }

}





}

	//funcion buscarReservas: hace una búsqueda en la tabla reservact de
	//las reservas y las metemos en un array para poder crear un session y luego mostarlas.
		function buscarActividades($busq){
	 		$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");

		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT FECHA, DNI, COD_ACT, COD_RES FROM reservact WHERE (BORRADO LIKE 'NO') AND (DNI LIKE '%".$busq."%' OR FECHA LIKE '%".$busq."%')";
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{

		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){

						array_push($toret, $aux['FECHA']);
		    		array_push($toret, $aux['DNI']);
		    		array_push($toret, $aux['COD_ACT']);
            array_push($toret, $aux['COD_RES']);



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
