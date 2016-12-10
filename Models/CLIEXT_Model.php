<?php
	class CliExt{

		public $nombre; 
		public $email;   
		public $dni;
		 
		

		function __construct($email, $dni, $nombre){
		    $this->nombre = $nombre;
			$this->email = $email;
			$this->dni = $dni; 
		}


		function getUser(){
			return $this->user;
		}

		function getEmail(){
			return $this->email;
		}

		function getDni(){
			return $this->dni;
		}
	

		function setUser($user){
			return $this->user=$user;
		}

		function setEmail($email){
			return $this->email=$email;
		}

		function setDni($dni){
			return $this->dni=$dni;
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
	        $sql = "SELECT * FROM cliente_ext WHERE DNI = '".$this->dni."'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD'; 	
			}
			else {
		
				if ($result->num_rows == 0){
					$sql = "INSERT INTO cliente_ext (EMAIL, DNI, NOMBRE, BORRADO) VALUES ('";
					$sql = $sql."$this->email', '$this->dni', '$this->nombre', '0')";	
					$mysqli->query($sql);
					return 'CONFIMR_INSERT';
				}
				else{
					return 'DATA_EXISTS_CLIEXT';
				}
			}
		}


		//funcion Consultar: hace una búsqueda en la tabla usuario con
		//los datos de usuario y contraseña. Si van vacios devuelve todos.
		function ConsultarCliExt(){
		    $toret=array();
		    $mysqli=$this->ConectarBD();
		    $sql = "select EMAIL, DNI, NOMBRE from cliente_ext where (DNI LIKE '".$this->dni."')";
		    if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    else{
		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['DNI']);
		    		array_push($toret, $aux['NOMBRE']);
		    		array_push($toret, $aux['EMAIL']);
		    	}
				return $toret;
			}
		}

		function protomodificar(){
			$mysqli=$this->ConectarBD();
			$sql = "select * from cliente_ext where (DNI LIKE '".$this->dni."')";
		    if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}else{
		    	$obj =mysqli_fetch_row($resultado);
				$_SESSION['datosModCliExt']=$obj;
			}
		}

		function modificar(){
			$mysqli=$this->ConectarBD();
			$data=$_SESSION['datosModCliExt'];
			$sql= "UPDATE cliente_ext SET EMAIL ='".$this->email."', DNI ='".$this->dni."', NOMBRE ='".$this->nombre."' WHERE DNI='".$data[1]."'" ;
				if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
				}else{
					$sql = "SELECT * FROM insc_ev WHERE (DNI LIKE '".$data[1]."')";
		  			$result = $mysqli->query($sql);
		  			if ($result->num_rows >= 1){
		        		$sql = "UPDATE insc_ev SET DNI ='".$this->dni."' WHERE DNI='".$data[1]."'" ;
		        		$mysqli->query($sql);
		        	}

	        		$sql = "SELECT * FROM pagos WHERE (DNI_CLIENTE_EXT LIKE '".$data[1]."')";
	  				$result = $mysqli->query($sql);
	  				if ($result->num_rows >= 1){
		        		$sql = "UPDATE pagos SET DNI_CLIENTE_EXT ='".$this->dni."' WHERE DNI_CLIENTE_EXT='".$data[1]."'" ;
		        		$mysqli->query($sql);
		        	}

	        		$sql = "SELECT * FROM reserva WHERE (DNI_CLIENTE_EXT LIKE '".$data[1]."')";
					$result = $mysqli->query($sql);
					if ($result->num_rows >= 1){
		        		$sql = "UPDATE reserva SET DNI_CLIENTE_EXT ='".$this->dni."' WHERE DNI_CLIENTE_EXT='".$data[1]."'" ;
		        		$mysqli->query($sql);
		        	}
	        		$sql = "SELECT * FROM tel_cli_ext WHERE (DNI_CLIENTE_EXT LIKE '".$data[1]."')";
					$result = $mysqli->query($sql);
					if ($result->num_rows >= 1){
		        		$sql = "UPDATE tel_cli_ext SET  DNI_CLIENTE_EXT ='".$this->dni."' WHERE DNI_CLIENTE_EXT='".$data[1]."'" ;
		        		$mysqli->query($sql);
	    			}
			    	return "CONFIRM_EDIT_CLIEXT";
				}
		 	
		}

		function borrar(){
			$mysqli=$this->conectarBD();
			$sql = "SELECT * FROM cliente_ext WHERE (DNI LIKE '".$this->dni."')";
  			$result = $mysqli->query($sql);
  			if ($result->num_rows == 1){
        		$sql = "UPDATE cliente_ext SET BORRADO ='1' WHERE DNI='".$this->dni."'" ;
        		$mysqli->query($sql);

        		$sql = "SELECT * FROM insc_ev WHERE (DNI LIKE '".$this->dni."')";
	  			$result = $mysqli->query($sql);
	  			if ($result->num_rows >= 1){
	        		$sql = "DELETE FROM insc_ev WHERE DNI='".$this->dni."'" ;
	        		$mysqli->query($sql);
	        	}

        		$sql = "SELECT * FROM pagos WHERE (DNI_CLIENTE_EXT LIKE '".$this->dni."')";
  				$result = $mysqli->query($sql);
  				if ($result->num_rows >= 1){
	        		$sql = "DELETE FROM pagos WHERE DNI_CLIENTE_EXT='".$this->dni."'" ;
	        		$mysqli->query($sql);
	        	}

        		$sql = "SELECT * FROM reserva WHERE (DNI_CLIENTE_EXT LIKE '".$this->dni."')";
				$result = $mysqli->query($sql);
				if ($result->num_rows >= 1){
	        		$sql = "DELETE FROM reserva WHERE DNI_CLIENTE_EXT='".$this->dni."'" ;
	        		$mysqli->query($sql);
	        	}
        		$sql = "SELECT * FROM tel_cli_ext WHERE (DNI_CLIENTE_EXT LIKE '".$this->dni."')";
				$result = $mysqli->query($sql);
				if ($result->num_rows >= 1){
	        		$sql = "DELETE FROM tel_cli_ext WHERE DNI_CLIENTE_EXT='".$this->dni."'" ;
	        		$mysqli->query($sql);
    			}
    			return "CONFIRM_DELETE_CLIEXT";
    		}else{
        		return "NOEXISTS_CLIEXT";
    		}

		}

		
}

//funcion buscarUsuarios: hace una búsqueda en la tabla cuenta de
		//los usuarios con un usuario o perfil entrante. Esta funcion se puede poner externa a la clase para 
		//no tener que crear una clase modelo de usuario sin tener atributos de usuario   
		function buscarClientesExternos($busq){
	 		$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");
	
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();
			$sql="SELECT EMAIL, DNI, NOMBRE FROM cliente_ext WHERE BORRADO = '0' AND (EMAIL LIKE '%".$busq."%' OR DNI LIKE '%".$busq."%' OR NOMBRE LIKE '%".$busq."%')"; 
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
		    		array_push($toret, $aux['EMAIL']);
		    	}
			}
			return $toret;
		}


?>

