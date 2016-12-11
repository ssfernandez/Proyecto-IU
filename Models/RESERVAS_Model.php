<?php
class Reserva{


	public $fecha;
	public $dni;
	public $codesp;
	public $precio;
	public $horai;
	public $horaf;




	function __construct($fecha,$dni, $codesp, $precio, $horai, $horaf){

		$this->fecha = $fecha;
		$this->dni = $dni;
		$this->codesp = $codesp;
		$this->precio = $precio;
		$this->horai = $horai;
		$this->horaf = $horaf;



	}




	function getFecha(){
		return $this->fecha;
	}



	function getDni(){
		return $this->dni;
	}

	function getCodesp(){
		return $this->codesp;
	}

	function getPrecio(){
		return $this->precio;
	}


	function getHorai(){
		return $this->horai;
	}

	function getHoraf(){
		return $this->horaf;
	}




	function setFecha($fecha){
		return $this->fecha=$fecha;
	}

	function setDni($dni){
		return $this->dni=$dni;
	}

	function setCodesp($codesp){
		return $this->codesp=$codesp;
	}

	function setPrecio($precio){
		return $this->precio=$precio;
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




		//funcion ConsultarAulas: hace una búsqueda en la tabla espacios de
		//las aulas. 
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

// Inserta en la Bd los datos recogidos por la vista ADD
		function insertar(){
		   	$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM reserva WHERE COD_RES = '".$id."'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD';
			}
			else {

				if ($result->num_rows == 0){
					$sql = "INSERT INTO reserva (FECHA, DNI, COD_ESP, PRECIO, HORAI, HORAF,BORRADO) VALUES ('";
					$sql = $sql."$this->fecha','$this->dni','$this->codesp','$this->precio', '$this->horai', '$this->horaf', 'NO')";
					$mysqli->query($sql);
					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_USR';
				}
			}
		}

		//Recoge de la BD las aulas para poder seleccionarlas cuando insertamos una reserva
		function protoinsertar(){
				$aux=$this->consultarAulas();
		    	$_SESSION['aulas'] = $aux;


		}





		//funcion Consultar: hace una búsqueda en la tabla reserva con
		//el codigo de reserva . Si van vacios devuelve todos.
		function ConsultarR(){
		    $toret=array();
				$id=$_SESSION['idr'];
		    $mysqli=$this->ConectarBD();
		    $sql = "select COD_RES, FECHA, DNI, COD_ESP,PRECIO,HORAI,HORAF FROM reserva WHERE (COD_RES = '".$id."') AND (BORRADO='NO')";
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
			$sql = "select * from reserva WHERE (COD_RES = '".$id."')";
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

			$sql= "UPDATE reserva SET FECHA ='".$this->fecha."', DNI ='".$this->dni."', COD_ESP='".$this->codesp."',PRECIO ='".$this->precio."', HORAI ='".$this->horai."', HORAF='".$this->horaf."' WHERE COD_RES = '".$id."'";

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

			$sql ="SELECT COD_RES, FECHA, DNI, COD_ESP, PRECIO,HORAI,HORAF FROM reserva where COD_RES = '".$id."'";
  			$result = $mysqli->query($sql);

  			if ($result->num_rows == 1){
        	$sql2 = "UPDATE reserva SET BORRADO ='SI' WHERE COD_RES = '".$id."'";
        		$mysqli->query($sql2);
    		return "CONFIRM_DELETE_RESERVA";
    		}
    	else{

        	return "NOEXISTS_RESERVA";
    }

}





}

	//funcion buscarReservas: hace una búsqueda en la tabla reserva de
		//las reservas y las metemos en un array para poder crear un session y luego mostarlas.
		function buscarReservas($busq){
	 		$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");

		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT COD_RES,FECHA, DNI, COD_ESP, PRECIO,HORAI,HORAF FROM reserva WHERE (BORRADO = 'NO') AND (DNI LIKE '%".$busq."%' OR PRECIO LIKE '%".$busq."%')";

			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{

		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
						array_push($toret, $aux['COD_RES']);
						array_push($toret, $aux['FECHA']);
		    		array_push($toret, $aux['DNI']);
		    		array_push($toret, $aux['COD_ESP']);
						array_push($toret, $aux['PRECIO']);
						array_push($toret, $aux['HORAI']);
						array_push($toret, $aux['HORAF']);




		    	}
			}
			return $toret;

		}



?>
