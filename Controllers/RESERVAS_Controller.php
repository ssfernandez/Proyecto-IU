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
	include '../Models/RESERVAS_Model.php';



	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");


	$dni1 = (isset($_REQUEST['dni1']) ? $_REQUEST['dni1']:"");
	$fecha = (isset($_REQUEST['fecha']) ? $_REQUEST['fecha']:"");
	$codesp = (isset($_REQUEST['codesp']) ? $_REQUEST['codesp']:"");
	$precio = (isset($_REQUEST['precio']) ? $_REQUEST['precio']:"");
	$horai = (isset($_REQUEST['horai']) ? $_REQUEST['horai']:"");
	$horaf= (isset($_REQUEST['horaf']) ? $_REQUEST['horaf']:"");

	$busr = (isset($_REQUEST['busr']) ? $_REQUEST['busr'] : "");
	$idr = (isset($_REQUEST['idr']) ? $_REQUEST['idr'] : "");

	$_SESSION['idr']=$idr;



	switch ($acc) {

		case 'Insertar':
						if($dni1 <> ''){
						$temp = new Reserva($fecha,$dni1, $codesp, $precio,$horai,$horaf);
						$_SESSION['mensaje']=$temp->insertar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

						}else{
							$temp = new Reserva($fecha,$dni1, $codesp, $precio, $horai,$horaf);
							$temp->protoinsertar();
							header("Location: ../Views/GestReservas/RESERVA_ADD_Vista.php");
						}

			break;
		case '¿Borrar?':
						$temp = new Reserva($fecha,$dni1, $codesp, $precio, $horai,$horaf);
						header("Location: ../Views/GestReservas/RESERVA_DELETE_Vista.php?idr=$idr");

						break;

		case 'Borrar': 	$temp = new Reserva($fecha,$dni1, $codesp, $precio, $horai,$horaf);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new Reserva($fecha,$dni1, $codesp, $precio, $horai,$horaf);
						 $_SESSION['consulta']=$temp->ConsultarR();
						 header("Location: ../Views/GestReservas/RESERVA_SHOW_Vista.php?idr=$idr");
			break;
		case 'Modificar':
						if($dni1==''){
							$temp = new Reserva($fecha,$dni1, $codesp, $precio, $horai,$horaf);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{
								header("Location: ../Views/GestReservas/RESERVA_EDIT_Vista.php?idr=$idr");
							}
						}else{
					 			$temp = new Reserva($fecha,$dni1, $codesp, $precio, $horai,$horaf);

							$_SESSION['mensaje']=$temp->modificar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break;
		case 'Buscar':

			$aux=array();
			$aux=buscarReservas($busr);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestReservas/RESERVA_LIST_Vista.php");
			break;
		default:

			$aux=array();
			$aux=buscarReservas($busr);
			$_SESSION['busq']=$aux;
			 header("Location:../Views/GestReservas/RESERVA_LIST_Vista.php");
			break;
	}
