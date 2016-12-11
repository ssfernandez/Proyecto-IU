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
	include '../Models/ASISTENCIAS_Model.php';



	$dni = (isset($_REQUEST['dni']) ? $_REQUEST['dni']:"");
	$dia = (isset($_REQUEST['dia']) ? $_REQUEST['dia']:"");
	$hora = (isset($_REQUEST['hora']) ? $_REQUEST['hora']:"");
	$cod = (isset($_REQUEST['cod']) ? $_REQUEST['cod']:"");
	$nom = (isset($_REQUEST['nom']) ? $_REQUEST['nom']:"");
	$ape = (isset($_REQUEST['ape']) ? $_REQUEST['ape']:"");
	$asis = (isset($_REQUEST['asis']) ? $_REQUEST['asis']:"");

	$av = (isset($_REQUEST['av']) ? $_REQUEST['av'] : "");

	$acc = (isset($_REQUEST['acc']) ? $_REQUEST['acc'] : "");


	switch ($acc) {

		case 'Insertar':
						if($dia <> ''){
							$temp = new Asistencia($dni,$dia,$hora,$cod,$nom,$ape,$asis);
							$_SESSION['mensaje']=$temp->insertarAsis();
							header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
						}else{
							$temp = new Asistencia($dni,$dia,$hora,$cod,$nom,$ape,$asis);
							$temp->protoinsertar();
							header("Location: ../Views/GestAsistencias/ASISTENCIAS_ADD_Vista.php");
						}

			break;

			case 'Modificar':

							if($asis==''){
								$temp = new Asistencia($dni,$dia,$hora,$cod,$nom,$ape,$asis);
									header("Location: ../Views/GestAsistencias/ASISTENCIAS_EDIT_Vista.php?dia='.$dia.'&hora='.$hora.'&cod='.$cod.'&nom='.$nom.'&ape='.$ape.'");
								}else{

								$temp = new Asistencia($dni,$dia,$hora,$cod,$nom,$ape,$asis);
								$_SESSION['mensaje']=$temp->modificar();
								header('Location: ../Views/Mensaje/MENSAJE_Vista.php');
							}
				break;

		case '¿Borrar?': $temp = new Asistencia($dni,$dia,$hora,$cod,$nom,$ape,$asis);
						$_SESSION['consulta']=$temp->sacarAsistencia();
							header("Location: ../Views/GestAsistencias/ASISTENCIAS_DELETE_Vista.php?&dia='.$dia.'&hora='.$hora.'&cod='.$cod.'&nom='.$nom.'&ape='.$ape.'");

			break;

		case 'Borrar': $temp = new Asistencia($dni,$dia,$hora,$cod,$nom,$ape,$asis);
						$_SESSION['mensaje']=$temp->borrar();
						header('Location: ../Views/Mensaje/MENSAJE_Vista.php');

			break;

		case 'BuscarAs':$temp = new Asistencia($dni,$dia,$hora,$cod,$nom,$ape,$asis);
						 $_SESSION['asistencias']=$temp->solicitarAsistencias();
						 header("Location: ../Views/GestAsistencias/ASISTENCIAS_SHOW_Vista.php?dia=$dia");
			break;

		case 'Buscar':
							header("Location: ../Views/GestAsistencias/ASISTENCIAS_SELECT_Vista.php");
		  break;

		case 'BuscarAv':

			$aux=array();
			$aux=listarAlertas($av);
			$_SESSION['busq']=$aux;
		 	header("Location:../Views/GestAsistencias/ASISTENCIAS_ALERTA_LIST_Vista.php");
			break;

		default:

			$aux=array();
			$aux=buscarAlerta();
			$_SESSION['dasis']=$aux;
			header("Location:../Views/GestAsistencias/ASISTENCIAS_ALERTA_LIST_Vista.php");
			break;
	}
