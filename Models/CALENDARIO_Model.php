<?php

	class Calendario{

		public $horarioInic=array(); 
		public $horarioFin=array(); 
		public $dia;
		public $hini;
		public $hfin;
		public $dni;
		public $activ;


		function __construct($dia,$hini,$hfin,$dni,$activ){
		  	$this->guardarHorario();
		  	$this->dia=$dia;
		  	$this->hini=$hini;
		  	$this->hfin=$hfin;
		  	$this->dni=$dni;
		  	$this->activ=$activ;
		 }

		function getHorarioInic(){
			return $this->horarioInic;
		}

		function getTramoHorario(){
			$toret=array();
			for ($i=0; $i < count($this->horarioInic); $i++) { 
				array_push($toret, $this->horarioInic[$i]."-".$this->horarioFin[$i]);
			}
			return $toret;
		}

		function getHorarioFin(){
			return $this->horarioFin;
		}

		function setHorario($horario){
			return $this->horario=$horario;
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
		function guardarHorario(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select HORA_INI,HORA_FIN from horario";
		    if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    else{
		    	$toretI=array();
		    	$toretF=array();
		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toretI, $aux['HORA_INI']);
		    		array_push($toretF, $aux['HORA_FIN']);
		    	}
				$this->horarioInic=$toretI;
				$this->horarioFin=$toretF;
			}
		}
		

		function getDatosDia($aux,$dia){
			$dias=array('lunes','martes','miercoles','jueves','viernes','sabado','domingo');
			$mysqli=$this->ConectarBD();
    		$sql = "SELECT C.NOMBRE_A, C.NOMBRE_ES, C.DIA, C.HORA_INI, C.HORA_FIN, C.COD_ACTIV FROM calendario C, actividades A WHERE C.COD_ACTIV = A.COD_ACTIV AND '".$aux."' BETWEEN A.FECHA_INIC AND A.FECHA_FIN AND C.DIA='".$dias[$dia]."'";
		    if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    else{
		    	$toret=array();
		    	if ($resultado->num_rows >= 1){
			    	$aux;
			    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			    		array_push($toret, $aux['NOMBRE_A']);
			    		array_push($toret, $aux['NOMBRE_ES']);
			    		array_push($toret, $aux['DIA']);
			    		array_push($toret, $aux['HORA_INI']);
			    		array_push($toret, $aux['HORA_FIN']);
			    		array_push($toret, $aux['COD_ACTIV']);
			    	}
			    }
				return $toret;
			}
		    	
		}	   

		function buscarActividad(){
			$mysqli=$this->ConectarBD();
		    $sql = "SELECT C.NOMBRE_A, C.NOMBRE_ES, C.DIA, C.HORA_INI, C.HORA_FIN, C.DNI, P.NOMBRE  FROM calendario C, persona P WHERE C.DNI=P.DNI AND C.COD_ACTIV=".$this->activ." AND C.HORA_INI='".$this->hini."' AND C.HORA_FIN='".$this->hfin."'";
		    if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    else {
		    	$toret=array();
		    	if($resultado->num_rows >= 1){
			    	$aux;
			    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			    			array_push($toret, $aux['NOMBRE_A']);
				    		array_push($toret, $aux['NOMBRE_ES']);
				    		array_push($toret, $aux['DIA']);
				    		array_push($toret, $aux['HORA_INI']);
				    		array_push($toret, $aux['HORA_FIN']);
				    		array_push($toret, $aux['DNI']);
				    		array_push($toret, $aux['NOMBRE']);
			    	}
			    }

			    $sql = "SELECT P.NOMBRE  FROM persona P, asistencia_usu A WHERE ".$this->activ."=A.COD_ACTIV AND A.DNI=P.DNI ";
			    if (!($resultado = $mysqli->query($sql))){
				return 'Error en la consulta sobre la base de datos';
				}
			    else{
			    	$toretUsu=array();
			    	if($resultado->num_rows >= 1){
				    	$aux;
				    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				    			array_push($toretUsu, $aux['NOMBRE']);
				    	}
			    	}
			    	$_SESSION['cli_activ_cal']=$toretUsu;
				}
				return $toret;
			}

		}
		function protomodificar(){
			$mysqli=$this->ConectarBD();
		    $sql = "SELECT C.NOMBRE_A, C.NOMBRE_ES, C.DIA, C.HORA_INI, C.HORA_FIN, C.DNI, P.NOMBRE  FROM calendario C, persona P WHERE C.DNI=P.DNI AND C.COD_ACTIV=".$this->activ."";
		    if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    else {
		    	$toret=array();
		    	if($resultado->num_rows >= 1){
			    	$aux;
			    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			    			array_push($toret, $aux['NOMBRE_A']);
				    		array_push($toret, $aux['NOMBRE_ES']);
				    		array_push($toret, $aux['DIA']);
				    		array_push($toret, $aux['HORA_INI']);
				    		array_push($toret, $aux['HORA_FIN']);
				    		array_push($toret, $aux['DNI']);
				    		array_push($toret, $aux['NOMBRE']);
			    	}
			    	$_SESSION['data_activ_cal']=$toret;
			    }

			    $sql = "SELECT P.NOMBRE, P.DNI  FROM persona P, asistencia_moni A WHERE A.DNI=P.DNI ";
			    if (!($resultado = $mysqli->query($sql))){
				return 'Error en la consulta sobre la base de datos';
				}
			    else{
			    	$toretUsu=array();
			    	if($resultado->num_rows >= 1){
				    	$aux;
				    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				    			array_push($toretUsu, $aux['NOMBRE']);
				    			array_push($toretUsu, $aux['DNI']);
				    	}
			    	}
			    	$_SESSION['moni_activ_cal']=$toretUsu;
				}

				$sql = "SELECT HORA_INI, HORA_FIN  FROM horario WHERE HORA_INI NOT LIKE '".$hini."' AND HORA_FIN NOT LIKE '".$hfin."' ";
			    if (!($resultado = $mysqli->query($sql))){
				return 'Error en la consulta sobre la base de datos';
				}
			    else{
			    	$toretH=array();
			    	if($resultado->num_rows >= 1){
				    	$aux;
				    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				    			$string=$aux['HORA_INI']."-".$aux['HORA_FIN'];
				    			array_push($toretH, $string);
				    	}
			    	}
				$_SESSION['horas_activ_cal']=$toretH;
			}
				return $toret;
			}
		}

		function modificar(){
			$mysqli=$this->ConectarBD();
			$hAnt=$_SESSION['hAnt'];
			$sql= "UPDATE calendario SET DIA ='".$this->dia."', DNI ='".$this->dni."', HORA_INI ='".$this->hini."', HORA_FIN='".$this->hfin."' WHERE COD_ACTIV='".$this->activ."' AND HORA_INI='".$hAnt[0]."' AND HORA_FIN='".$hAnt[1]."'";
				if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
				}else{
			    	return "CONFIRM_EDIT_CALENDARIO";
				}
		 	
		}


		
	}
?>