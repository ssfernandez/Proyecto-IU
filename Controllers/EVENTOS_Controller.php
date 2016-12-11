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
	include '../Models/EVENTOS_Model.php';

	
	
	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");

	$descripcionEv=(isset($_REQUEST['descripcionEv']) ? $_REQUEST['descripcionEv']:"");
	$fechaEv = (isset($_REQUEST['fechaEv']) ? $_REQUEST['fechaEv']:"");
	$nombreEv = (isset($_REQUEST['nombreEv']) ? $_REQUEST['nombreEv']:"");
	$precioEv = (isset($_REQUEST['precioEv']) ? $_REQUEST['precioEv']:"");

	$bEvent = (isset($_REQUEST['bEvent']) ? $_REQUEST['bEvent'] : "");

	switch ($acc) {

		case 'Insertar': 
						if($nombreEv <> ''){
							$temp = new Event($descripcionEv,$fechaEv,$nombreEv,$precioEv);
							$_SESSION['mensaje']=$temp->insertar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$temp = new Event($descripcionEv,$fechaEv,$nombreEv,$precioEv);
							$temp->protoinsertar();
							header("Location: ../Views/GestEventos/EVENTOS_ADD_Vista.php");
						}
						
			break;
		case '¿Borrar?': 
						$temp = new Event($descripcionEv,$fechaEv,$nombreEv,$precioEv);
						$me = $temp->protoborrar();
						if($me<>''){
						$_SESSION['mensaje']=$me;
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							header("Location: ../Views/GestEventos/EVENTOS_DELETE_Vista.php?nombreEv=$nombreEv");
						}
						
						
						break;

		case 'Borrar': $temp = new Event($descripcionEv,$fechaEv,$nombreEv,$precioEv);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;
		case 'Consultar': $temp = new Event($descripcionEv,$fechaEv,$nombreEv,$precioEv);
						 $_SESSION['consulta']=$temp->ConsultarEv();
						 header("Location: ../Views/GestEventos/EVENTOS_SHOW_Vista.php?nombreEv=$nombreEv");
			break;
		case 'Modificar':
						if($descripcionEv==''){
							$temp = new Event($descripcionEv,$fechaEv,$nombreEv,$precioEv);
							$auxMod=$temp->protomodificar();
							if($auxMod <> ''){
								$_SESSION['mensaje']=$auxMod;
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}else{
								header("Location: ../Views/GestEventos/EVENTOS_EDIT_Vista.php?nombreEv=$nombreEv");
							}
						}else{
							$temp = new Event($descripcionEv,$fechaEv,$nombreEv,$precioEv);
							$_SESSION['mensaje']=$temp->modificar();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}
			break; 
		case 'Buscar':
			
			$aux=array();
			$w= new Event($descripcionEv,$fechaEv,$nombreEv,$precioEv);
			$aux = $w->buscarEventos($bEvent);		
			$_SESSION['eventos']=$aux;
			 header("Location:../Views/GestEventos/EVENTOS_LIST_Vista.php");			
			break;
		default:
			
			$aux=array();
			$w= new Event($descripcionEv,$fechaEv,$nombreEv,$precioEv);
			$aux = $w->buscarEventos($bEvent);	
			$_SESSION['eventos']=$aux;
			 header("Location:../Views/GestEventos/EVENTOS_LIST_Vista.php");			
			break;
	}
