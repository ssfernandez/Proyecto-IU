<?php

	class Horario{

		public $horarioInic=array(); 
		public $horarioFin=array(); 

		function __construct(){
		  	$this->guardarHorario();
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
		    $mysqli = new mysqli("localhost", "root", "iu", "iu");
			
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


		function sacarControladores(){
			$mysqli=$this->ConectarBD();
		    $sql = "select NOM_CONT from controlador";
		    if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    else{
		    	$toret=array();
		    	$aux;
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_CONT']);
		    	}
				return $toret;
			}
		}

		function listarAcciones($controlador){
			$mysqli=$this->ConectarBD();
			$toret=array();
			$sql="select NOM_ACC from acciones where (NOM_CONT LIKE '".$controlador."')"; 
			if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    elseif($resultado->num_rows == 0){
		  		return "error";
			}else{
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['NOM_ACC']);
		    	}
			}
			return $toret;
		}

		
	}
?>