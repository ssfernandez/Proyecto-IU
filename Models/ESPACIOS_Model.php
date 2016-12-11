<?php
class Space
{
	private $aforo;
	private $cod;
	private $tipo;
	private $fecha;
	private $nombreEvento;
	private $nombreEs;



	function __construct($nombreEs,$aforo,$cod,$tipo)
	{
		$this->nombreEs = $nombreEs;
		$this->aforo = $aforo;
		$this->cod = $cod;
		$this->tipo = $tipo;
	}

	function getAforo()
	{
		return $aforo;
	}

	function getCod()
	{
		return $cod;
	}

	function getTipo()
	{
		return $tipo;
	}

	function getNombre()
	{
		return $nombreEs;
	}

	function getFecha()
	{
		return $fecha;
	}

	function setAforo($aforo)
	{
		$this->aforo = $aforo;
	}

	function setCod($cod)
	{
		$this->cod = $cod;
	}

	function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}

	function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	function setNombre($nombre)
	{
		$nombreEvento = $nombre;
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

	function insertar()
	{
		$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM espacios WHERE COD = '".$this->cod."'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					$sql = "INSERT INTO espacios (COD, AFORO, TIPO, NOMBRE_ES) VALUES ('";
					$sql = $sql." $this->cod', '$this->aforo', '$this->tipo','$this->nombreEs')";	
					$mysqli->query($sql);
					return 'CONFIRM_INSERT';
				}
				else{
					return 'DATA_EXISTS_SPACE';
				}
			}

	}

	function protoinsertar(){
				$aux=$this->consultarEspacios();
		    	$_SESSION['espacios'] = $aux;
		      	
				
		}

   function consultarEspacios(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select * from espacios";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
		    	if ($resultado->num_rows >= 1){
				$toret=array();

				while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['COD']);
		    	}
				return $toret;
			}
			}
		}		
    

    function buscarEspacios($busq){
	 		$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
	
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT AFORO, COD, NOMBRE_ES, TIPO FROM espacios WHERE COD LIKE '%".$busq."%' OR AFORO LIKE '%".$busq. "%' OR NOMBRE_ES LIKE '%".$busq."%' OR TIPO LIKE '%".$busq."%'"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{
		    	
		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['COD']);
		    		array_push($toret, $aux['AFORO']);
		    		array_push($toret,$aux['NOMBRE_ES']);
		    		array_push($toret, $aux['TIPO']);
		    	}
		    	
			}
			return $toret;
		}

		function ConsultarEs(){
		    $toret=array();
		    $mysqli=$this->ConectarBD();
		    $sql = "select COD, NOMBRE_ES, AFORO,TIPO from espacios where (COD LIKE '".$this->cod."')";
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
			$sql = "select COD, NOMBRE_ES,TIPO,AFORO from espacios where (COD LIKE '".$this->cod."')";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}else{
		    	$obj =mysqli_fetch_row($resultado);
				$_SESSION['datosModEsp']=$obj;
			}
		}

		function modificar(){
			$mysqli=$this->ConectarBD();
			$_SESSION['codigo'] = $this->cod;
			$sql= "UPDATE espacios SET COD ='".$this->cod."', NOMBRE_ES ='".$this->nombreEs."', TIPO ='".$this->tipo."', AFORO='".$this->aforo."' WHERE COD='".$this->cod."'" ;
				if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
				}else{
			    	return "CONFIRM_EDIT_ESP";
				}
		 	
		}

		function protoborrar(){
   			$mysqli=$this->ConectarBD();
		    $sql = "SELECT * FROM espacios where COD LIKE '".$this->cod."'";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}
		    else{
		    	$obj =mysqli_fetch_row($resultado);
		    	$_SESSION['datosEsp']=$obj;
			return "";
			}

		}

		function borrar(){
			$mysqli=$this->conectarBD();
			$sql ='SELECT * FROM espacios WHERE COD="'.$this->cod.'"';
  			$result = $mysqli->query($sql);
  			if ($result->num_rows == 1){
        		$sql = "DELETE FROM espacios WHERE COD='".$this->cod."'";
        		$mysqli->query($sql);
    		return "CONFIRM_DELETE_ESP";
    		}
    	else{

        	return "NOEXISTS_ESP";
    }

}
}
?>