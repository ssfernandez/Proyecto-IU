<?php
	class Trabajadores{

	public $apellidos;
	public $calle;
	public $ciudad;
	public $cp;
	public $email;
	public $fechanac;
	public $nombre;
	public $numdir;
	public $obs;
	public $piso;
	public $dni;
	public $ocup;
	public $sueldo;
	public $contrato;
	public $foto;
	public $numcuenta;
	public $numlicencia;
			

		function __construct($dni,$nombre,$apellidos,$ciudad,$calle,$numdir,$piso,$cp,$email,$fechanac,$obs,$ocup,$sueldo){
		    $this->dni = $dni;
		    $this->nombre = $nombre;
		    $this->apellidos = $apellidos;
		    $this->ciudad = $ciudad;
			$this->calle = $calle;
			$this->piso = $piso;
			$this->numdir = $numdir;
			$this->cp = $cp;
			$this->email = $email;
			$this->fechanac = $fechanac;
			$this->obs = $obs;
			$this->ocup = $ocup;
			$this->sueldo = $sueldo;


		}
		function getDni()
		{
		    return $this->dni;
		}
		 
		function setDni($dni)
		{
		    $this->dni = $dni;
		    return $this;
		}

		function getNombre()
		{
		    return $this->nombre;
		}
		 
		function setNombre($nombre)
		{
		    $this->nombre = $nombre;
		    return $this;
		}

		function getApellidos()
		{
		    return $this->apellidos;
		}
		 
		function setApellidos($apellidos)
		{
		    $this->apellidos = $apellidos;
		    return $this;
		}

		function getCiudad()
		{
		    return $this->ciudad;
		}
		 
		function setCiudad($ciudad)
		{
		    $this->ciudad = $ciudad;
		    return $this;
		}


		function getCalle()
		{
		    return $this->calle;
		}
		 
		function setCalle($calle)
		{
		    $this->calle = $calle;
		    return $this;
		}

		function getPiso()
		{
		    return $this->piso;
		}
		 
		function setPiso($piso)
		{
		    $this->piso = $piso;
		    return $this;
		}

		function getNumdir()
		{
		    return $this->numdir;
		}
		 
		function setNumdir($numdir)
		{
		    $this->numdir = $numdir;
		    return $this;
		}

		function getCp()
		{
		    return $this->cp;
		}
		 
		function setCp($cp)
		{
		    $this->cp = $cp;
		    return $this;
		}

		function getEmail()
		{
		    return $this->email;
		}
		 
		function setEmail($email)
		{
		    $this->email = $email;
		    return $this;
		}

		function getFechanac()
		{
		    return $this->fechanac;
		}
		 
		function setFechanac($fechanac)
		{
		    $this->fechanac = $fechanac;
		    return $this;
		}

		function getObs()
		{
		    return $this->obs;
		}
		 
		function setObs($obs)
		{
		    $this->obs = $obs;
		    return $this;
		}

		function getOcup()
		{
		    return $this->ocup;
		}
		 
		function setOcup($ocup)
		{
		    $this->ocup = $ocup;
		    return $this;
		}

		function getSueldo()
		{
		    return $this->sueldo;
		}
		 
		function setSueldo($sueldo)
		{
		    $this->sueldo = $sueldo;
		    return $this;
		}

		function getNumcuenta()
		{
		    return $this->numcuenta;
		}
		 
		function setNumcuenta($numcuenta)
		{
		    $this->numcuenta = $numcuenta;
		    return $this;
		}

		function getNumlicencia()
		{
		    return $this->numlicencia;
		}
		 
		function setNumlicencia($numlicencia)
		{
		    $this->numlicencia = $numlicencia;
		    return $this;
		}

		function getContrato()
		{
		    return $this->contrato;
		}
		 
		function setContrato($contrato)
		{
		    $this->contrato = $contrato;
		    return $this;
		}

		function getFoto()
		{
		    return $this->foto;
		}
		 
		function setFoto($foto)
		{
		    $this->foto = $foto;
		    return $this;
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



		function insertartrabajador(){
		   	$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM persona WHERE DNI = '".$this->dni."'";
			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
				if ($result->num_rows == 0){
					$sql = "INSERT INTO `persona`(`DNI`, `NOMBRE`, `APELLIDOS`, `FECHA_NAC`, `CALLE`, `NUMERO`, `PISO`, `CIUDAD`, `CP`, `EMAIL`, `OBSERVACIONES`, `BORRADO`) VALUES ('";
					$sql = $sql."$this->dni','$this->nombre','$this->apellidos','$this->fechanac','$this->calle','$this->numdir','$this->piso','$this->ciudad','$this->cp','$this->email','$this->obs','0')";
					$mysqli->query($sql);
					$sql = "INSERT INTO `empleado`(`DNI_EMPLEADO`, `OCUPACION`, `SUELDO`, `BORRADO`) VALUES ('";
					$sql=$sql."$this->dni','$this->ocup','$this->sueldo','0')";
					$mysqli->query($sql);

					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_TRABAJ';
				}
			}
		}


		//Categoria
		function insertarmonitor($contrato,$foto,$numcuenta){
		   	$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM monitor WHERE DNI_MONITOR = '".$this->dni."'";
			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
				if ($result->num_rows == 0){
					$sql = "INSERT INTO `monitor`(`DNI_MONITOR`, `FOTO`, `CONTRATO`, `NUMCUENTA`, `SUELDO`, `BORRADO`) VALUES ('";
					$sql=$sql."$this->dni','$foto','$contrato','$numcuenta','$this->sueldo','0')";
					$mysqli->query($sql);

					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_TRABAJ';
				}
			}
		}


		function insertarfisio($numcuenta,$numlicencia){
		   	$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM fisio WHERE DNI_FISIO = '".$this->dni."'";
			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
				if ($result->num_rows == 0){
					$sql = "INSERT INTO `fisio`(`DNI_FISIO`, `NUM_LICENCIA`, `NUMCUENTA_FISIO`, `SUELDO`, `BORRADO`) VALUES ('";
					$sql=$sql."$this->dni','$numlicencia','$numcuenta','$this->sueldo','0')";
					$mysqli->query($sql);

					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_TRABAJ';
				}
			}
		}

		function insertarocupacion(){
			$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM empleado WHERE DNI_EMPLEADO = '".$this->dni."'";
			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			$sql = "UPDATE `empleado` SET `OCUPACION`= '$this->ocup' WHERE DNI_EMPLEADO= '".$this->dni."'";
			$mysqli->query($sql);

			return 'CONFIMR_INSERT';
		}



		//trabajador
		function ConsultarTrab(){
		    $toret=array();
		    $mysqli=$this->ConectarBD();
		    if($this->ocup=='Monitor'){
			    $sql = "SELECT DNI_EMPLEADO, NOMBRE, APELLIDOS, CIUDAD, CALLE, NUMERO, PISO, CP, EMAIL, FECHA_NAC, OBSERVACIONES, OCUPACION, M.SUELDO, NUMCUENTA, FOTO, CONTRATO FROM persona P, empleado E, monitor M WHERE DNI=DNI_EMPLEADO AND DNI_EMPLEADO=DNI_MONITOR AND M.BORRADO='0' AND (DNI LIKE '".$this->dni."')";
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
			}else if ($this->ocup=='Fisio'){
			    $sql = "SELECT DNI_EMPLEADO, NOMBRE, APELLIDOS, CIUDAD, CALLE, NUMERO, PISO, CP, EMAIL, FECHA_NAC, OBSERVACIONES, OCUPACION, F.SUELDO, NUMCUENTA_FISIO, NUM_LICENCIA from persona P, empleado E, fisio F where DNI=DNI_EMPLEADO AND DNI_EMPLEADO=DNI_FISIO AND F.BORRADO='0' AND (DNI LIKE '".$this->dni."')";
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
			}else {
				$sql = "SELECT DNI_EMPLEADO, NOMBRE, APELLIDOS, CIUDAD, CALLE, NUMERO, PISO, CP, EMAIL, FECHA_NAC, OBSERVACIONES, OCUPACION, SUELDO from persona P, empleado E where DNI=DNI_EMPLEADO AND E.BORRADO='0' AND (DNI LIKE '".$this->dni."')";
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
	}

		function protomodificar(){
			$toret=array();
		    $mysqli=$this->ConectarBD();
		    if($this->ocup=='Monitor'){
			    $sql = "SELECT DNI_EMPLEADO, NOMBRE, APELLIDOS, CIUDAD, CALLE, NUMERO, PISO, CP, EMAIL, FECHA_NAC, OBSERVACIONES, OCUPACION, M.SUELDO, NUMCUENTA, FOTO, CONTRATO FROM persona P, empleado E, monitor M WHERE DNI=DNI_EMPLEADO AND DNI_EMPLEADO=DNI_MONITOR AND M.BORRADO='0' AND (DNI LIKE '".$this->dni."')";
			    if (!($resultado = $mysqli->query($sql))){
					return 'ERR_CONS_BD';
				}
			    else{
			    	$obj =mysqli_fetch_array($resultado, MYSQLI_ASSOC);
					foreach ($obj as $value) {
				 		 	array_push($toret, $value);
						}
					$_SESSION['datosTrab']=$toret;
					return "";
				}
			}else if ($this->ocup=='Fisio'){
			    $sql = "SELECT DNI_EMPLEADO, NOMBRE, APELLIDOS, CIUDAD, CALLE, NUMERO, PISO, CP, EMAIL, FECHA_NAC, OBSERVACIONES, OCUPACION, F.SUELDO, NUMCUENTA_FISIO, NUM_LICENCIA from persona P, empleado E, fisio F where DNI=DNI_EMPLEADO AND DNI_EMPLEADO=DNI_FISIO AND F.BORRADO='0' AND (DNI LIKE '".$this->dni."')";
			    if (!($resultado = $mysqli->query($sql))){
					return 'ERR_CONS_BD';
				}
			    else{
			    	$obj =mysqli_fetch_array($resultado, MYSQLI_ASSOC);
					foreach ($obj as $value) {
				 		 	array_push($toret, $value);
						}
					$_SESSION['datosTrab']=$toret;
					return "";
				}
			}else {
				$sql = "SELECT DNI_EMPLEADO, NOMBRE, APELLIDOS, CIUDAD, CALLE, NUMERO, PISO, CP, EMAIL, FECHA_NAC, OBSERVACIONES, OCUPACION, SUELDO from persona P, empleado E where DNI=DNI_EMPLEADO AND E.BORRADO='0' AND (DNI LIKE '".$this->dni."')";
			    if (!($resultado = $mysqli->query($sql))){
					return 'ERR_CONS_BD';
				}
			    else{
			    	$obj =mysqli_fetch_array($resultado, MYSQLI_ASSOC);
					foreach ($obj as $value) {
				 		 	array_push($toret, $value);
						}
					$_SESSION['datosTrab']=$toret;
					return "";
				}
			}

		}

		function modificar($dninuevo,$contrato,$foto,$numcuenta,$numlicencia){
			$mysqli=$this->ConectarBD();
	        $sql = "SELECT * FROM persona WHERE DNI = '".$this->dni."'";
			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
				if ($result->num_rows == 1){
					$sql1 = "UPDATE `persona` SET `DNI` ='".$dninuevo."', `NOMBRE`= '".$this->nombre."', `APELLIDOS` = '".$this->apellidos."', `FECHA_NAC` = '".$this->fechanac."', `CALLE` = '".$this->calle."', `NUMERO` = '".$this->numdir."', `PISO` = '".$this->piso."', `CIUDAD` = '".$this->ciudad."', `CP` = '".$this->cp."', `EMAIL` = '".$this->email."', `OBSERVACIONES` = '".$this->obs."' WHERE DNI='".$this->dni."'";
					$mysqli->query($sql1);
					$sql2 = "UPDATE `empleado` SET `DNI_EMPLEADO` ='".$dninuevo."', `OCUPACION`= '".$this->ocup."', `SUELDO` = '".$this->sueldo."'  WHERE DNI_EMPLEADO='".$this->dni."'";
					$mysqli->query($sql2);

					if($this->ocup=='Monitor'){
						$sql3 = "UPDATE `monitor` SET `DNI_MONITOR` ='".$dninuevo."', `NUMCUENTA`= '".$numcuenta."', `SUELDO` = '".$this->sueldo."', `FOTO` = '".$foto."', `CONTRATO` = '".$contrato."' WHERE DNI_MONITOR='".$this->dni."'";
						$mysqli->query($sql3);

					}

					if($this->ocup=='Fisio'){
						$sql4 = "UPDATE `monitor` SET `DNI_FISIO` ='".$dninuevo."', `NUMCUENTA`= '".$numcuenta."', `SUELDO` = '".$this->sueldo."', `NUM_LICENCIA` = '".$numlicencia."' WHERE DNI_FISIO='".$this->dni."'";
						$mysqli->query($sql4);

					}

					return 'CONFIRM_EDIT_TRABAJ';
				}
				else{
					return 'ERR_CONS_BD';
				}
			}
		}

		function protoborrar(){
			$toret=array();
		    $mysqli=$this->ConectarBD();
		    if($this->ocup=='Monitor'){
			    $sql = "SELECT DNI_EMPLEADO, NOMBRE, APELLIDOS, CIUDAD, CALLE, NUMERO, PISO, CP, EMAIL, FECHA_NAC, OBSERVACIONES, OCUPACION, M.SUELDO, NUMCUENTA, FOTO, CONTRATO FROM persona P, empleado E, monitor M WHERE DNI=DNI_EMPLEADO AND DNI_EMPLEADO=DNI_MONITOR AND M.BORRADO='0' AND (DNI LIKE '".$this->dni."')";
			    if (!($resultado = $mysqli->query($sql))){
					return 'ERR_CONS_BD';
				}
			    else{
			    	$obj =mysqli_fetch_array($resultado, MYSQLI_ASSOC);
					foreach ($obj as $value) {
				 		 	array_push($toret, $value);
						}
					$_SESSION['datosTrab']=$toret;
					return "";
				}
			}else if ($this->ocup=='Fisio'){
			    $sql = "SELECT DNI_EMPLEADO, NOMBRE, APELLIDOS, CIUDAD, CALLE, NUMERO, PISO, CP, EMAIL, FECHA_NAC, OBSERVACIONES, OCUPACION, F.SUELDO, NUMCUENTA_FISIO, NUM_LICENCIA from persona P, empleado E, fisio F where DNI=DNI_EMPLEADO AND DNI_EMPLEADO=DNI_FISIO AND F.BORRADO='0' AND (DNI LIKE '".$this->dni."')";
			    if (!($resultado = $mysqli->query($sql))){
					return 'ERR_CONS_BD';
				}
			    else{
			    	$obj =mysqli_fetch_array($resultado, MYSQLI_ASSOC);
					foreach ($obj as $value) {
				 		 	array_push($toret, $value);
						}
					$_SESSION['datosTrab']=$toret;
					return "";
				}
			}else {
				$sql = "SELECT DNI_EMPLEADO, NOMBRE, APELLIDOS, CIUDAD, CALLE, NUMERO, PISO, CP, EMAIL, FECHA_NAC, OBSERVACIONES, OCUPACION, SUELDO from persona P, empleado E where DNI=DNI_EMPLEADO AND E.BORRADO='0' AND (DNI LIKE '".$this->dni."')";
			    if (!($resultado = $mysqli->query($sql))){
					return 'ERR_CONS_BD';
				}
			    else{
			    	$obj =mysqli_fetch_array($resultado, MYSQLI_ASSOC);
					foreach ($obj as $value) {
				 		 	array_push($toret, $value);
						}
					$_SESSION['datosTrab']=$toret;
					return "";
				}
			}

		}

		function borrar(){
			$mysqli=$this->ConectarBD();
			$sql = "UPDATE `empleado` SET `BORRADO`= '1' WHERE DNI_EMPLEADO= '".$this->dni."'";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}
		    if($this->ocup=='Monitor'){
		    	$sql = "UPDATE `monitor` SET `BORRADO`= '1' WHERE DNI_MONITOR= '".$this->dni."'";
		    	$mysqli->query($sql);
				return "CONFIRM_DELETE_TRABAJ";
			}
			if ($this->ocup=='Fisio'){
		    	$sql = "UPDATE `fisio` SET `BORRADO`= '1' WHERE DNI_FISIO= '".$this->dni."'";
		    	$mysqli->query($sql);
				return "CONFIRM_DELETE_TRABAJ";
			}
			return "CONFIRM_DELETE_TRABAJ";
		}
		
}
	

 		//trabajador
		function buscarTrabajadores($busq){
	 		$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
	
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT DNI_EMPLEADO, NOMBRE, APELLIDOS, OCUPACION FROM empleado E, persona P  WHERE DNI=DNI_EMPLEADO AND E.BORRADO='0' AND ((NOMBRE LIKE '%".$busq."%') OR (APELLIDOS LIKE '%".$busq."%') OR (OCUPACION LIKE '%".$busq."%')
			OR (DNI_EMPLEADO LIKE '%".$busq."%')) "; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
			}else{
		   
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['DNI_EMPLEADO']);
		    		array_push($toret, $aux['NOMBRE']);
		    		array_push($toret, $aux['APELLIDOS']);
		    		array_push($toret, $aux['OCUPACION']);
		    	}
			}
			return $toret;
		}




  ?>