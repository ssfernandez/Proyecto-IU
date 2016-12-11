<?php
	session_start();
	//Comprobación del idioma seleccionado
	if (isset($_REQUEST['idioma']) && $_REQUEST['idioma']!=''){
	   $_SESSION["idioma"] = strtolower($_REQUEST['idioma']);
	}elseif(isset($_SESSION["idioma"]) &&$_SESSION["idioma"] == ""){
	   $_SESSION["idioma"] = "esp";
	}
	if(isset($_SESSION['connected']) && $_SESSION["connected"] == "false"){
			header("Location: ../index.php");
	}
	$idioma=$_SESSION['idioma'];
	include("../../Assets/languages/".$idioma.".php");
	include '../Models/RESERVAS2_Model.php';



	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");


	$dni1 = (isset($_REQUEST['dni1']) ? $_REQUEST['dni1']:"");
	$fecha = (isset($_REQUEST['fecha']) ? $_REQUEST['fecha']:"");
	$codact = (isset($_REQUEST['codact']) ? $_REQUEST['codact']:"");


	$busr = (isset($_REQUEST['busr']) ? $_REQUEST['busr'] : "");
	$idr = (isset($_REQUEST['idr']) ? $_REQUEST['idr'] : "");

	$_SESSION['idr']=$idr;



	switch ($acc) {

		case 'Insertar':
						if($dni1 <> ''){
						$temp = new Reserva2($fecha,$dni1, $codact);
						$_SESSION['mensaje']=$temp->insertar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

						}else{
							$temp = new Reserva2($fecha,$dni1, $codact);
							$temp->protoinsertar();
							header("Location: ../Views/GestReservas2/RESERVA2_ADD_Vista.php");
						}

			break;
		case '¿Borrar?':
						$temp = new Reserva2($fecha,$dni1, $codact);
						header("Location: ../Views/GestReservas2/RESERVA2_DELETE_Vista.php?idr=$idr");

						break;

		case 'Borrar': 	$temp = new Reserva2($fecha,$dni1, $codact);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new Reserva2($fecha,$dni1, $codact);
						 $_SESSION['consulta']=$temp->ConsultarR();
						 header("Location: ../Views/GestReservas2/RESERVA2_SHOW_Vista.php?idr=$idr");
			break;
		case 'Modificar':
						if($dni1==''){
							$temp = new Reserva2($fecha,$dni1, $codact);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{

								header("Location: ../Views/GestReservas2/RESERVA2_EDIT_Vista.php?idr=$idr");
							}
						}else{
					 		$temp = new Reserva2($fecha,$dni1, $codact);
							$_SESSION['mensaje']=$temp->modificar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break;
		case 'Buscar':

			$aux=array();
			$aux=buscarActividades($busr);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestReservas2/RESERVA2_LIST_Vista.php");
			break;
		default:

			$aux=array();
			$aux=buscarActividades($busr);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestReservas2/RESERVA2_LIST_Vista.php");
			break;
	}
