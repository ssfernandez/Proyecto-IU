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
	include("../Assets/languages/".$idioma.".php");
	include '../Models/CAJA_Model.php'; //PUSE CAJA


	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$caja = (isset($_REQUEST['caja']) ? $_REQUEST['caja']:"");



	switch ($acc) {

		case 'Insertar':
						if($caja <> ''){
							$temp = new Caja($caja);
							$_SESSION['mensaje']=$temp->DatosDia();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$temp = new Caja($caja);
							header("Location: ../Views/GestCaja/CAJA_ADD_Vista.php");
						}

			break;

		case 'Consultar':$temp = new Caja($caja);
						 $_SESSION['consulta']=$temp->solicitarMovimientosCaja();
						 header("Location: ../Views/GestCaja/CAJA_SHOW_Vista.php?caja=$caja");
			break;

		case 'Buscar':
							header("Location: ../Views/GestCaja/CAJA_SELECT_Vista.php");
			break;

		case '¿Borrar?': $temp = new Caja($caja);
						$_SESSION['consulta']=$temp->solicitarMovimientosCaja();
						 header("Location: ../Views/GestCaja/CAJA_DELETE_Vista.php?caja=$caja");

			break;

			case 'Borrar': $temp = new Caja($caja);
							$_SESSION['mensaje']=$temp->borrar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

	}
