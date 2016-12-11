<?php
	class Cliente{

		public $especial;
		public $numcuenta_u;
		public $pagos_pend;
		public $profesion;
		public $protec_datos;

		public $apellidos;
		public $calle;
		public $ciudad;
		public $cp;
		public $dni;
		public $email;
		public $fecha_nac;
		public $nombre;
		public $numero;
		public $observaciones;
		public $piso;
		public $borrado;
		public $documentacion;


		function __construct($especial, $numcuenta_u,$pagos_pend, $profesion, $protec_datos, $apellidos, $calle, $ciudad, $cp, $dni, $email, $fecha_nac, $nombre, $numero, $observaciones, $piso, $borrado ){

			$this->especial = $especial;
			$this->numcuenta_u = $numcuenta_u;
			$this->pagos_pend = $pagos_pend;
			$this->profesion = $profesion;
			$this->protec_datos = $protec_datos;
			$this->apellidos = $apellidos;
			$this->calle = $calle;
			$this->ciudad = $ciudad;
			$this->cp = $cp;
			$this->dni = $dni;
			$this->email = $email;
			$this->fecha_nac = $fecha_nac;
			$this->nombre = $nombre;
			$this->numero = $numero;
			$this->observaciones = $observaciones;
			$this->piso = $piso;
			$this->borrado = $borrado;
			
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


		function insertar(){

			$mysqli=$this->ConectarBD();

			$sql = "SELECT * FROM persona WHERE DNI = '".$this->dni."'";

			if(!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD';
			}
			else{
				if ($result->num_rows == 0){
					$sql = "INSERT INTO persona (DNI, NOMBRE, APELLIDOS, FECHA_NAC, CALLE, NUMERO, PISO, CIUDAD, CP, EMAIL, OBSERVACIONES, BORRADO) VALUES ('";
					$sql = $sql."$this->dni','$this->nombre', '$this->apellidos', '$this->fecha_nac', '$this->calle', '$this->numero', '$this->piso', '$this->ciudad', '$this->cp', '$this->email', '$this->observaciones', '0')";
					$mysqli->query($sql);
					
				}
				else{
					return 'DATA_EXISTS_USR';
				}

			}	

			$sql = "SELECT * FROM cliente WHERE DNI_U = '".$this->dni."'";

			if(!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD';
			}
			else{
				if ($result->num_rows == 0){

					$sql = "INSERT INTO cliente(DNI_U, PROFESION, PAGOS_PEND, NUMCUENTA_U, PROTEC_DATOS, ESPECIAL, BORRADO) VALUES ('";
					$sql = $sql."$this->dni', '$this->profesion', '$this->pagos_pend', '$this->numcuenta_u', '$this->protec_datos', '$this->especial','0')";
					$mysqli->query($sql);
					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXIST_USR';
				}
			}
		}


		function ConsultarCliente(){
		    $toret=array();
		    $mysqli=$this->ConectarBD();
		    $sql = "SELECT * from persona where BORRADO = '0' AND DNI LIKE '".$this->dni."'";
			    if (!($resultado = $mysqli->query($sql))){
					return 'ERR_CONS_BD';
				}else{
					$aux;
					while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
						array_push($toret, $aux['NOMBRE']);
			    		array_push($toret, $aux['APELLIDOS']);
			    		array_push($toret, $aux['DNI']);
			    		array_push($toret, $aux['FECHA_NAC']);
			    		array_push($toret, $aux['EMAIL']);
			    		array_push($toret, $aux['CIUDAD']);
			    		array_push($toret, $aux['CALLE']);
			    		array_push($toret, $aux['NUMERO']);
			    		array_push($toret, $aux['PISO']);
			    		array_push($toret, $aux['CP']);
			    		array_push($toret, $aux['OBSERVACIONES']);
			    		

					}				
				}
			$sql = "SELECT * from cliente where BORRADO = '0' AND DNI_U LIKE '".$this->dni."'";
			    if (!($resultado = $mysqli->query($sql))){
					return 'ERR_CONS_BD';
				}else{
					$aux2;
					while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
						
			    		array_push($toret, $aux['PROFESION']);
			    		array_push($toret, $aux['NUMCUENTA_U']);
			    		array_push($toret, $aux['PAGOS_PEND']);
			    		array_push($toret, $aux['ESPECIAL']);
			    		array_push($toret, $aux['PROTEC_DATOS']);

				}
			}
			return $toret;	
		}

		function modificar(){
			$mysqli=$this->ConectarBD();
			$data=$_SESSION['datosModCliente'];
			$sql = "UPDATE persona SET APELLIDOS ='".$this->apellidos."', CALLE ='".$this->calle."', CIUDAD ='".$this->ciudad."', CP ='".$this->cp."', DNI ='".$this->dni."', EMAIL ='".$this->email."', FECHA_NAC ='".$this->fecha_nac."', NOMBRE ='".$this->nombre."', NUMERO ='".$this->numero."', OBSERVACIONES ='".$this->observaciones."', PISO ='".$this->piso."' WHERE DNI = '".$data[12]."'"; 
			if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}

			$sql = "UPDATE cliente SET DNI_U = '".$this->dni."', ESPECIAL = '".$this->especial."', NUMCUENTA_U = '".$this->numcuenta_u."', PAGOS_PEND = '".$this->pagos_pend."', PROFESION = '".$this->profesion."', PROTEC_DATOS = '".$this->protec_datos."' WHERE DNI_U ='".$data[12]."' ";
			if (!($resultado = $mysqli->query($sql))){
					return 'caca';
				}else{
			    	return "CONFIRM_EDIT_USR";
				}

		}

		function protomodificar(){
			$mysqli=$this->ConectarBD();
			$sql = "SELECT * from persona p, cliente c where p.DNI = c.DNI_U AND (DNI LIKE '".$this->dni."')";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}else{
		    	$obj =mysqli_fetch_row($resultado);
				$_SESSION['datosModCliente']=$obj;
			}
		}


		
		function listarClientes(){
		    $mysqli=$this->ConectarBD();
			$toret=array();
			$sql="SELECT C.DNI_U, p.NOMBRE  FROM cliente AS c
				  JOIN persona AS p ON c.DNI_U = p.DNI WHERE BORRADO <> 1"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return "error";
			}else{
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['DNI']);
		    		array_push($toret, $aux['NOMBRE']);
		    	}
			}
			return $toret;
		}

		

		

		function Borrar(){
			$mysqli=$this->conectarBD();
			$sql = "SELECT * FROM cliente WHERE (DNI_U LIKE '".$this->dni."')";
			$result = $mysqli->query($sql);
			if ($result->num_rows == 1){
				$sql = "UPDATE cliente SET BORRADO ='1' WHERE DNI_U='".$this->dni."'";
				$mysqli->query($sql);

				$sql = "UPDATE persona SET BORRADO ='1' WHERE DNI='".$this->dni."'";
				$mysqli->query($sql);

				return "SUCCESS_DELETE_CLIENTE";
			}else{
        		return "NOEXISTS_CLIEXT";
    		}
		}
	}

	function buscarClientes($busq){
			$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
	
			if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();	
			$sql="SELECT DNI, NOMBRE, APELLIDOS FROM persona WHERE BORRADO = '0' AND  (DNI LIKE '%".$busq."%' OR NOMBRE LIKE '%".$busq."%' OR APELLIDOS LIKE '%".$busq."%')"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows == 0){
		  		return $toret;
		  	}else{

		  		$aux;
		  		while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['DNI']);
		    		array_push($toret, $aux['NOMBRE']);
		    		array_push($toret, $aux['APELLIDOS']);

		    		
		    	}

		  	}
		  	return $toret;
		}
?>