<?php

	/**
	* HAY QUE VER POR QUE CAMBIO ANOMB, Y QUE LE METO
	*/
	class Asistencia{
		public $dni;
		public $dia;
		public $hora;
		public $cod;
		public $nom;
		public $ape;
		public $asis;

		function __construct($dni,$dia,$hora,$cod,$nom,$ape,$asis){
			$this->dni=$dni;
			$this->dia=$dia;
			$this->hora=$hora;
			$this->cod=$cod;
			$this->nom=$nom;
			$this->ape=$ape;
			$this->asis=$asis;
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

		function getDia(){
			return $this->dia;
		}

		function getHora(){
			return $this->hora;
		}

		function getCod(){
			return $this->cod;
		}

		function getNom(){
			return $this->nom;
		}

		function getApe(){
			return $this->ape;
		}

		function getAsis(){
			return $this->ais;
		}

		function borrar(){
			$mysqli=$this->ConectarBD();

			$sql="SELECT A.FECHA,A.HORA,AC.NOMBRE,P.NOMBRE,P.APELLIDOS,A.ASISTENCIA, AC.COD_ACTIV AS COD, P.DNI AS PDNI
						FROM persona P, cliente C, asistencia_usu A, actividades AC
						WHERE P.DNI=C.DNI_U AND C.DNI_U=A.DNI AND A.COD_ACTIV=AC.COD_ACTIV AND A.FECHA LIKE '%".$this->dia."%'
						AND A.HORA LIKE '%".$this->hora."%' AND AC.NOMBRE LIKE '%".$this->cod."%' AND P.NOMBRE LIKE '%".$this->nom."%'
						AND P.APELLIDOS LIKE '%".$this->ape."%'";

						if (!($resultado = $mysqli->query($sql))){
							return 'ERR_CONS_BD';
						}

						if($resultado->num_rows != 0){

							$toret=array();
							$aux=array();
							while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
								array_push($toret, $aux['COD']);
								array_push($toret, $aux['PDNI']);
							}

							$sql = "DELETE FROM asistencia_usu WHERE FECHA LIKE '%".$this->dia."%'
							AND HORA LIKE '%".$this->hora."%' AND COD_ACTIV LIKE '%".$toret[0]."%' AND DNI LIKE '%".$toret[1]."%'";

							if (!$result = $mysqli->query($sql)){
								return 'ERR_CONN_BD';
							}
							return 'CONFIRM_DELETE_ASIS';
						}else{
							$sql="SELECT A.FECHA,A.HORA,AC.NOMBRE,P.NOMBRE,P.APELLIDOS,A.ASISTENCIA,AC.COD_ACTIV AS COD, P.DNI AS PDNI
				            FROM persona P, monitor M, asistencia_moni A, actividades AC
				            WHERE P.DNI=M.DNI_MONITOR AND M.DNI_MONITOR=A.DNI AND A.COD_ACTIV=AC.COD_ACTIV AND A.FECHA LIKE '%".$this->dia."%'
										AND A.HORA LIKE '%".$this->hora."%' AND AC.NOMBRE LIKE '%".$this->cod."%' AND P.NOMBRE LIKE '%".$this->nom."%'
										AND P.APELLIDOS LIKE '%".$this->ape."%'";

										if (!($resultado = $mysqli->query($sql))){
											return 'ERR_CONS_BD';
										}

										$toret=array();
										$aux=array();
										while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
											array_push($toret, $aux['COD']);
											array_push($toret, $aux['PDNI']);
										}

										$sql = "DELETE FROM asistencia_moni WHERE FECHA LIKE '%".$this->dia."%'
										AND HORA LIKE '%".$this->hora."%' AND COD_ACTIV LIKE '%".$toret[0]."%' AND DNI LIKE '%".$toret[1]."%'";

										if (!$result = $mysqli->query($sql)){
											return 'ERR_CONN_BD';
										}
										return 'CONFIRM_DELETE_ASIS';

						}
		}


		function sacarAsistencia(){
			$mysqli=$this->ConectarBD();

				$sql="SELECT A.FECHA AS FCLI,A.HORA AS HCLI, AC.NOMBRE AS ANOM, P.NOMBRE AS PNOM, P.APELLIDOS AS PAPE, A.ASISTENCIA AS ASI
	            FROM persona P, cliente C, asistencia_usu A, actividades AC
	            WHERE P.DNI=C.DNI_U AND C.DNI_U=A.DNI AND A.COD_ACTIV=AC.COD_ACTIV AND A.FECHA LIKE '%".$this->dia."%'
							AND A.HORA LIKE '%".$this->hora."%' AND AC.NOMBRE LIKE '%".$this->cod."%' AND P.NOMBRE LIKE '%".$this->nom."%'
							AND P.APELLIDOS LIKE '%".$this->ape."%'";

		  if (!($resultado = $mysqli->query($sql))){
				return 'ERR_CONS_BD';
			}

			$toret=array();

			if($resultado->num_rows != 0){

		    	$aux=array();
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['FCLI']);
		    		array_push($toret, $aux['HCLI']);
						array_push($toret, $aux['ANOM']);
						array_push($toret, $aux['PNOM']);
						array_push($toret, $aux['PAPE']);
						array_push($toret, $aux['ASI']);
		    	}
				return $toret;
			}else{
				$sql="SELECT A.FECHA AS FMON,A.HORA AS HMONI, AC.NOMBRE AS ANOMM, P.NOMBRE AS MNOM, P.APELLIDOS AS PAPEM, A.ASISTENCIA AS ASIM
	            FROM persona P, monitor M, asistencia_moni A, actividades AC
	            WHERE P.DNI=M.DNI_MONITOR AND M.DNI_MONITOR=A.DNI AND A.COD_ACTIV=AC.COD_ACTIV AND A.FECHA LIKE '%".$this->dia."%'
							AND A.HORA LIKE '%".$this->hora."%' AND AC.NOMBRE LIKE '%".$this->cod."%' AND P.NOMBRE LIKE '%".$this->nom."%'
							AND P.APELLIDOS LIKE '%".$this->ape."%'";

							if (!($resultado = $mysqli->query($sql))){
								return 'ERR_CONS_BD';
							}

				    	$aux = array();
				    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				    		array_push($toret, $aux['FMON']);
				    		array_push($toret, $aux['HMONI']);
								array_push($toret, $aux['ANOM']);
								array_push($toret, $aux['MNOM']);
								array_push($toret, $aux['PAPEM']);
								array_push($toret, $aux['ASIM']);
				    	}
						return $toret;
			}


		}


		function solicitarAsistencias(){
			$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		    $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");

		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}

			$toret=array();
			$sql="SELECT A.FECHA AS FCLI,A.HORA AS HCLI, AC.NOMBRE AS ANOM, P.NOMBRE AS PNOM, P.APELLIDOS AS PAPE, A.ASISTENCIA AS ASI
            FROM persona P, cliente C, asistencia_usu A, actividades AC
            WHERE P.DNI=C.DNI_U AND C.DNI_U=A.DNI AND A.COD_ACTIV=AC.COD_ACTIV AND A.FECHA LIKE '%".$this->dia."%'";
			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    if($resultado->num_rows != 0){
					$aux= array();
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['FCLI']);
						array_push($toret, $aux['HCLI']);
		    		array_push($toret, $aux['ANOM']);
            array_push($toret, $aux['PNOM']);
            array_push($toret, $aux['PAPE']);
						array_push($toret, $aux['ASI']);
		    	}
			}

			$sql2="SELECT A.FECHA AS FMON,A.HORA AS HMONI, AC.NOMBRE AS ANOMM, P.NOMBRE AS MNOM, P.APELLIDOS AS PAPEM, A.ASISTENCIA AS ASIM
            FROM persona P, monitor M, asistencia_moni A, actividades AC
            WHERE P.DNI=M.DNI_MONITOR AND M.DNI_MONITOR=A.DNI AND A.COD_ACTIV=AC.COD_ACTIV AND A.FECHA LIKE '%".$this->dia."%'";

			if (!($resultado2 = $mysqli->query($sql2))){
			return 'ERR_CONS_BD';
		}
		    else if($resultado2->num_rows == 0){
		  		return $toret;
			}
			else{
		    	$aux2= array();
		    	while($aux2 = mysqli_fetch_array($resultado2, MYSQLI_ASSOC)){
						array_push($toret, $aux2['FMON']);
						array_push($toret, $aux2['HMONI']);
		    		array_push($toret, $aux2['ANOMM']);
            array_push($toret, $aux2['MNOM']);
            array_push($toret, $aux2['PAPEM']);
						array_push($toret, $aux2['ASIM']);
		    	}

			}
			return $toret;
		}

		//MIRAR AQUI, TENGO QUE INSERTAR DEPENDIENDO DE LA TABLA.

		function insertarAsis(){
			$mysqli=$this->ConectarBD();

			$sql = "SELECT * FROM actividades WHERE DNI LIKE '%".$this->dni."%' AND COD_ACTIV LIKE '%".$this->cod."%'";

			if (!$result = $mysqli->query($sql)){
				return 'ERR_CONN_BD';
			}
			if ($result->num_rows == 0){
				$sql = "SELECT * FROM asistencia_usu WHERE FECHA LIKE '%".$this->dia."%'
 				AND COD_ACTIV LIKE '%".$this->cod."%' AND DNI LIKE '%".$this->dni."%'
				AND HORA LIKE '%".$this->hora."%'";

				if (!$result = $mysqli->query($sql)){
					return 'ERR_CONN_BD';
				}
				else {

					if ($result->num_rows == 0){
						$sql = "INSERT INTO asistencia_usu (FECHA, ASISTENCIA, DNI, COD_ACTIV,HORA) VALUES ('";
						$sql = $sql."$this->dia', '$this->asis', '$this->dni', '$this->cod', '$this->hora')";
						$mysqli->query($sql);
						return 'CONFIMR_INSERT';
					}
					else{
						return 'DATA_EXISTS_ASIS';
					}
				}
			}else{
				$sql = "SELECT * FROM asistencia_moni WHERE FECHA LIKE '%".$this->dia."%'
				AND COD_ACTIV LIKE '%".$this->cod."%' AND DNI LIKE '%".$this->dni."%'
				AND HORA LIKE '%".$this->hora."%'";

				if (!$result = $mysqli->query($sql)){
					return 'ERR_CONN_BD';
				}
				else {

					if ($result->num_rows == 0){
						$sql = "INSERT INTO asistencia_moni (FECHA, ASISTENCIA, DNI, COD_ACTIV,HORA) VALUES ('";
						$sql = $sql."$this->dia', '$this->asis', '$this->dni', '$this->cod', '$this->hora')";
						$mysqli->query($sql);
						return 'CONFIMR_INSERT';
					}
					else{
						return 'DATA_EXISTS_ASIS';
					}
				}
			}
		}

		function protoinsertar(){
				$aux=$this->consultarActividades();
		    	$_SESSION['actis'] = $aux;

				$aux1=$this->consultarDNIS();
				$_SESSION['dnis'] = $aux1;
			}

			function ConsultarDNIS(){

				$bdusername=$_SESSION['bduser'];
				$bdpass=$_SESSION['bdpass'];

				$mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");

				if ($mysqli->connect_errno) {
				echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				}

					$toret=array();

			    	$sql = "SELECT DNI from persona P";
			    	if (!($resultado = $mysqli->query($sql))){
							return 'ERR_CONS_BD';
				  	}
			    	else{
			    		if ($resultado->num_rows >= 1){
								while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			    			array_push($toret, $aux['DNI']);
			    		}
					    return $toret;
			 	   	}
					}
				}


		function ConsultarActividades(){

			$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		  $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");

			if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}

				$toret=array();

					$sql = "SELECT COD_ACTIV AS COD FROM actividades";
					if (!($resultado = $mysqli->query($sql))){
						return 'ERR_CONS_BD';
					}
					else{
						if ($resultado->num_rows >= 0){
							while($aux = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
							array_push($toret, $aux['COD']);
						}
						return $toret;
					}
				}
			}


			function modificar(){
				$mysqli=$this->ConectarBD();

				$sql="SELECT A.FECHA,A.HORA,AC.NOMBRE,P.NOMBRE,P.APELLIDOS,A.ASISTENCIA, AC.COD_ACTIV AS COD, P.DNI AS PDNI
							FROM persona P, cliente C, asistencia_usu A, actividades AC
							WHERE P.DNI=C.DNI_U AND C.DNI_U=A.DNI AND A.COD_ACTIV=AC.COD_ACTIV AND A.FECHA LIKE '%".$this->dia."%'
							AND A.HORA LIKE '%".$this->hora."%' AND AC.NOMBRE LIKE '%".$this->cod."%' AND P.NOMBRE LIKE '%".$this->nom."%'
							AND P.APELLIDOS LIKE '%".$this->ape."%'";

							if (!($resultado = $mysqli->query($sql))){
								return 'ERR_CONS_BD';
							}

							if($resultado->num_rows != 0){

								$toret=array();
								$aux=array();
								while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
									array_push($toret, $aux['COD']);
									array_push($toret, $aux['PDNI']);
								}

								$sql = "UPDATE asistencia_usu SET ASISTENCIA = '%".$this->asis."%' WHERE FECHA LIKE '%".$this->dia."%'
								AND COD_ACTIV LIKE '%".$toret[0]."%' AND DNI LIKE '%".$toret[1]."%'
								AND HORA LIKE '%".$this->hora."%'";

								if (!$result = $mysqli->query($sql)){
									return 'ERR_CONN_BD';
								}
								return 'CONFIRM_EDIT_ASI';
							}else{
								$sql="SELECT A.FECHA,A.HORA,AC.NOMBRE,P.NOMBRE,P.APELLIDOS,A.ASISTENCIA,AC.COD_ACTIV AS COD, P.DNI AS PDNI
					            FROM persona P, monitor M, asistencia_moni A, actividades AC
					            WHERE P.DNI=M.DNI_MONITOR AND M.DNI_MONITOR=A.DNI AND A.COD_ACTIV=AC.COD_ACTIV AND A.FECHA LIKE '%".$this->dia."%'
											AND A.HORA LIKE '%".$this->hora."%' AND AC.NOMBRE LIKE '%".$this->cod."%' AND P.NOMBRE LIKE '%".$this->nom."%'
											AND P.APELLIDOS LIKE '%".$this->ape."%'";

											if (!($resultado = $mysqli->query($sql))){
												return 'ERR_CONS_BD';
											}

											$toret=array();
											$aux=array();
											while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
												array_push($toret, $aux['COD']);
												array_push($toret, $aux['PDNI']);
											}

											$sql = "UPDATE asistencia_moni SET ASISTENCIA = '%".$this->asis."%' WHERE FECHA LIKE '%".$this->dia."%'
											AND COD_ACTIV LIKE '%".$toret[0]."%' AND DNI LIKE '%".$toret[1]."%'
											AND HORA LIKE '%".$this->hora."%'";

											if (!$result = $mysqli->query($sql)){
												return 'ERR_CONN_BD';
											}
											return 'CONFIRM_EDIT_ASI';

							}
			}

			}

function listarAlertas($busq){
			$bdusername=$_SESSION['bduser'];
			$bdpass=$_SESSION['bdpass'];

		  $mysqli = new mysqli("localhost", $bdusername, $bdpass, "iu2016_grupo6");

			if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$toret=array();

			$sql="SELECT A.FECHA AS FCLI,A.HORA AS HCLI, AC.NOMBRE AS ANOM, P.NOMBRE AS PNOM, P.APELLIDOS PAP
						FROM persona P, cliente C, asistencia_usu A, actividades AC
						WHERE P.DNI=C.DNI_U AND C.DNI_U=A.DNI AND A.COD_ACTIV=AC.COD_ACTIV AND C.ESPECIAL=1 AND A.ASISTENCIA=0
						AND FECHA LIKE '%".$busq."%'";

			if (!($resultado = $mysqli->query($sql))){
			return 'ERR_CONS_BD';
			}
		    elseif($resultado->num_rows != 0){
					$aux= array();
		    	while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
		    		array_push($toret, $aux['FCLI']);
						array_push($toret, $aux['HCLI']);
						array_push($toret, $aux['ANOM']);
						array_push($toret, $aux['PNOM']);
						array_push($toret, $aux['PAP']);
			 }
		 }
			$sql="SELECT A.FECHA AS FMON,A.HORA AS HMON, AC.NOMBRE AS ANOMM, P.NOMBRE AS PNOMM, P.APELLIDOS AS PAPP
            FROM persona P, monitor M, asistencia_moni A, actividades AC
            WHERE P.DNI=M.DNI_MONITOR AND M.DNI_MONITOR=A.DNI AND A.COD_ACTIV=AC.COD_ACTIV AND A.ASISTENCIA=0
						AND FECHA LIKE '%".$busq."%'";

			if (!($resultado = $mysqli->query($sql))){
					return 'ERR_CONS_BD';
			}
			elseif($resultado->num_rows == 0){
					return $toret;
				}else{
						$aux= array();
						while($aux = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
							array_push($toret, $aux['FMON']);
							array_push($toret, $aux['HMON']);
					  	array_push($toret, $aux['ANOMM']);
			        array_push($toret, $aux['PNOMM']);
			        array_push($toret, $aux['PAPP']);
						}
				}

			return $toret;
		}
