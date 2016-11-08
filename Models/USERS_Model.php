<?php
	class User{

		public $user; 
		public $passwd;   
		public $permissions; 
		

		function __construct($user, $passwd, $permissions){
		    $this->user = $user;
			$this->passwd = $passwd;  
			$this->permissions = $permissions;  
		}


		function getUser(){
			return $this->usergit;
		}

		function getPermissions(){
			return $this->permissions;
		}

		function setPermissions($perm){
			return $this->permissions=$perm;
		}


		function ConectarBD(){
		    $mysqli = new mysqli("localhost", "root", "", "iu");
			
			if ($mysqli->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			return $mysqli;
		}


		
		//funcion Consultar: hace una búsqueda en la tabla jugador con
		//los datos de dni y nombre. Si van vacios devuelve todos
		function Consultar(){
		    $mysqli=$this->ConectarBD();
		    $sql = "select user, passwd, perm from USERS where (user LIKE '%".$this->user."%') AND (passwd LIKE '%".$this->passwd."%')";
		    if (!($resultado = $mysqli->query($sql))){
			return 'Error en la consulta sobre la base de datos';
			}
		    else{
			return $resultado;
			}
		}

		function addPermissions(){
			$result = $this->Consultar();
			if ($result->num_rows >= 1){
				$toret=array();

				$obj =mysqli_fetch_array($result, MYSQLI_ASSOC);
				foreach ($obj as $key => $value) {
			 		 	array_push($toret, $value);
					}
				//Si los permisos estan en tercera posicion
				$this->permissions = $toret[2];
			}else{
				
			}
		}

		function checkUser(){
			$result = $this->Consultar();
			if ($result->num_rows >= 1){
				return true;
			}else{
				return false;
			}
			
		}
	}

?>