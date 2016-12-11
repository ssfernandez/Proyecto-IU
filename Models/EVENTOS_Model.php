<?php
class Event
{
	private $descripcion;
	private $fecha;
	private $nombre;
	private $precio;


	function __construct($descripcion,$fecha,$nombre,$precio)
	{
		$this->descripcion = $descripcion;
		$this->fecha = $fecha;
		$this->nombre = $nombre;
		$this->precio = $precio;
	}

	function getDescripcion()
	{
		return $descripcion;
	}

	function getFecha()
	{
		return $fecha;
	}

	function getNombre()
	{
		return $nombre;
	}

	function getPrecio()
	{
		return $precio;
	}

	function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;

	}

	function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	function setPrecio($precio)
	{
		$this->precio = $precio;
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
	        $sql = "SELECT * FROM eventos WHERE NOMBRE = '".$this->nombre."'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					$sql = "INSERT INTO eventos (DESCRIPCION, FECHA, NOMBRE, PRECIO) VALUES ('";
					$sql = $sql."$this->descripcion', '$this->fecha', '$this->nombre', '$this->precio')";	
					$mysqli->query($sql);
					return 'CONFIRM_INSERT';
				}
				else{
					return 'DATA_EXISTS_EVENT';
				}
			}

	}

	function protoinsertar(){
				$aux=$this->consultarEventos();
		    	$_SESSION['eventos'] = $aux;
		}


    function consultarEventos(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOMBRE from eventos";
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

		function buscarEventos($busq){
	 		$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
	
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT DESCRIPCION, FECHA, NOMBRE, PRECIO FROM eventos WHERE DESCRIPCION LIKE '%".$busq."%' OR FECHA LIKE '%".$busq. "%' OR NOMBRE LIKE '%".$busq."%' OR PRECIO LIKE '%".$busq."%'"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{
		    	
		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOMBRE']);
		    		array_push($toret, $aux['FECHA']);
		    		array_push($toret,$aux['DESCRIPCION']);
		    		array_push($toret, $aux['PRECIO']);
		    	}
		    	
			}
			return $toret;
		}	


		function ConsultarEv(){
		    $toret=array();
		    $mysqli=$this->ConectarBD();
		    $sql = "select NOMBRE, PRECIO, FECHA,DESCRIPCION from eventos where (NOMBRE LIKE '".$this->nombre."')";
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
			$sql = "select NOMBRE, PRECIO,FECHA,DESCRIPCION from eventos where (NOMBRE LIKE '".$this->nombre."')";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}else{
		    	$obj =mysqli_fetch_row($resultado);
				$_SESSION['eventMod']=$obj;
			}
		}

		function modificar(){
			$mysqli=$this->ConectarBD();
			$_SESSION['nombre'] = $this->nombre;
			$sql= "UPDATE eventos SET NOMBRE ='".$this->nombre."', PRECIO ='".$this->precio."', FECHA ='".$this->fecha."', DESCRIPCION='".$this->descripcion."' WHERE NOMBRE='".$this->nombre."'" ;
				if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
				}else{
			    	return "CONFIRM_EDIT_ESP";
				}
		 	
		}	

		function protoborrar(){
   			$mysqli=$this->ConectarBD();
		    $sql = "SELECT * FROM eventos where NOMBRE LIKE '".$this->nombre."'";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}
		    else{
		    	$obj =mysqli_fetch_row($resultado);
		    	$_SESSION['datosEvent']=$obj;
			return "";
			}

		}

		function borrar(){
			$mysqli=$this->conectarBD();
			$sql ='SELECT * FROM eventos WHERE NOMBRE="'.$this->nombre.'"';
  			$result = $mysqli->query($sql);
  			if ($result->num_rows == 1){
        		$sql = "DELETE FROM eventos WHERE NOMBRE='".$this->nombre."'";
        		$mysqli->query($sql);
    		return "CONFIRM_DELETE_EVENT";
    		}
    	else{

        	return "NOEXISTS_EVENT";
    }
}
}
?>