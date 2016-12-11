<?php
	class Caja{ //Puse caja

		public $caja;


		function __construct($caja){
			$this->caja = $caja;
		}


		function getCaja(){
			return $this->Caja;
		}


		function setCaja($caja){
			return $this->caja=$caja;
		}

//arribe cambie todos los caja

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

    //Pasandole el dia a las 3, las2 primeras para crear cierre y la ultima para consultar caja
    //Saca los pagos de ese dia
    function DatosDia(){
  	 		$bdusername=$_SESSION['bduser'];
  			$bdpass=$_SESSION['bdpass'];

  		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");

  		if ($mysqli->connect_errno) {
  			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  			}
  			$toret=array();
  			$sql="SELECT DETALLES, TIPO_TRANS FROM pagos WHERE FECHA_PAG LIKE '%".$this->caja."%'";
  			if (!($resultado = $mysqli->query($sql))){
  			return 'ERR_CONS_BD';
  			}
  		    elseif($resultado->num_rows == 0){
  		  		return 'LABEL_NOELEMS';
  			}else{
					$detalles = "";
					$aux= array();
					while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
						$detalles.= "Los detalles del pago son: ";
						$detalles.= $aux['DETALLES'];
						$detalles.= ". Y es un ";
						if($aux['TIPO_TRANS'] == false){
							$detalles.= "gasto ";
						}else{
							$detalles.= "ingreso ";
						}
					}
					$sql = "SELECT DETALLES_CAJA FROM caja WHERE FECHA LIKE '%".$this->caja."%'";

					if (!$result = $mysqli->query($sql)){
			      return 'ERR_CONN_BD';
			    }
			    else {
						if ($result->num_rows == 0){
							$sql = "INSERT INTO caja (DETALLES_CAJA,FECHA) VALUES ('";
							$sql = $sql."$detalles', '$this->caja')";
							$mysqli->query($sql);
							return 'CONFIMR_INSERT';
						}
						else{
							return 'DATA_EXISTS_ACC';
						}
			    }
  			}
      }
/*
    //Con los datos del dia crea el varchar y lo gurda en caja
    function guardarCierre($detalles,$dia){//le pasamos detalles que es l salida de datosdia y el dia
      $mysqli=$this->ConectarBD();
        $sql = "SELECT DETALLES_CAJA FROM caja WHERE FECHA LIKE '%".$dia."%'";

    if (!$result = $mysqli->query($sql)){
      return 'ERR_CONN_BD';
    }
    else {

      if ($result->num_rows == 0){
        $sql = "INSERT INTO caja (DETALLES_CAJA,FECHA) VALUES ('";
        $sql = $sql."$detalles', '$dia')";
        $mysqli->query($sql);
        return 'CONFIMR_INSERT';
      }
      else{
        return 'DATA_EXISTS_ACC';
      }
    }
    }
		*/
    //Le pasas el dia, accede a esa caja y hace tostring del varchar
    function solicitarMovimientosCaja(){
  	 		$bdusername=$_SESSION['bduser'];
  			$bdpass=$_SESSION['bdpass'];

  		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");

  		if ($mysqli->connect_errno) {
  			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  			}
  			$toret=array();
  			$sql="SELECT DETALLES_CAJA FROM caja WHERE FECHA LIKE '%".$this->caja."%'";
  			if (!($resultado = $mysqli->query($sql))){
  			return 'ERR_CONS_BD';
  			}
  		    elseif($resultado->num_rows == 0){
  		  		return $toret;
  			}else{
  		    	$aux= array();
  		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
  		    		array_push($toret, $aux['DETALLES_CAJA']);
  		    	}
  			}

  			return $toret;
  		}

			function borrar(){
				$mysqli=$this->ConectarBD();
				$controlador=$_SESSION['contrdeacc'];
				$sql = "DELETE FROM caja WHERE FECHA LIKE '%".$this->caja."%'";
				if (!$result = $mysqli->query($sql)){
					return 'ERR_CONN_BD';
				}
				return 'CONFIRM_DELETE_CAJA';
			}

		}


?>
